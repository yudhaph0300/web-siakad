<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

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
    return view('pages.guest.index');
});

Route::get('/login', function () {
    return view('pages.auth.student.login');
});

Route::get('/test', function () {
    return view('test');
});


// For admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin-form-login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin-post-login');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin-post-logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.admin.index');
        })->name('admin-dashboard');
    });
});

// For student
Route::prefix('student')->group(function () {
    Route::get('/login', [StudentController::class, 'loginForm'])->name('student-form-login');
    Route::post('/login', [StudentController::class, 'login'])->name('student-post-login');
    Route::post('/logout', [StudentController::class, 'logout'])->name('student-post-logout');

    Route::middleware(['auth:student'])->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.student.index');
        })->name('student-dashboard');
    });
});
