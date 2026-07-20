<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PpdbController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Peta Rute Website Bina Ikhwani)
|--------------------------------------------------------------------------
*/

// 1. Rute Halaman Depan (Profil Sekolah) -> Memanggil method index() di HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Rute Formulir PPDB Online -> Memanggil method create() di PpdbController
Route::get('/ppdb/daftar', [PpdbController::class, 'create'])->name('ppdb.register');

// 3. Rute Proses Kirim Formulir PPDB -> Memanggil method store() di PpdbController (Wajib POST!)
Route::post('/ppdb/daftar', [PpdbController::class, 'store'])->name('ppdb.store');