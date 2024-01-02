<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin-dashboard'); // Jika sudah login, arahkan ke dashboard
        } elseif (Auth::guard('student')->check()) {
            return redirect()->route('student-dashboard');
        } elseif (Auth::guard('teacher')->check()) {
            return redirect()->route('teacher-dashboard');
        }

        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Cek otentikasi untuk Admin
        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika otentikasi berhasil untuk Admin, alihkan ke halaman dashboard admin
            return redirect()->route('admin-dashboard');
        }

        // Cek otentikasi untuk Student
        if (Auth::guard('student')->attempt($credentials)) {
            // Jika otentikasi berhasil untuk Student, alihkan ke halaman dashboard student
            return redirect()->route('student-dashboard');
        }

        // Cek otentikasi untuk Teacher
        if (Auth::guard('teacher')->attempt($credentials)) {
            // Jika otentikasi berhasil untuk Student, alihkan ke halaman dashboard student
            return redirect()->route('teacher-dashboard');
        }

        // Jika otentikasi gagal untuk kedua role, kembalikan ke halaman login dengan pesan error
        return redirect()->route('auth-form-login')->with('error', 'Login gagal. Periksa kembali username dan password Anda.');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('student')->logout();
        Auth::guard('teacher')->logout();

        return redirect()->route('auth-form-login');
    }
}
