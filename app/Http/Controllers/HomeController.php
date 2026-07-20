<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data profil sekolah dari database
        $profiles = Profile::all();

        // 2. Ambil daftar jurusan SMK (karena SMP tidak punya jurusan)
        $majors = Major::all();

        // 3. Ambil 3 berita/pengumuman terbaru untuk ditampilkan di halaman depan
        $latestPosts = Post::latest()->take(3)->get();

        // 4. Kirim semua data di atas ke file tampilan Blade bernama 'home'
        return view('home', compact('profiles', 'majors', 'latestPosts'));
    }
}