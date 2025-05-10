<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::middleware(['auth', 'role'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    // Hiển thị giao diện danh sách Dịch vụ
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    // Hiển thị giao diện danh sách Thợ cắt tóc
    Route::get('/barbers', [BarberController::class, 'index'])->name('admin.barbers.index');
});



