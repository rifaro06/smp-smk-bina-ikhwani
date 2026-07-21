<?php

use Illuminate\Support\Facades\Route;
use App\Models\Profile;
use App\Models\Major;

Route::get('/', function () {
    $smp = Profile::where('jenjang', 'SMP')->first();
    $smk = Profile::where('jenjang', 'SMK')->first();
    $majors = Major::all();

    return view('home', compact('smp', 'smk', 'majors'));
})->name('home');

// Route PPDB Dummy sementara
Route::get('/ppdb/daftar', function () {
    return "Halaman Pendaftaran PPDB Online (Segera Hadir)";
})->name('ppdb.register');