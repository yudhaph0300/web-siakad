<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin-dashboard'); // Jika sudah login, arahkan ke dashboard
        } elseif (Auth::guard('student')->check()) {
            return redirect()->route('student-dashboard');
        }

        return view('pages.auth.admin.login');
    }

    public function login(Request $request)
    {
        // Validasi data yang diterima dari form login
        $credentials = $request->only('username', 'password');

        // Melakukan otentikasi
        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika otentikasi berhasil, alihkan ke halaman dashboard admin
            return redirect()->route('admin-dashboard');
        } elseif (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('student-dashboard');
        } else {
            // Jika otentikasi gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->route('admin-form-login')->with('error', 'Login gagal. Periksa kembali username dan password Anda.');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout(); // Lakukan proses logout dengan guard 'admin'

        return redirect()->route('admin-form-login');
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
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
