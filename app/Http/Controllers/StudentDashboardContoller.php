<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardContoller extends Controller
{
    public function index()
    {
        $title = 'dashboard';
        $student = Auth::user();

        // dd($student);
        return view('pages.student.index', compact('title', 'student'));
    }
}
