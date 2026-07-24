@extends('layouts.app')

@section('content')
<div class="py-5 bg-light" style="min-height: 85vh; padding-top: 100px !important;">
    <div class="container py-4">
        
        <!-- HEADER -->
        <div class="text-center max-w-lg mx-auto mb-5">
            <span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill small fw-bold mb-2">PORTAL CALON SISWA</span>
            <h1 class="font-heading fw-bold text-dark display-6">Cek Status Pendaftaran PPDB</h1>
            <p class="text-muted small">Masukkan NISN atau Alamat Email yang Anda gunakan saat mengisi formulir pendaftaran.</p>
        </div>

        <!-- FORM PENCARIAN -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 col-md-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <form action="{{ route('public.ppdb.cek_status') }}" method="GET">
                        <div class="input-group input-group-lg">
                            <input type="text" name="keyword" class="form-control fs-6 border-end-0 bg-light rounded-start-pill ps-4" 
                                   placeholder="Ketik NISN atau Email Anda..." 
                                   value="{{ request('keyword') }}" required>
                            <button type="submit" class="btn btn-success px-4 rounded-end-pill fw-bold" style="background-color: #10B981; border: none;">
                                <i class="fas fa-search me-1"></i> Periksa Status
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- HASIL PENCARIAN -->
        @if($searched)
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if($registration)
                        <!-- JIKA DATA DITEMUKAN -->
                        <div class="card border-0 shadow rounded-4 overflow-hidden bg-white">
                            
                            <!-- HEADER BANNER SESUAI STATUS -->
                            @php
                                $statusBg = 'bg-warning text-dark';
                                $statusIcon = 'fa-clock';
                                $statusMsg = 'Berkas Anda sedang dalam antrean pemeriksaan oleh panitia PPDB.';
                                
                                if($registration->status == 'Diterima') {
                                    $statusBg = 'bg-success text-white';
                                    $statusIcon = 'fa-check-circle';
                                    $statusMsg = 'Selamat! Anda dinyatakan LOLOS verifikasi. Silakan cetak bukti pendaftaran di bawah ini.';
                                } elseif($registration->status == 'Sedang Diproses') {
                                    $statusBg = 'bg-info text-white';
                                    $statusIcon = 'fa-spinner fa-spin';
                                    $statusMsg = 'Panitia sedang memeriksa keaslian dokumen dan rapor yang Anda unggah.';
                                } elseif(in_array($registration->status, ['Ditolak', 'Berkas Kurang'])) {
                                    $statusBg = 'bg-danger text-white';
                                    $statusIcon = 'fa-exclamation-triangle';
                                    $statusMsg = 'Mohon maaf, ada kendala/kekurangan pada berkas Anda. Hubungi WhatsApp Panitia untuk perbaikan.';
                                }
                            @endphp

                            <div class="p-4 {{ $statusBg }} d-flex align-items-center justify-content-between gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fas {{ $statusIcon }} fa-2x opacity-75"></i>
                                    <div>
                                        <h5 class="fw-bold mb-0 text-uppercase tracking-wide">STATUS: {{ $registration->status }}</h5>
                                        <small class="opacity-90">{{ $statusMsg }}</small>
                                    </div>
                                </div>
                            </div>

                            <!-- DETAIL BIODATA RINGKAS -->
                            <div class="card-body p-4 p-md-5">
                                <h6 class="font-heading fw-bold text-muted text-uppercase small mb-3 border-bottom pb-2">Informasi Pendaftar</h6>
                                
                                <div class="row g-3 mb-4">
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block" style="font-size: 12px;">No. Pendaftaran / ID</small>
                                        <span class="fw-bold text-dark fs-5">#PPDB-2026-{{ str_pad($registration->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block" style="font-size: 12px;">Tanggal Mendaftar</small>
                                        <span class="fw-semibold text-dark">{{ $registration->created_at->format('d M Y, H:i') }} WIB</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block" style="font-size: 12px;">Nama Lengkap</small>
                                        <span class="fw-bold text-dark fs-6">{{ $registration->nama_lengkap }}</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block" style="font-size: 12px;">NISN</small>
                                        <span class="fw-semibold text-dark">{{ $registration->nisn }}</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block" style="font-size: 12px;">Jenjang Pilihan</small>
                                        <span class="badge bg-dark px-3 py-1">{{ $registration->jenjang_pilihan }}</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block" style="font-size: 12px;">Jurusan / Program</small>
                                        <span class="fw-semibold text-primary">{{ $registration->major ? $registration->major->nama : 'Umum / SMP' }}</span>
                                    </div>
                                </div>

                                <!-- TOMBOL AKSI -->
                                <div class="d-flex flex-column flex-md-row gap-2 pt-3 border-top justify-content-end">
                                    <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-outline-success rounded-pill px-4 py-2 fw-semibold small">
                                        <i class="fab fa-whatsapp me-1"></i> Bantuan Panitia
                                    </a>
                                    
                                    <!-- Tombol Cetak Aktif jika tidak ditolak -->
                                    @if(!in_array($registration->status, ['Ditolak', 'Berkas Kurang']))
                                        <a href="{{ route('public.ppdb.cetak', $registration->id) }}" target="_blank" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" style="background-color: #0F172A; border: none;">
                                            <i class="fas fa-print me-2"></i> Cetak Kartu Bukti Daftar
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @else
                        <!-- JIKA DATA TIDAK DITEMUKAN -->
                        <div class="alert alert-danger border-0 shadow-sm rounded-4 p-4 text-center" role="alert">
                            <i class="fas fa-search-minus fa-3x text-danger opacity-50 mb-3"></i>
                            <h5 class="fw-bold mb-1">Data Tidak Ditemukan!</h5>
                            <p class="text-muted small mb-3">Sistem tidak menemukan pendaftar dengan NISN atau Email <strong>"{{ request('keyword') }}"</strong>.</p>
                            <a href="{{ route('public.ppdb.cek_status') }}" class="btn btn-sm btn-outline-danger rounded-pill px-3">Coba Kata Kunci Lain</a>
                        </div>
                    @endif
                </div>
            </div>
        @endif

    </div>
</div>
@endsection