<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PublicController;
use App\Models\Profile;
use App\Models\Major;
use App\Models\News;
use App\Models\Gallery;

/*
|--------------------------------------------------------------------------
| 1. ROUTE PUBLIK (BISA DIAKSES SIAPA SAJA TANPA LOGIN)
|--------------------------------------------------------------------------
*/

// Halaman Utama (Landing Page)
Route::get('/', function () {
    $smp = Profile::where('jenjang', 'SMP')->first();
    $smk = Profile::where('jenjang', 'SMK')->first();
    $majors = Major::all();
    $latestNews = News::latest()->take(3)->get();
    $galleries  = Gallery::latest()->take(6)->get();

    return view('home', compact('smp', 'smk', 'majors', 'latestNews', 'galleries'));
})->name('home');

// Halaman Katalog Berita & Galeri Publik
Route::get('/berita', [PublicController::class, 'newsIndex'])->name('public.news.index');
Route::get('/berita/{slug}', [PublicController::class, 'newsShow'])->name('public.news.show');
Route::get('/galeri', [PublicController::class, 'galleryIndex'])->name('public.gallery.index');

// Halaman Pendaftaran PPDB
Route::get('/ppdb/daftar', [PpdbController::class, 'create'])->name('ppdb.register');
Route::post('/ppdb/daftar', [PpdbController::class, 'store'])->name('ppdb.store');

// Halaman Cek Status & Cetak Bukti PPDB
Route::get('/cek-status', [PublicController::class, 'cekStatus'])->name('public.ppdb.cek_status');
Route::get('/cek-status/cetak/{id}', [PublicController::class, 'cetakKartu'])->name('public.ppdb.cetak');


/*
|--------------------------------------------------------------------------
| 2. ROUTE LOGIN & LOGOUT ADMIN
|--------------------------------------------------------------------------
*/
// Nama rute diset menjadi 'login' agar middleware auth Laravel tidak error 500
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| 3. ROUTE ADMIN PANEL (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
    // --- Panel Admin PPDB ---
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/ppdb/{id}', [AdminController::class, 'show'])->name('admin.show');
    
    // Rute untuk melihat dokumen (KK & Ijazah) pendaftar PPDB
    Route::get('/admin/ppdb/{id}/dokumen/{jenis}', [AdminController::class, 'lihatDokumen'])->name('admin.dokumen.lihat');
    Route::put('/admin/ppdb/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');

    // Rute untuk menghapus data pendaftar PPDB
    Route::delete('/admin/ppdb/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // --- Panel Admin Humas / Konten Sekolah ---
    Route::get('/admin/humas/dashboard', function () {
        return view('admin.humas_dashboard');
    })->name('admin.humas.dashboard');

    // Manajemen Berita
    Route::get('/admin/humas/berita', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/admin/humas/berita/tambah', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/humas/berita', [NewsController::class, 'store'])->name('admin.news.store');
    Route::delete('/admin/humas/berita/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    // Manajemen Galeri
    Route::get('/admin/humas/galeri', [GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::post('/admin/humas/galeri', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::delete('/admin/humas/galeri/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

});