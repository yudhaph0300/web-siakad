<?php

namespace App\Http\Controllers;

use App\Exports\TemplateNilai;
use App\Models\ClassName;
use App\Models\Learning;
use App\Models\Lesson;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LessonValueExportController extends Controller
{
    public function export(Request $request)
    {

        $learning = Learning::findOrFail($request->id_learning);
        $lesson = Lesson::findOrFail($learning->id_lesson);
        $students = Student::where('id_class', $learning->id_class)->get();
        $classname = ClassName::findOrFail($learning->id_class);

        $data = [
            ['MTs Riyadlatul Fallah'],                // Baris 1
            ["Mata Pelajaran {$lesson->name}"],       // Baris 2
            ["Kelas {$classname->name}"],             // Baris 3
            [''],                                     // Baris kosong untuk pemisah
            ['id_learning', 'id_student', 'nama', 'ko1', 'ko2', 'sub1', 'sub2', 'praktik', 'uts_uas'], // Header
        ];

        // Menambahkan data setiap siswa
        foreach ($students as $student) {
            $data[] = [
                'id_learning' => $learning->id,
                'id_student' => $student->id,
                'nama' => $student->name,
                'ko1' => 0,
                'ko2' => 0,
                'sub1' => 0,
                'sub2' => 0,
                'praktik' => 0,
                'uts_uas' => 0,
            ];
        }

        return Excel::download(new TemplateNilai($data), "data_penilaian_{$lesson->name}_{$classname->name}.xlsx");
    }
}
