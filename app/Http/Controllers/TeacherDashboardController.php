<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $title = 'dashboard';
        $teacher = Auth::user();

        return view('pages.teacher.index', compact('title', 'teacher'));
    }
}
