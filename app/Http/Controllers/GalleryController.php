<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $request->file('gambar')->store('gallery-images', 'public');

        Gallery::create([
            'judul'  => $request->judul,
            'gambar' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->gambar);
        $gallery->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }
}