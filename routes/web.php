<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProfilController;
use Illuminate\Support\Facades\Route;

// ─── Frontend Routes ────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

// ─── Admin Auth Routes ───────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ─── Protected Admin Routes ──────────────────────────────────────────────
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Artikel
        Route::get('/artikel/export-pdf', [AdminArtikelController::class, 'exportPdf'])->name('artikel.export-pdf');
        Route::resource('artikel', AdminArtikelController::class)->except(['show']);

        // Produk
        Route::resource('produk', ProdukController::class)->except(['show']);

        // Galeri
        Route::resource('galeri', GaleriController::class)->except(['show']);

        // Profil Perusahaan (single record)
        Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
        Route::post('/profil', [ProfilController::class, 'store'])->name('profil.store');
        Route::put('/profil/{profil}', [ProfilController::class, 'update'])->name('profil.update');
    });
});