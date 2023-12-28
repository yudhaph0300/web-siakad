<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function loginForm()
    {
        if (Auth::guard('student')->check()) {
            return redirect()->route('student-dashboard');
        } elseif (Auth::guard('admin')->check()) {
            return redirect()->route('admin-dashboard');
        }

        return view('pages.auth.student.login');
    }

    public function login(Request $request)
    {
        // Validasi data yang diterima dari form login
        $credentials = $request->only('username', 'password');

        // Melakukan otentikasi
        if (Auth::guard('student')->attempt($credentials)) {
            // Jika otentikasi berhasil, alihkan ke halaman dashboard admin
            return redirect()->route('student-dashboard');
            // dd(auth());
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin-dashboard');
        } else {
            // Jika otentikasi gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->route('student-form-login')->with('error', 'Login gagal. Periksa kembali username dan password Anda.');
        }
    }

    public function logout()
    {
        Auth::guard('student')->logout(); // Lakukan proses logout dengan guard 'admin'

        return redirect()->route('student-form-login');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
