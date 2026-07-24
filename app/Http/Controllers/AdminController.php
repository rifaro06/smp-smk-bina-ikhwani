<?php

namespace App\Http\Controllers;

use App\Models\PpdbRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // 1. Menampilkan halaman login admin
    public function showLogin()
    {
        if (Auth::check()) {
            // Jika sudah login, cek role dan arahkan ke dashboard masing-masing
            return Auth::user()->role === 'humas'
                ? redirect()->route('admin.humas.dashboard')
                : redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    // 2. Memproses proses login & pembagian dashboard
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // --- LOGIKA PEMBAGIAN DASHBOARD BERDASARKAN ROLE ---
            if (Auth::user()->role === 'humas') {
                return redirect()->intended(route('admin.humas.dashboard'))->with('success', 'Selamat datang di Dashboard Konten & Humas Sekolah!');
            }

            // Default untuk role 'ppdb'
            return redirect()->intended(route('admin.dashboard'))->with('success', 'Selamat datang di Dashboard Panel PPDB!');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // 3. Proses logout admin
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // 4. Menampilkan halaman utama dasbor (dilengkapi fitur filter)
    public function dashboard(Request $request)
    {
        // Statistik ringkas
        $totalPendaftar = PpdbRegistration::count();
        $totalSMP = PpdbRegistration::where('jenjang_pilihan', 'SMP')->count();
        $totalSMK = PpdbRegistration::where('jenjang_pilihan', 'SMK')->count();
        $menunggu = PpdbRegistration::where('status', 'Menunggu Verifikasi')->count();

        // Query data pendaftar dengan filter jenjang/status jika dipilih
        $query = PpdbRegistration::with('major')->latest();

        if ($request->has('jenjang') && $request->jenjang != '') {
            $query->where('jenjang_pilihan', $request->jenjang);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $registrations = $query->paginate(10)->withQueryString();

        return view('admin.dashboard', compact(
            'registrations',
            'totalPendaftar',
            'totalSMP',
            'totalSMK',
            'menunggu'
        ));
    }

    // 5. Menampilkan detail data pendaftar & dokumen upload
    public function show($id)
    {
        $registration = PpdbRegistration::with('major')->findOrFail($id);
        return view('admin.show', compact('registration'));
    }

    // 6. Memproses perubahan status verifikasi oleh panitia
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu Verifikasi,Berkas Kurang,Sedang Diproses,Diterima,Ditolak'
        ]);

        $registration = PpdbRegistration::findOrFail($id);
        $registration->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pendaftar berhasil diperbarui menjadi: ' . $request->status);
    }

    // Fungsi untuk membuka dokumen PPDB secara aman
    public function lihatDokumen($id, $jenis)
    {
        $registration = \App\Models\PpdbRegistration::findOrFail($id);

        // Tentukan dokumen mana yang mau dibuka (menggunakan document_kk & document_ijazah)
        $filePath = ($jenis === 'kk') ? $registration->document_kk : $registration->document_ijazah;

        // Cek apakah data di database kosong atau filenya tidak ada di penyimpanan
        if (empty($filePath) || !Storage::disk('public')->exists($filePath)) {
            abort(404, 'Dokumen tidak ditemukan di dalam server.');
        }

        // Ambil jalur lengkap file di komputer dan tampilkan ke browser
        $fullPath = storage_path('app/public/' . $filePath);

        return response()->file($fullPath);
    }

    // Fungsi untuk menghapus data pendaftar beserta berkas fisiknya di server
    public function destroy($id)
    {
        $registration = \App\Models\PpdbRegistration::findOrFail($id);

        // 1. Hapus berkas fisik KK jika ada di server
        if (!empty($registration->document_kk) && Storage::disk('public')->exists($registration->document_kk)) {
            Storage::disk('public')->delete($registration->document_kk);
        }

        // 2. Hapus berkas fisik Ijazah jika ada di server
        if (!empty($registration->document_ijazah) && Storage::disk('public')->exists($registration->document_ijazah)) {
            Storage::disk('public')->delete($registration->document_ijazah);
        }

        // 3. Hapus data siswa dari database
        $registration->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Data peserta beserta berkas lampirannya berhasil dihapus.');
    }
}