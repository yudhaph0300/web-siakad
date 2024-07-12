<?php

namespace App\Http\Controllers;

use App\Models\LessonValue;
use App\Http\Requests\StoreLessonValueRequest;
use App\Http\Requests\UpdateLessonValueRequest;
use App\Imports\LessonValueImport;
use App\Models\AcademicYear;
use App\Models\ClassName;
use App\Models\Learning;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LessonValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'data penilaian';
        $academic_year = AcademicYear::findOrFail(session()->get('id_academic_year'));

        $teacher = Teacher::where('id', Auth::user()->id)->first();
        $id_class = ClassName::where('id_academic_year', $academic_year->id)->get('id');

        $data = Learning::where('id_teacher', $teacher->id)->whereIn('id_class', $id_class)->orderBy('id_lesson', 'ASC')->get();

        foreach ($data as $penilaian) {
            $data_anggota_kelas = Student::where('id_class', $penilaian->id_class)->get();
            $data_nilai = LessonValue::where('id_learning', $penilaian->id)->get();

            $penilaian->jumlah_anggota_kelas = count($data_anggota_kelas);
            $penilaian->jumlah_telah_dinilai = count($data_nilai);
        }
        // dd($data);

        return view('pages.teacher.data-penilaian.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $title = 'data penilaian';

        $learning = Learning::findOrFail($request->id_learning);

        $data_anggota_kelas = Student::where('id_class', $learning->id_class)->get();
        // dd($data_anggota_kelas);

        $data_nilai = LessonValue::where('id_learning', $learning->id)->get();
        // dd($data_nilai);

        if (count($data_nilai) == 0) {
            return view('pages.teacher.data-penilaian.create', compact('title', 'learning', 'data_anggota_kelas'));
        } else {
            return view('pages.teacher.data-penilaian.edit', compact('title', 'learning', 'data_nilai'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        for ($count_student = 0; $count_student < count($request->anggota_kelas_id); $count_student++) {
            if ($request->ko1[$count_student] >= 0 && $request->ko1[$count_student] <= 100 || $request->ko2[$count_student] >= 0 && $request->ko2[$count_student] <= 100 || $request->sub1[$count_student] >= 0 && $request->sub1[$count_student] <= 100 || $request->sub2[$count_student] >= 0 && $request->sub2[$count_student] <= 100 || $request->uts_uas[$count_student] >= 0 && $request->uts_uas[$count_student] <= 100) {
                $data_nilai = array(

                    'id_learning'  => $request->id_learning,
                    'id_student'  => $request->anggota_kelas_id[$count_student],
                    'ko1'  => ltrim($request->ko1[$count_student]),
                    'ko2'  => ltrim($request->ko2[$count_student]),
                    'sub1'  => ltrim($request->sub1[$count_student]),
                    'sub2'  => ltrim($request->sub2[$count_student]),
                    'praktik'  => ltrim($request->praktik[$count_student]),
                    'uts_uas'  => ltrim($request->uts_uas[$count_student]),
                );
                $data_nilai_siswa[] = $data_nilai;
            } else {
                return back()->with('error', 'Nilai harus berisi antara 0 s/d 100');
            }
        }
        $store_data_nilai = $data_nilai_siswa;
        LessonValue::insert($store_data_nilai);
        return redirect('/teacher/data-penilaian');
    }



    /**
     * Display the specified resource.
     */
    public function show(LessonValue $lessonValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonValue $lessonValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        for ($count_student = 0; $count_student < count($request->anggota_kelas_id); $count_student++) {

            if ($request->ko1[$count_student] >= 0 && $request->ko1[$count_student] <= 100 || $request->ko2[$count_student] >= 0 && $request->ko2[$count_student] <= 100 || $request->sub1[$count_student] >= 0 && $request->sub1[$count_student] <= 100 || $request->sub2[$count_student] >= 0 && $request->sub2[$count_student] <= 100 || $request->uts_uas[$count_student] >= 0 && $request->uts_uas[$count_student] <= 100) {
                $nilai = LessonValue::where('id_learning', $id)->where('id_student', $request->anggota_kelas_id[$count_student])->first();

                $data_nilai = [
                    'ko1'  => ltrim($request->ko1[$count_student]),
                    'ko2'  => ltrim($request->ko2[$count_student]),
                    'sub1'  => ltrim($request->sub1[$count_student]),
                    'sub2'  => ltrim($request->sub2[$count_student]),
                    'praktik'  => ltrim($request->praktik[$count_student]),
                    'uts_uas'  => ltrim($request->uts_uas[$count_student]),
                ];
                LessonValue::where('id', $nilai->id)->update($data_nilai);
            } else {
                return back()->with('error', 'Nilai harus berisi antara 0 s/d 100');
            }
        }
        return redirect('/teacher/data-penilaian');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonValue $lessonValue)
    {
        //
    }
}
