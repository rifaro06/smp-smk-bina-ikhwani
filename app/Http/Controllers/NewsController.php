<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // 1. Menampilkan daftar berita
    public function index()
    {
        $news = News::latest()->paginate(8);
        return view('admin.news.index', compact('news'));
    }

    // 2. Menampilkan form tambah berita
    public function create()
    {
        return view('admin.news.create');
    }

    // 3. Menyimpan berita baru ke database & upload gambar
    public function store(Request $request)
    {
        // 1. Validasi input sesuai dengan name di form HTML
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'kategori' => 'required', // Pastikan pakai 'kategori' (huruf E)
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' // Pakai 'gambar' sesuai form
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'slug' => \Illuminate\Support\Str::slug($request->judul),
        ];

        // 2. Proses upload gambar jika user memasukkan foto
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('news', 'public');
        }

        // 3. Simpan ke database
        \App\Models\News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dipublikasikan!');
    }

    // 4. Menghapus berita
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if ($news->gambar) {
            Storage::disk('public')->delete($news->gambar);
        }
        $news->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
}