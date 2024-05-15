<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\Http\Requests\StoreLearningRequest;
use App\Http\Requests\UpdateLearningRequest;
use App\Models\AcademicYear;
use App\Models\ClassName;
use App\Models\Lesson;
use App\Models\Teacher;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'data pembelajaran';
        $learnings = Learning::where('id_academic_year', session()->get('id_academic_year'))->get();

        $lessons = Lesson::where('id_academic_year', session()->get('id_academic_year'))->get();
        $classnames = ClassName::where('id_academic_year', session()->get('id_academic_year'))->get();
        $teachers = Teacher::all();

        return view('pages.admin.data-pembelajaran.index', compact('title', 'learnings', 'lessons', 'classnames', 'teachers'));
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
        // $validatedData = $request->validate([
        //     'id_lesson' => 'required',
        //     'id_class' => 'required',
        //     'id_teacher' => 'required'
        // ]);

        $learning = new Learning([
            'id_academic_year' => session()->get('id_academic_year'),
            'id_lesson' => $request->id_lesson,
            'id_class' => $request->id_class,
            'id_teacher' => $request->id_teacher
        ]);

        $learning->save();


        return redirect('/admin/data-pembelajaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Learning $learning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Learning $learning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLearningRequest $request, Learning $learning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learning $learning)
    {
        //
    }
}
