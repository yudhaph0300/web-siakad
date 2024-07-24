<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $title = 'dashboard';
        $teacher = Auth::user();

        return view('pages.teacher.index', compact('title', 'teacher'));
    }

    public function changePassword(Request $request)
    {
        $teacher = Teacher::findOrFail(Auth::user()->id);

        if (Hash::check($request->currentPassword, $teacher->password)) {
            // Update password baru dan simpan ke database
            $teacher->password = bcrypt($request->newPassword);
            $teacher->save();

            // Redirect atau kembalikan respon sukses
            return redirect('/teacher/dashboard')->with('success', 'Password berhasil diubah.');
        } else {
            // Kembalikan respon jika kata sandi saat ini tidak cocok
            return redirect()->back()->with('error', 'Password gagal diubah.');
        }
    }
}
