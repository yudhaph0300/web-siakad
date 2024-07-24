<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentDashboardContoller extends Controller
{
    public function index()
    {
        $title = 'dashboard';
        $student = Auth::user();

        // dd($student);
        return view('pages.student.index', compact('title', 'student'));
    }

    public function changePassword(Request $request)
    {
        $title = 'dashboard';
        $student = Student::findOrFail(Auth::user()->id);

        if (Hash::check($request->currentPassword, $student->password)) {
            // Update password baru dan simpan ke database
            $student->password = bcrypt($request->newPassword);
            $student->save();

            // Redirect atau kembalikan respon sukses
            return redirect('/student/dashboard')->with('success', 'Password berhasil diubah.');
        } else {
            // Kembalikan respon jika kata sandi saat ini tidak cocok
            return redirect()->back()->with('error', 'Password gagal diubah.');
        }

        // return view('pages.teacher.index', compact('title', 'teacher'));
    }
}
