<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/index', function () {
    return view('index');
});

// تحديث تعريف المسار ليستخدم صيغة الـ array
Route::get('/{page}', [AdminController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
