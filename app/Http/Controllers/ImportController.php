<?php

namespace App\Http\Controllers;

use App\Imports\LessonValueImport;
use App\Models\ClassName;
use App\Models\Learning;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index(Request $request)
    {
        $title = 'data penilaian';
        $learning = Learning::findOrFail($request->id_learning);
        $lesson = Lesson::findOrFail($learning->id_lesson);
        $classname = ClassName::findOrFail($learning->id_class);

        return view('pages.teacher.import.index', compact('title', 'lesson', 'classname'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new LessonValueImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Berhasil Diimport');
    }
}
