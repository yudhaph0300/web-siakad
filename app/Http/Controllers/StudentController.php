<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $sort = $request->sort ?: 'desc';
        $kelas = $request->kelas;
        $title = 'data siswa';
        $query = Student::query();

        // Filter berdasarkan pencarian
        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('nis', 'LIKE', '%' . $search . '%')
                ->orWhere('username', 'LIKE', '%' . $search . '%');
        }

        // Pengurutan berdasarkan created_at
        if ($sort && in_array($sort, ['asc', 'desc'])) {
            $query->orderBy('created_at', $sort);
        }

        $dataLength = $query->count();

        $data = $query->paginate(10)->appends(request()->query());

        return view('pages.admin.data-siswa.index', compact('title', 'data', 'search', 'sort', 'kelas', 'dataLength'));
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
        $validatedData['password'] = bcrypt('student');

        Student::create($validatedData);

        return redirect('/admin/data-siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show($student)
    {
        $student = Student::findOrFail($student);
        $title = 'data siswa';
        return view('pages.admin.data-siswa.show', compact('student', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($student)
    {
        $student = Student::findOrFail($student);
        $title = 'data siswa';
        return view('pages.admin.data-siswa.edit', compact('student', 'title'));
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
