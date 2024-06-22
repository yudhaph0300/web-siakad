<?php

namespace App\Http\Controllers;

use App\Imports\LessonValueImport;
use App\Models\ClassName;
use App\Models\Learning;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

        $file = $request->file('file');

        // Membaca file dan memvalidasi setiap baris
        $rows = Excel::toArray([], $file);
        $data = $rows[0]; // Ambil sheet pertama

        // dd($data);

        foreach ($data as $key => $row) {
            if ($key > 4) { // Abaikan baris header, mulai dari baris ke-5
                // dd($row);
                // Struktur ulang data row untuk validasi
                $row_data = [
                    'id_learning' => $row[0],
                    'id_student' => $row[1],
                    'ko1' => $row[3],
                    'ko2' => $row[4],
                    'sub1' => $row[5],
                    'sub2' => $row[6],
                    'praktik' => $row[7],
                    'uts_uas' => $row[8],
                ];

                // Definisikan aturan validasi
                $validator = Validator::make($row_data, [
                    'id_learning' => 'required|integer',
                    'id_student' => 'required|integer',
                    'ko1' => 'nullable|numeric|min:0|max:100',
                    'ko2' => 'nullable|numeric|min:0|max:100',
                    'sub1' => 'nullable|numeric|min:0|max:100',
                    'sub2' => 'nullable|numeric|min:0|max:100',
                    'praktik' => 'nullable|numeric|min:0|max:100',
                    'uts_uas' => 'nullable|numeric|min:0|max:100',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', 'Terdapat data yang memiliki nilai kurang dari 0 atau lebih dari 100');
                }
            }
        }

        // Jika semua baris valid, impor data
        Excel::import(new LessonValueImport, $file);

        return redirect('/teacher/data-penilaian')->with('success', 'Data Berhasil Diimport');
    }
}
