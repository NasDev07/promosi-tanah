<?php

// User

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController as UserAccountController;

// Admin
use App\Http\Controllers\UserController as adminUserController;
use App\Http\Controllers\DashboardPostController as adminDashboardPostController;
use App\Http\Controllers\GaleriController as adminGaleriController;
use App\Http\Controllers\KepalaController as adminKepalaController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProdukController as adminProdukController;
use App\Http\Controllers\StrukturController as adminStrukturController;
use App\Http\Controllers\UserProdukController;
use App\Http\Controllers\VisiMisiController as adminVisiMisiController;

// untuk client / umum port berita
Route::get('/', [HomeController::class, 'home']);

// untuk client / User
Route::get('/blog', [HomeController::class, 'artikel'])->name('blog');
Route::get('sigle-blog/{title}/show', [HomeController::class, 'show'])->name('sigle-blog.show');
Route::get('/promosi-tanah', [UserProdukController::class, 'promosi'])->name('promosi-tanah');
Route::get('promosi-tanah/{title}/show', [UserProdukController::class, 'show'])->name('promosi-tanah.show');
Route::resource('pesan', PesanController::class);
Route::get('/visimisi', [HomeController::class, 'visimisi'])->name('visi-misi');
Route::get('/struktur-organisasi', [HomeController::class, 'StrukturOrganisasi'])->name('struktur-organisasi');
Route::get('/profile-kepala', [HomeController::class, 'ProfileKepala'])->name('profile-kepala');
Route::get('/pagegaleri', [HomeController::class, 'PageGaleri'])->name('pagegaleri');

// perbaikan dari Nas untuk user dan admin
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
    Route::resource('produk', adminProdukController::class);    
});


// perbaikan dari Nas untuk admin
// dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('ListData', [ProfileController::class, 'ListData'])->name('ListData');
    Route::get('pesanTanah', [ProfileController::class, 'pesanTanah'])->name('pesanTanah');
    Route::resource('users', adminUserController::class);
    Route::resource('posts', adminDashboardPostController::class);    
    Route::resource('visi-misi', adminVisiMisiController::class);    
    Route::resource('struktur', adminStrukturController::class);    
    Route::resource('galeri', adminGaleriController::class);    
    Route::resource('kepala', adminKepalaController::class);    
});

require __DIR__ . '/auth.php';
