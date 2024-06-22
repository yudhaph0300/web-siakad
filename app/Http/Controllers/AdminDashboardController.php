<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\ClassName;
use App\Models\Learning;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $title = 'dashboard';
        $academic_year = AcademicYear::findorfail(session()->get('id_academic_year'));
        $student = Student::all()->count();
        $teacher = Teacher::all()->count();
        $class = ClassName::where('id_academic_year', $academic_year->id)->count();
        $lessons = Lesson::where('id_academic_year', $academic_year->id)->count();
        $learnings = Learning::where('id_academic_year', session()->get('id_academic_year'))->count();

        return view('pages.admin.index', compact('title', 'academic_year', 'student', 'teacher', 'class', 'lessons', 'learnings'));
    }
}
