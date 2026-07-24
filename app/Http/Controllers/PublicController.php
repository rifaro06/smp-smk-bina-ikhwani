<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use App\Models\PpdbRegistration;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // 1. Halaman Lihat Semua Berita & Agenda
    public function newsIndex()
    {
        $news = News::latest()->paginate(9); // Tampilkan 9 per halaman
        return view('public.news', compact('news'));
    }

    // 2. Halaman Detail Baca Berita
    public function newsShow($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        // Ambil 3 berita lain sebagai rekomendasi
        $recentNews = News::where('id', '!=', $news->id)->latest()->take(3)->get();
        return view('public.news_detail', compact('news', 'recentNews'));
    }

    // 3. Halaman Lihat Semua Galeri Foto
    public function galleryIndex()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('public.gallery', compact('galleries'));
    }

    // 4. Halaman Form & Hasil Cek Status Siswa
    public function cekStatus(Request $request)
    {
        $registration = null;
        $searched = false;

        // Jika siswa memasukkan kata kunci pencarian (NISN, Email, atau No. Pendaftaran)
        if ($request->has('keyword') && $request->keyword != '') {
            $searched = true;
            $keyword = trim($request->keyword);

            $registration = PpdbRegistration::with('major')
                ->where('nisn', $keyword)
                ->orWhere('email', $keyword)
                ->orWhere('id', $keyword) // Atau nomor pendaftaran jika ada kolom khusus
                ->first();
        }

        return view('public.cek_status', compact('registration', 'searched'));
    }

    // 5. Halaman Cetak Bukti Pendaftaran (A4 / PDF)
    public function cetakKartu($id)
    {
        $registration = PpdbRegistration::with('major')->findOrFail($id);
        return view('public.cetak_kartu', compact('registration'));
    }
}