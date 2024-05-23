<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Http\Requests\StoreAcademicYearRequest;
use App\Http\Requests\UpdateAcademicYearRequest;
use App\Models\Learning;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
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

        // Dapatkan semua record dari tabel learning
        $lessons = Lesson::all();

        // Loop melalui setiap record learning dan duplikat dengan id_academic_year baru
        foreach ($lessons as $lesson) {
            Lesson::create([
                'name' => $lesson->name,
                'id_academic_year' => $newAcademicYearId,
            ]);
        }


        return redirect('/admin/data-tahun-pelajaran');
    }
}
