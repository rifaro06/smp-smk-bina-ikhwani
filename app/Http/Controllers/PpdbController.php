<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\PpdbRegistration;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    // Menampilkan formulir pendaftaran
    public function create()
    {
        $majors = Major::all();
        return view('ppdb.register', compact('majors'));
    }

    // Memproses & menyimpan data pendaftaran beserta dokumennya
    public function store(Request $request)
    {
        // 1. Validasi Input + Validasi Ukuran & Format File Upload
        $validated = $request->validate([
            'nisn'            => 'required|numeric|digits:10',
            'nik'             => 'required|numeric|digits:16',
            'nama_lengkap'    => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'jenjang_pilihan' => 'required|in:SMP,SMK',
            'major_id'        => 'required_if:jenjang_pilihan,SMK|nullable|exists:majors,id',
            // File KK & Ijazah wajib berformat PDF/JPG/PNG dan maksimal ukuran 2MB (2048 KB)
            'document_kk'     => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', 
            'document_ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'nisn.digits'            => 'NISN harus berjumlah tepat 10 digit angka.',
            'nik.digits'             => 'NIK harus berjumlah tepat 16 digit angka.',
            'major_id.required_if'   => 'Program Keahlian (Jurusan) wajib dipilih jika memilih jenjang SMK.',
            'document_kk.mimes'      => 'Dokumen KK harus berformat PDF, JPG, JPEG, atau PNG.',
            'document_kk.max'        => 'Ukuran dokumen KK tidak boleh lebih dari 2 MB.',
            'document_ijazah.mimes'  => 'Dokumen Ijazah harus berformat PDF, JPG, JPEG, atau PNG.',
            'document_ijazah.max'    => 'Ukuran dokumen Ijazah tidak boleh lebih dari 2 MB.',
        ]);

        // 2. Proses Simpan File Fisik ke Folder Storage
        if ($request->hasFile('document_kk')) {
            $validated['document_kk'] = $request->file('document_kk')->store('ppdb-documents/kk', 'public');
        }

        if ($request->hasFile('document_ijazah')) {
            $validated['document_ijazah'] = $request->file('document_ijazah')->store('ppdb-documents/ijazah', 'public');
        }

        // 3. Generate Nomor Pendaftaran Urut Otomatis
        $currentYear = date('Y');
        $lastRegistration = PpdbRegistration::whereYear('created_at', $currentYear)
                            ->orderBy('id', 'desc')
                            ->first();

        if (!$lastRegistration) {
            $nextNumber = '0001';
        } else {
            $lastNumber = (int) substr($lastRegistration->registration_number, -4);
            $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        }

        $validated['registration_number'] = 'PPDB-' . $currentYear . '-' . $nextNumber;

        // 4. Simpan Data Ke Database
        PpdbRegistration::create($validated);

        return redirect()->back()->with('success', 'Pendaftaran & dokumen berhasil dikirim! Silakan simpan nomor pendaftaran Anda: ' . $validated['registration_number']);
    }
}