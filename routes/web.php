<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Frontend\BeritaController as FrontendBeritaController;
use App\Http\Controllers\Frontend\GaleriController as FrontendGaleriController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Frontend\PPDBController as FrontPPDB;
use App\Http\Controllers\Admin\PPDBController as AdminPPDB;
use App\Http\Controllers\Frontend\HomeController;




Route::get('/', [HomeController::class, 'index'])->name('frontend.pages.home');

Route::get('/berita', [FrontendBeritaController::class, 'index'])->name('frontend.berita');
Route::get('/berita/{id}', [FrontendBeritaController::class, 'show'])->name('frontend.beritashow');

Route::get('/ppdb', function () {
    return view('frontend.pages.ppdb');
})->name('ppdb');

Route::get('/galeri', [FrontendGaleriController::class, 'index'])->name('frontend.galeri');

Route::get('/profil', function () {
    return view('frontend.pages.profil');
})->name('profil');

Route::get('/kontak', function () {
    return view('frontend.pages.kontak');
})->name('kontak');

Route::post('/ppdb/submit', [FrontPPDB::class, 'store'])->name('ppdb.submit');


// ==================== LOGIN ADMIN ====================
Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login']);
Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

// ==================== PROTECTED ADMIN AREA ====================
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');

     Route::get('/ppdb', [AdminPPDB::class, 'index'])->name('admin.ppdb');
     Route::delete('/ppdb/{id}', [AdminPPDB::class, 'destroy'])->name('admin.ppdb.destroy');
    Route::get('/ppdb/export/pdf', [AdminPPDB::class, 'exportPdf'])->name('admin.ppdb.export.pdf');
    
    
    Route::get('/galeri', [AdminGaleriController::class, 'index'])->name('admin.galeri');
    Route::post('/galeri', [AdminGaleriController::class, 'store'])->name('admin.galeri.store');
    Route::put('/galeri/{galeri}', [AdminGaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeri/{galeri}', [AdminGaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    Route::get('/berita', [AdminBeritaController::class, 'index'])->name('admin.berita');
    Route::post('/berita', [AdminBeritaController::class, 'store'])->name('admin.berita.store');
    Route::put('/berita/{berita}', [AdminBeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/berita/{berita}', [AdminBeritaController::class, 'destroy'])->name('admin.berita.destroy');
    
});



