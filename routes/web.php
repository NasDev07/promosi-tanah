<?php

// User

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController as UserAccountController;

// Admin
use App\Http\Controllers\UserController as adminUserController;
use App\Http\Controllers\DashboardPostController as adminDashboardPostController;

// untuk client / umum port berita
Route::get('/', function () {
    return view('home');
});

// untuk client / User
Route::get('/blog', [HomeController::class, 'artikel'])->name('blog');
Route::get('/sigle-blog', [HomeController::class, 'SigleBlog'])->name('sigle-blog');

// perbaikan dari Nas untuk user
// dashboard
Route::get('/dashboard', function () {
    $menuDashbord = 'active';
    return view('dashboard', compact('menuDashbord'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('account', UserAccountController::class);
});


// perbaikan dari Nas untuk admin
// dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('ListData', [ProfileController::class, 'ListData'])->name('ListData');
    Route::resource('users', adminUserController::class);
    Route::resource('posts', adminDashboardPostController::class);
});

require __DIR__ . '/auth.php';