<?php

namespace App\Http\Controllers;

use App\Models\LessonValue;
use Illuminate\Http\Request;

class StudentRaportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'raport';
        return view('pages.student.raport.index', compact('title'));
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
    public function show(LessonValue $lessonValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonValue $lessonValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LessonValue $lessonValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonValue $lessonValue)
    {
        //
    }
}
