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

        $data = $query->paginate(10);

        return view('pages.admin.data-siswa', compact('title', 'data', 'search', 'sort', 'kelas', 'dataLength'));
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
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
