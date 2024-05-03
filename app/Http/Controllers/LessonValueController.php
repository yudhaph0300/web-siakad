<?php

namespace App\Http\Controllers;

use App\Models\LessonValue;
use App\Http\Requests\StoreLessonValueRequest;
use App\Http\Requests\UpdateLessonValueRequest;

class LessonValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'data penilaian';
        $data = [
            [
                'mata_pelajaran' => 'Bahasa Indonesia',
                'kelas' => '7A',
                'jumlah_siswa' => '31',
                'telah_dinilai' => '10'
            ],
            [
                'mata_pelajaran' => 'Bahasa Indonesia',
                'kelas' => '8C',
                'jumlah_siswa' => '28',
                'telah_dinilai' => '15'
            ],
            [
                'mata_pelajaran' => 'Sejarah',
                'kelas' => '9A',
                'jumlah_siswa' => '30',
                'telah_dinilai' => '20'
            ]
        ];

        return view('pages.teacher.data-penilaian.index', compact('title', 'data'));
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
    public function store(StoreLessonValueRequest $request)
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
    public function update(UpdateLessonValueRequest $request, LessonValue $lessonValue)
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
