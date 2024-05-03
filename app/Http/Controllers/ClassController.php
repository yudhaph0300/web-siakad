<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\ClassName;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'data kelas';
        $data_teacher = Teacher::orderBy('name', 'ASC')->get();
        $academic_year = AcademicYear::findorfail(session()->get('id_academic_year'));
        $data_class = ClassName::where('id_academic_year', $academic_year->id)->get();
        foreach ($data_class as $class) {
            $total_student = Student::where('id_class', $class->id)->count();
            $class->total_student = $total_student;
        }
        $class_count = $data_class->count();

        return view('pages.admin.data-kelas.index', compact('title', 'data_teacher', 'data_class', 'academic_year', 'class_count'));
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
            'id_academic_year' => 'required',
            'id_teacher' => 'required'
        ]);

        $class = new ClassName([
            'name' => $validatedData['name'],
            'id_academic_year' => $validatedData['id_academic_year'],
            'id_teacher' => $validatedData['id_teacher']
        ]);

        $class->save();

        return redirect('/admin/data-kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show($className)
    {
        $class = ClassName::with('students')->withCount('students')->with('teacher')->with('year')->findOrFail($className);
        $title = 'data kelas';
        return view('pages.admin.data-kelas.show', compact('class', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($className)
    {
        $class = ClassName::with('students')->withCount('students')->with('teacher')->with('year')->findOrFail($className);
        $teachers = Teacher::all();
        $years = AcademicYear::all();
        $title = 'data kelas';
        return view('pages.admin.data-kelas.edit', compact('class', 'title', 'teachers', 'years'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $class)
    {
        $class = ClassName::findOrFail($class);
        $rules = [
            'name' => 'required',
            'id_teacher' => 'required'
        ];

        $validateData = $request->validate($rules);

        ClassName::where('id', $class->id)
            ->update($validateData);

        return redirect('/admin/data-kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($class)
    {
        $class = ClassName::findOrFail($class);
        ClassName::destroy($class->id);
        return redirect('/admin/data-kelas');
    }
}
