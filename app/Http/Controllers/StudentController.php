<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\ClassName;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'data siswa';
        $academic_year = AcademicYear::findorfail(session()->get('id_academic_year'));
        $data_class = ClassName::all();
        $data_student = Student::all();
        $data_student_length = Student::all()->count();

        return view('pages.admin.data-siswa.index', compact('title', 'data_student', 'data_class', 'data_student_length'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'data siswa';
        return view('pages.admin.data-siswa.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|max:10',
            'name' => 'required|max:55',
            'username' => 'required|max:25',
        ]);

        $validatedData['image'] = 'https://images.pexels.com/photos/19384491/pexels-photo-19384491/free-photo-of-a-woman-holding-a-camera.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load';
        $validatedData['role'] = 'student';
        $validatedData['gender'] = 1;
        $validatedData['birthday'] = '2000-03-31';
        $validatedData['address'] = 'Malang';
        $validatedData['password'] = bcrypt('student');

        Student::create($validatedData);

        return redirect('/admin/data-siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show($student)
    {
        $student = Student::with('classname')->findOrFail($student);
        $title = 'data siswa';
        return view('pages.admin.data-siswa.show', compact('student', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($student)
    {
        $student = Student::findOrFail($student);
        $classnames = ClassName::all();
        $title = 'data siswa';
        return view('pages.admin.data-siswa.edit', compact('student', 'title', 'classnames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $student)
    {
        $student = Student::findOrFail($student);

        $rules = [
            'nis' => 'required|max:10',
            'name' => 'required|max:55',
            'username' => 'required|max:25',
        ];


        $validatedData = $request->validate($rules);

        Student::where('id', $student->id)
            ->update($validatedData);
        return redirect('/admin/data-siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($student)
    {
        $student = Student::findOrFail($student);
        Student::destroy($student->id);

        return redirect('/admin/data-siswa');
    }
}
