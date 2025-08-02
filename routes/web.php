<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
// Jika kamu punya controller dashboard khusus:
// use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('frontend.pages.home');
})->name('/home');

Route::get('/berita', function () {
    return view('frontend.pages.berita');
})->name('berita');

Route::get('/ppdb', function () {
    return view('frontend.pages.ppdb');
})->name('ppdb');

Route::get('/galeri', function () {
    return view('frontend.pages.galeri');
})->name('galeri');

Route::get('/profil', function () {
    return view('frontend.pages.profil');
})->name('profil');

Route::get('/kontak', function () {
    return view('frontend.pages.kontak');
})->name('kontak');


// ini berita show routenya sementara ini nanti ganti pakai
Route::get('/berita/detail', function () {
    return view('frontend.pages.beritashow');
});

Route::post('/ppdb-submit', [App\Http\Controllers\PPDBController::class, 'submit'])->name('ppdb.submit');

// ==================== LOGIN ADMIN ====================
Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login']);
Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

// ==================== PROTECTED ADMIN AREA ====================
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
});