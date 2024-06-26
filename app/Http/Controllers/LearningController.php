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
        $academic_year = AcademicYear::findorfail(session()->get('id_academic_year'));
        $learnings = Learning::where('id_academic_year', session()->get('id_academic_year'))->get();

        $lessons = Lesson::where('id_academic_year', session()->get('id_academic_year'))->get();
        $classnames = ClassName::where('id_academic_year', session()->get('id_academic_year'))->get();
        $teachers = Teacher::all();

        return view('pages.admin.data-pembelajaran.index', compact('title', 'learnings', 'lessons', 'classnames', 'teachers', 'academic_year'));
    }


    public function store(Request $request)
    {

        $learning = new Learning([
            'id_academic_year' => session()->get('id_academic_year'),
            'id_lesson' => $request->id_lesson,
            'id_class' => $request->id_class,
            'id_teacher' => $request->id_teacher
        ]);

        $learning->save();


        return redirect('/admin/data-pembelajaran')->with('success', 'Pembelajaran berhasil ditambahkan');
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
    public function update(Request $request, $learning)
    {
        $learning = Learning::findOrFail($learning);

        $rules = [
            'id_lesson' => 'required',
            'id_class' => 'required',
            'id_teacher' => 'required'
        ];

        $validateData = $request->validate($rules);

        Learning::where('id', $learning->id)
            ->update($validateData);

        return redirect('/admin/data-pembelajaran')->with('success', 'Data pembelajaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($learning)
    {
        $learning = Learning::findOrFail($learning);
        Learning::destroy($learning->id);
        return redirect('/admin/data-pembelajaran')->with('success', 'Pembelajaran berhasil dihapus');
    }
}
