<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'data mata pelajaran';
        $academic_year = AcademicYear::findorfail(session()->get('id_academic_year'));
        $lessons = Lesson::where('id_academic_year', $academic_year->id)->orderBy('name', 'ASC')->get();
        return view('pages.admin.data-mapel.index', compact('title', 'academic_year', 'lessons'));
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
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $lesson = new Lesson([
            'id_academic_year' => session()->get('id_academic_year'),
            'name' => $validatedData['name'],
        ]);

        $lesson->save();

        return redirect('/admin/data-mata-pelajaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $lesson)
    {

        $lesson = Lesson::findOrFail($lesson);

        $rules = [
            'name' => 'required',
        ];

        $validateData = $request->validate($rules);

        Lesson::where('id', $lesson->id)
            ->update($validateData);

        return redirect('/admin/data-mata-pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lesson)
    {
        $lesson = Lesson::findOrFail($lesson);
        Lesson::destroy($lesson->id);
        return redirect('/admin/data-mata-pelajaran');
    }
}
