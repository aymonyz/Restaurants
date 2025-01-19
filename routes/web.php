<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
Route::get('/index', function () {
    return view('index');
});

// تحديث تعريف المسار ليستخدم صيغة الـ array
// Route::get('/{page}', [AdminController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'index']);
Route::get('/s', function () {
    return view('main/home');
});