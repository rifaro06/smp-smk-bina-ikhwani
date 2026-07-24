@extends('layouts.admin')

@section('content')
    <div class="py-5" style="background-color: #F8FAFC; min-height: 85vh;">
        <div class="container">

            <!-- HEADER DASHBOARD HUMAS -->
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-3 border-bottom gap-3">
                <div>
                    <span class="badge bg-purple bg-opacity-10 text-primary px-3 py-1 rounded-pill small fw-bold mb-1"
                        style="background-color: #E0E7FF; color: #4338CA;">PORTAL HUMAS & KONTEN</span>
                    <h2 class="font-heading fw-bold text-dark mb-0">Dashboard Manajemen Website</h2>
                    <p class="text-muted small mb-0">Kelola informasi publik, berita sekolah, agenda kegiatan, dan galeri
                        foto.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('home') }}" target="_blank"
                        class="btn btn-outline-dark rounded-pill px-3 py-2 small fw-semibold">
                        <i class="fas fa-external-link-alt me-1"></i> Lihat Beranda
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger rounded-pill px-4 py-2 small fw-bold shadow-sm">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 p-3 mb-4 shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- MENU KONTEN WEB -->
            <div class="row g-4 mb-5 justify-content-center">
                <div class="col-md-6">
                    <div
                        class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="fas fa-newspaper fa-2x"></i>
                            </div>
                            <h4 class="font-heading fw-bold">Berita & Agenda Sekolah</h4>
                            <p class="text-secondary small">Publikasikan artikel prestasi, pengumuman penting, atau jadwal
                                agenda kegiatan mendatang.</p>
                        </div>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-primary rounded-pill w-100 fw-bold mt-3">
                            <i class="fas fa-edit me-1"></i> Kelola Berita & Agenda
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div
                        class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="fas fa-images fa-2x"></i>
                            </div>
                            <h4 class="font-heading fw-bold">Galeri Foto & Dokumentasi</h4>
                            <p class="text-secondary small">Unggah dokumentasi foto kegiatan sekolah, upacara, fasilitas
                                kampus, atau kegiatan praktikum siswa.</p>
                        </div>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-success rounded-pill w-100 fw-bold mt-3"
                            style="background-color: #10B981; border: none;">
                            <i class="fas fa-cloud-upload-alt me-1"></i> Kelola Galeri Foto
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection