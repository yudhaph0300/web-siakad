<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\ClassName;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ClassName::withCount('students')->with('teacher')->with('year')->get();

        $title = 'data kelas';
        return view('pages.admin.data-kelas.index', compact('title', 'data'));
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
    public function update(Request $request, ClassName $className)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassName $className)
    {
        //
    }
}
