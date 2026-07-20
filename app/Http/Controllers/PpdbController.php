<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\PpdbRegistration;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    // Method untuk MENAMPILKAN formulir pendaftaran ke calon siswa
    public function create()
    {
        // Kita butuh data jurusan supaya calon siswa SMK bisa memilih jurusan di form dropdown
        $majors = Major::all();

        return view('ppdb.register', compact('majors'));
    }

    // Method untuk MEMPROSES & MENYIMPAN data saat tombol "Daftar Sekarang" diklik
    public function store(Request $request)
    {
        // 1. Validasi input: Pastikan data yang dikirim tidak kosong dan sesuai aturan
        $validated = $request->validate([
            'nisn' => 'required|numeric|digits:10',
            'nik' => 'required|numeric|digits:16',
            'nama_lengkap' => 'required|string|max:255',
            'jenjang_pilihan' => 'required|in:SMP,SMK',
            'major_id' => 'required_if:jenjang_pilihan,SMK|nullable|exists:majors,id',
            // Untuk sementara kita buat string dulu (nanti kita upgrade jadi upload file asli di tahap akhir)
            'document_kk' => 'required|string', 
            'document_ijazah' => 'required|string',
        ]);

        // 2. Buat nomor pendaftaran otomatis (Contoh: PPDB-2026-9912)
        $validated['registration_number'] = 'PPDB-' . date('Y') . '-' . rand(1000, 9999);

        // 3. Simpan ke database MySQL lewat Eloquent Model!
        PpdbRegistration::create($validated);

        // 4. Kembalikan pengguna ke halaman form dengan pesan sukses
        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim! Silakan simpan nomor pendaftaran Anda: ' . $validated['registration_number']);
    }
}