<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\ClassName;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'data siswa';
        $academic_year = AcademicYear::findorfail(session()->get('id_academic_year'));
        $data_class = ClassName::where('id_academic_year', session()->get('id_academic_year'))->get();

        // Simpan nilai filter dalam sesi
        session()->put('filter_kelas', $request->kelas);
        session()->put('filter_search', $request->search);

        // Filter data siswa berdasarkan kelas dan pencarian
        $query = Student::query();


        // Filter berdasarkan kelas
        if (session()->has('filter_kelas')) {
            if (session('filter_kelas') === '__NULL__') {
                $query->whereNull('id_class');
            } else {
                $query->where('id_class', session('filter_kelas'));
            }
        }


        // Filter berdasarkan pencarian
        if (session()->has('filter_search')) {
            $query->where('name', 'like', '%' . session('filter_search') . '%');
        }

        $data_student = $query->get();
        $data_student_length = $data_student->count();

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

        // dd($request);
        $validatedData = $request->validate([
            'nis' => 'required|max:10',
            'name' => 'required|max:55',
            'gender' => 'required|max:1',
            'birthday' => 'required',
            'address' => 'max:255',
            'image' => 'image|file',
            'telp' => 'required'
        ]);


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('student-images');
        }

        $validatedData['role'] = 'student';
        $validatedData['username'] = $request->nis;
        $validatedData['password'] = bcrypt($request->nis);

        Student::create($validatedData);

        return redirect('/admin/data-siswa')->with('success', 'Siswa berhasil ditambahkan');
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
        $classnames = ClassName::where('id_academic_year', session()->get('id_academic_year'))->get();
        $title = 'data siswa';
        return view('pages.admin.data-siswa.edit', compact('student', 'title', 'classnames'));
    }

    public function resetPassword($id)
    {
        $student = Student::findOrFail($id);
        $resetPassword = $student->nis . substr($student->name, 0, 3);

        $student->password = bcrypt($resetPassword);
        $student->save();

        return redirect('/admin/data-siswa')->with('success', 'Password ' . $student->name . ' Berhasil Direset');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $student)
    {
        // dd($request);
        $student = Student::findOrFail($student);

        $rules = [
            'nis' => 'required|max:10',
            'name' => 'required|max:55',
            'gender' => 'required|max:1',
            'birthday' => 'required',
            'address' => 'max:255',
            'image' => 'image|file',
            'telp' => 'required'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['id_class'] = $request->id_class;
        $validatedData['username'] = $request->nis;
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('student-images');
        }


        Student::where('id', $student->id)
            ->update($validatedData);
        return redirect('/admin/data-siswa')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($student)
    {
        $student = Student::findOrFail($student);
        Student::destroy($student->id);

        return redirect('/admin/data-siswa')->with('success', 'Siswa berhasil dihapus');
    }
}
