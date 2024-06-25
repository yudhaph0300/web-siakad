<?php

use App\Http\Controllers\AcademicYearController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonValueController;
use App\Http\Controllers\LessonValueExportController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardContoller;
use App\Http\Controllers\StudentRaportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherDashboardController;
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
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('/data-siswa', StudentController::class);
        Route::resource('/data-guru', TeacherController::class);
        Route::resource('/data-kelas', ClassController::class);
        Route::resource('/data-mata-pelajaran', LessonController::class);
        Route::resource('/data-pembelajaran', LearningController::class);
        Route::resource('/data-tahun-pelajaran', AcademicYearController::class);
        Route::resource('/cetak-raport', RaportController::class);
        Route::get('/print-raport/{id}', [RaportController::class, 'print']);
    });
});

// For student
Route::prefix('student')->group(function () {
    Route::middleware(['auth:student'])->group(function () {
        Route::get('/dashboard', [StudentDashboardContoller::class, 'index'])->name('student-dashboard');
        Route::resource('/raport', StudentRaportController::class);
    });
});

// For teacher
Route::prefix('teacher')->group(function () {
    Route::middleware(['auth:teacher'])->group(function () {
        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher-dashboard');
        Route::resource('/data-penilaian', LessonValueController::class);
        Route::get('/import-nilai/{id_learning}', [ImportController::class, 'index']);
        Route::post('/import-nilai/proses', [ImportController::class, 'import'])->name('import-lesson-value');
        Route::get('/export-nilai/{id_learning}', [LessonValueExportController::class, 'export'])->name('export-lesson-value');
    });
});
