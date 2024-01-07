<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $sort = $request->sort ?: 'desc';
        $title = 'data guru';
        $query = Teacher::query();

        // Filter berdasarkan pencarian
        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('nik', 'LIKE', '%' . $search . '%')
                ->orWhere('username', 'LIKE', '%' . $search . '%');
        }

        // Pengurutan berdasarkan created_at
        if ($sort && in_array($sort, ['asc', 'desc'])) {
            $query->orderBy('created_at', $sort);
        }

        $dataLength = $query->count();

        $data = $query->paginate(10)->appends(request()->query());

        return view('pages.admin.data-guru.index', compact('title', 'data', 'search', 'sort', 'dataLength'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'data guru';
        return view('pages.admin.data-guru.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|max:10',
            'name' => 'required|max:55',
            'username' => 'required|max:25',
        ]);

        $validatedData['image'] = 'https://images.pexels.com/photos/19384491/pexels-photo-19384491/free-photo-of-a-woman-holding-a-camera.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load';
        $validatedData['role'] = 'teacher';
        $validatedData['password'] = bcrypt('teacher');

        Teacher::create($validatedData);

        return redirect('/admin/data-guru');
    }

    /**
     * Display the specified resource.
     */
    public function show($teacher)
    {
        $teacher = Teacher::findOrFail($teacher);
        $title = 'data guru';
        return view('pages.admin.data-guru.show', compact('teacher', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($teacher)
    {
        $teacher = Teacher::findOrFail($teacher);
        $title = 'data siswa';
        return view('pages.admin.data-guru.edit', compact('teacher', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $teacher)
    {
        $teacher = Teacher::findOrFail($teacher);

        $rules = [
            'nik' => 'required|max:10',
            'name' => 'required|max:55',
            'username' => 'required|max:25',
        ];


        $validatedData = $request->validate($rules);

        Teacher::where('id', $teacher->id)
            ->update($validatedData);
        return redirect('/admin/data-guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($teacher)
    {
        $teacher = Teacher::findOrFail($teacher);
        Teacher::destroy($teacher->id);

        return redirect('/admin/data-guru');
    }
}
