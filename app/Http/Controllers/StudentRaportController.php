<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\LessonValue;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentRaportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'raport';
        $academic_year = AcademicYear::all();
        // dd($academic_year);
        return view('pages.student.raport.index', compact('title', 'academic_year'));
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
    public function show($idAcademic)
    {
        $title = 'raport';
        $userId = auth()->id(); // Ambil ID pengguna yang sedang login
        $student = Student::where('id', $userId)->firstOrFail(); // Pastikan kolom 'user_id' ada dan sesuai
        $academic_year = AcademicYear::findOrFail($idAcademic);

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
            ->where('lesson_values.id_student', $student->id) // Gunakan ID student yang benar
            ->where('learnings.id_academic_year', $idAcademic)
            ->get();

        // dd($raport);
        return view('pages.student.raport.show', compact('title', 'raport', 'student', 'academic_year'));
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
    public function update(Request $request, LessonValue $lessonValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonValue $lessonValue)
    {
        //
    }
}
