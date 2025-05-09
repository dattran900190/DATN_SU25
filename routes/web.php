<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// Hiển thị giao diện danh sách Dịch vụ
Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');

// Hiển thị giao diện danh sách Thợ cắt tóc
Route::get('/admin/barbers', [BarberController::class, 'index'])->name('admin.barbers.index');