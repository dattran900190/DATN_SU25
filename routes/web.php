<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;

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



// Xử lý lưu bài viết mới
Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
Route::get('/admin/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');



});



// Hiển thị giao diện danh sách Thợ cắt tóc
Route::get('/admin/barbers', [BarberController::class, 'index'])->name('admin.barbers.index');

// Hiển thị giao diện danh sách Chi nhánh
Route::get('/admin/branches', [BranchController::class, 'index'])->name('admin.branches.index');
Route::get('/admin/branches/create', [BranchController::class, 'create'])->name('admin.branches.create');
Route::post('/admin/branches', [BranchController::class, 'store'])->name('admin.branches.store');
Route::get('/admin/branches/{branch}', [BranchController::class, 'show'])->name('admin.branches.show');
Route::get('/admin/branches/{branch}/edit', [BranchController::class, 'edit'])->name('admin.branches.edit');
Route::put('/admin/branches/{branch}', [BranchController::class, 'update'])->name('admin.branches.update');
Route::delete('/admin/branches/{branch}', [BranchController::class, 'destroy'])->name('admin.branches.destroy');
Route::get('/admin/branches/search', [BranchController::class, 'search'])->name('admin.branches.search');

