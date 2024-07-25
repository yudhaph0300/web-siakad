<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'data guru';

        session()->put('filter_search', $request->search);
        $query = Teacher::query();

        // Filter berdasarkan pencarian
        if (session()->has('filter_search')) {
            $query->where('name', 'like', '%' . session('filter_search') . '%');
        }

        $data = $query->get();
        $dataLength = $data->count();

        $data = $query->paginate(10)->appends(request()->query());

        return view('pages.admin.data-guru.index', compact('title', 'data', 'dataLength'));
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
            'nik' => 'required|numeric|unique:teachers,nik',
            // nama harus abjad
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u|max:55',
            // gender harus 1 atau 2
            'gender' => 'required|in:1,2',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|file|max:2048',
            // telp berupa angka
            'telp' => 'required|numeric'
        ]);

        // Jika ada file gambar yang diunggah, simpan file tersebut
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('teacher-images');
        }

        // Set role, username, dan password default
        $validatedData['role'] = 'teacher';
        $validatedData['username'] = $request->nik;
        $validatedData['password'] = bcrypt($request->nik);

        try {
            Teacher::create($validatedData);
            return redirect('/admin/data-guru')->with('success', 'Data guru berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => 'Terjadi kesalahan saat menambahkan siswa: ' . $e->getMessage()]);
        }
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
        $title = 'data guru';
        return view('pages.admin.data-guru.edit', compact('teacher', 'title'));
    }

    public function resetPassword($id)
    {
        $teacher = Teacher::findOrFail($id);
        $resetPassword = $teacher->nik . substr($teacher->name, 0, 3);

        $teacher->password = bcrypt($resetPassword);
        $teacher->save();

        return redirect('/admin/data-guru')->with('success', 'Password ' . $teacher->name . ' Berhasil Direset');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $teacher)
    {
        $teacher = Teacher::findOrFail($teacher);

        $rules = [
            'nik' => 'required|numeric|unique:teachers,nik,' . $teacher->id,
            // nama harus abjad
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u|max:55',
            // gender harus 1 atau 2
            'gender' => 'required|in:1,2',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|file|max:2048',
            // telp berupa angka
            'telp' => 'required|numeric'
        ];


        $validatedData = $request->validate($rules);
        $validatedData['username'] = $request->nik;
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('teacher-images');
        }

        Teacher::where('id', $teacher->id)
            ->update($validatedData);
        return redirect('/admin/data-guru')->with('success', 'Data guru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($teacher)
    {
        $teacher = Teacher::findOrFail($teacher);
        Teacher::destroy($teacher->id);

        return redirect('/admin/data-guru')->with('success', 'Guru berhasil dihapus');
    }
}
