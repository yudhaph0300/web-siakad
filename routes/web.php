<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.guest.index', ["title" => 'home']);
});

Route::get('/test', function () {
    return view('test');
});

// For auth
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth-form-login');
Route::post('/login', [AuthController::class, 'login'])->name('auth-post-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth-post-logout');


// For admin
Route::prefix('admin')->group(function () {
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.admin.index', ["title" => 'dashboard']);
        })->name('admin-dashboard');
        Route::resource('/data-siswa', StudentController::class);
        Route::resource('/data-guru', TeacherController::class);
    });
});

// For student
Route::prefix('student')->group(function () {
    Route::middleware(['auth:student'])->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.student.index');
        })->name('student-dashboard');
    });
});
