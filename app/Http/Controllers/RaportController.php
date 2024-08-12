<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\ClassName;
use App\Models\LessonValue;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'cetak raport';
        $data_class = ClassName::where('id_academic_year', session()->get('id_academic_year'))->get();

        // Simpan nilai filter dalam sesi
        session()->put('raport_filter_kelas', $request->kelas);
        session()->put('raport_filter_search', $request->search);

        // Filter data siswa berdasarkan kelas dan pencarian
        $query = Student::query();


        // Filter berdasarkan pencarian
        if (session()->has('raport_filter_search')) {
            $query->where('name', 'like', '%' . session('raport_filter_search') . '%');
        }

        $data_student = $query->get();

        return view('pages.admin.raport.index', compact('title', 'data_class', 'data_student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($studentId)
    {
        $title = 'cetak raport';
        $student = Student::findOrFail($studentId);
        $academic_year = AcademicYear::findOrFail(session()->get('id_academic_year'));
        $raport = LessonValue::select(
            'lessons.name as lesson_name',
            'class_names.name as class_name',
            'lesson_values.ko1',
            'lesson_values.ko2',
            'lesson_values.sub1',
            'lesson_values.sub2',
            'lesson_values.praktik',
            'lesson_values.uts_uas',
            DB::raw('
            FORMAT(
                (
                    (lesson_values.ko1 * 0.08) + 
                    (lesson_values.ko2 * 0.08) + 
                    (lesson_values.sub1 * 0.08) + 
                    (lesson_values.sub2 * 0.08) + 
                    (lesson_values.praktik * 0.08) + 
                    (lesson_values.uts_uas * 0.60)
                ), 2
            ) as nilai
        '),
            DB::raw('
            CASE
                WHEN (
                    (lesson_values.ko1 + lesson_values.ko2 + lesson_values.sub1 + lesson_values.sub2 + lesson_values.praktik + lesson_values.uts_uas) / 6
                ) >= 88 THEN "A"
                WHEN (
                    (lesson_values.ko1 + lesson_values.ko2 + lesson_values.sub1 + lesson_values.sub2 + lesson_values.praktik + lesson_values.uts_uas) / 6
                ) >= 74 THEN "B"
                WHEN (
                    (lesson_values.ko1 + lesson_values.ko2 + lesson_values.sub1 + lesson_values.sub2 + lesson_values.praktik + lesson_values.uts_uas) / 6
                ) >= 60 THEN "C"
                ELSE "D"
            END as predikat
            ')
        )
            ->join('learnings', 'lesson_values.id_learning', '=', 'learnings.id')
            ->join('lessons', 'learnings.id_lesson', '=', 'lessons.id')
            ->join('class_names', 'learnings.id_class', '=', 'class_names.id')
            ->where('lesson_values.id_student', $studentId)
            ->where('learnings.id_academic_year', session()->get('id_academic_year'))
            ->get();
        // dd($raport);

        return view('pages.admin.raport.show', compact('title', 'raport', 'student', 'academic_year'));
    }

    public function generatePDF($studentId)
    {
        // Ambil data dari metode show
        $title = 'cetak raport';
        $student = Student::findOrFail($studentId);
        $academic_year = AcademicYear::findOrFail(session()->get('id_academic_year'));
        $raport = LessonValue::select(
            'lessons.name as lesson_name',
            'class_names.name as class_name',
            'lesson_values.ko1',
            'lesson_values.ko2',
            'lesson_values.sub1',
            'lesson_values.sub2',
            'lesson_values.praktik',
            'lesson_values.uts_uas',
            DB::raw('
            FORMAT(
                (
                    (lesson_values.ko1 * 0.08) + 
                    (lesson_values.ko2 * 0.08) + 
                    (lesson_values.sub1 * 0.08) + 
                    (lesson_values.sub2 * 0.08) + 
                    (lesson_values.praktik * 0.08) + 
                    (lesson_values.uts_uas * 0.60)
                ), 2
            ) as nilai

        '),
            DB::raw('
            CASE
                WHEN (
                    (lesson_values.ko1 + lesson_values.ko2 + lesson_values.sub1 + lesson_values.sub2 + lesson_values.praktik + lesson_values.uts_uas) / 6
                ) >= 88 THEN "A"
                WHEN (
                    (lesson_values.ko1 + lesson_values.ko2 + lesson_values.sub1 + lesson_values.sub2 + lesson_values.praktik + lesson_values.uts_uas) / 6
                ) >= 74 THEN "B"
                WHEN (
                    (lesson_values.ko1 + lesson_values.ko2 + lesson_values.sub1 + lesson_values.sub2 + lesson_values.praktik + lesson_values.uts_uas) / 6
                ) >= 60 THEN "C"
                ELSE "D"
            END as predikat
            ')
        )
            ->join('learnings', 'lesson_values.id_learning', '=', 'learnings.id')
            ->join('lessons', 'learnings.id_lesson', '=', 'lessons.id')
            ->join('class_names', 'learnings.id_class', '=', 'class_names.id')
            ->where('lesson_values.id_student', $studentId)
            ->where('learnings.id_academic_year', session()->get('id_academic_year'))
            ->get();

        $pdfContent = view('pages.admin.raport.pdf', compact('title', 'raport', 'student', 'academic_year'))->render();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($pdfContent);
        $mpdf->Output();
    }



    public function print($id)
    {
        $title = 'cetak raport';
        $student = Student::findOrFail($id);
        $academic_year = AcademicYear::findOrFail(session()->get('id_academic_year'));
        $raport = LessonValue::select('lessons.name as lesson_name', 'lesson_values.ko1', 'lesson_values.ko2', 'lesson_values.sub1', 'lesson_values.sub2', 'lesson_values.praktik', 'lesson_values.uts_uas')
            ->join('learnings', 'lesson_values.id_learning', '=', 'learnings.id')
            ->join('lessons', 'learnings.id_lesson', '=', 'lessons.id')
            ->where('lesson_values.id_student', $id)
            ->where('learnings.id_academic_year', session()->get('id_academic_year'))
            ->get();

        return view('pages.admin.raport.print', compact('title', 'raport', 'student', 'academic_year'));
    }
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
