<?php

use App\Http\Controllers\AcademicYearController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonValueController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\LessonValue;

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
        Route::resource('/data-kelas', ClassController::class);
        Route::resource('/data-mata-pelajaran', LessonController::class);
        Route::resource('/data-pembelajaran', LearningController::class);
        Route::resource('/data-tahun-pelajaran', AcademicYearController::class);
        Route::resource('/cetak-raport', RaportController::class);
    });
});

// For student
Route::prefix('student')->group(function () {
    Route::middleware(['auth:student'])->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.student.index', ["title" => 'dashboard']);
        })->name('student-dashboard');
    });
});

// For teacher
Route::prefix('teacher')->group(function () {
    Route::middleware(['auth:teacher'])->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.teacher.index', ["title" => 'dashboard']);
        })->name('teacher-dashboard');
        Route::resource('/data-penilaian', LessonValueController::class);
    });
});
