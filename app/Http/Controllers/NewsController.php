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
        $request->validate([
            'judul'  => 'required|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'katagori' => 'required|in:Berita,Agenda',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('news-images', 'public');
        }

        News::create([
            'judul'  => $request->judul,
            'slug'   => Str::slug($request->judul) . '-' . time(),
            'konten' => $request->konten,
            'gambar' => $imagePath,
        ]);

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