<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('pages.admin.index');
});

Route::get('/test', function () {
    return view('test');
});
