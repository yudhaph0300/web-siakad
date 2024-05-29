<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Http\Requests\StoreAcademicYearRequest;
use App\Http\Requests\UpdateAcademicYearRequest;
use App\Models\ClassName;
use App\Models\Learning;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'data tahun pelajaran';
        $tapels = AcademicYear::all();

        return view('pages.admin.data-tahun-pelajaran.index', compact('title', 'tapels'));
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tahun_pelajaran' => [
                'required',
                'min:9',
                'max:9',
                Rule::unique('academic_years')->where(function ($query) use ($request) {
                    return $query->where('tahun_pelajaran', $request->tahun_pelajaran)
                        ->where('semester', $request->semester);
                }),
            ],
            'semester' => 'required',
        ]);

        $tapel = new AcademicYear([
            'tahun_pelajaran' => $request->tahun_pelajaran,
            'semester' => $request->semester,
        ]);

        $tapel->save($validateData);

        // Setting agar siswa tidak memiliki kelas
        Student::query()->update(['id_class' => null]);



        // Duplikat mata pelajaran
        // Dapatkan id_academic_year dari AcademicYear yang baru saja dibuat
        $newAcademicYearId = $tapel->id;

        // Get the most recent academic year
        $lastAcademicYear = AcademicYear::orderBy('id', 'desc')->skip(1)->first();
        if (!$lastAcademicYear) {
            // Handle the case where there is no previous academic year
            return redirect()->back()->withErrors(['error' => 'No previous academic year found.']);
        }

        $lastAcademicYearId = $lastAcademicYear->id;

        // Duplicate lessons for the new academic year
        $lessons = Lesson::where('id_academic_year', $lastAcademicYearId)->get();
        $lessonMap = [];
        foreach ($lessons as $lesson) {
            $newLesson = Lesson::create([
                'name' => $lesson->name,
                'id_academic_year' => $newAcademicYearId,
            ]);
            $lessonMap[$lesson->id] = $newLesson->id;
        }

        // Duplicate classes for the new academic year
        $classes = ClassName::where('id_academic_year', $lastAcademicYearId)->get();
        $classMap = [];
        foreach ($classes as $class) {
            $newClass = ClassName::create([
                'name' => $class->name,
                'id_academic_year' => $newAcademicYearId,
                'id_teacher' => $class->id_teacher,
            ]);
            $classMap[$class->id] = $newClass->id;
        }

        // Duplicate learnings for the new academic year
        $learnings = Learning::where('id_academic_year', $lastAcademicYearId)->get();
        foreach ($learnings as $learning) {
            Learning::create([
                'id_class' => $classMap[$learning->id_class],
                'id_lesson' => $lessonMap[$learning->id_lesson],
                'id_teacher' => $learning->id_teacher,
                'id_academic_year' => $newAcademicYearId,
            ]);
        }

        Auth::guard('admin')->logout();

        return redirect()->route('auth-form-login');
    }
}
