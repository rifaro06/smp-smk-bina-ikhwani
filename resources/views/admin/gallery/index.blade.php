@extends('layouts.admin')

@section('content')
<div class="py-5" style="background-color: #F8FAFC; min-height: 85vh;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <a href="{{ route('admin.humas.dashboard') }}" class="text-decoration-none small text-muted mb-1 d-block"><i class="fas fa-arrow-left me-1"></i> Kembali ke Dasbor Humas</a>
                <h2 class="font-heading fw-bold text-dark mb-0">Manajemen Galeri Foto</h2>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 p-3 mb-4 shadow-sm">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Form Upload Cepat -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-5 bg-white">
            <h6 class="font-heading fw-bold mb-3"><i class="fas fa-cloud-upload-alt text-success me-2"></i>Upload Foto Kegiatan Baru</h6>
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-5">
                    <input type="text" name="judul" class="form-control" required placeholder="Keterangan foto (cth: Upacara HUT RI ke-80)">
                </div>
                <div class="col-md-5">
                    <input type="file" name="gambar" class="form-control" accept="image/*" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100 fw-bold rounded-pill" style="background-color: #10B981; border: none;">Simpan Foto</button>
                </div>
            </form>
        </div>

        <!-- Grid Foto Galeri -->
        <div class="row g-4">
            @forelse($galleries as $foto)
            <div class="col-md-3 col-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <img src="{{ asset('storage/' . $foto->gambar) }}" class="card-img-top" alt="Galeri" style="height: 180px; object-fit: cover;">
                    <div class="card-body p-3 d-flex flex-column justify-content-between">
                        <small class="text-dark fw-semibold mb-3 d-block text-truncate">{{ $foto->judul }}</small>
                        <form action="{{ route('admin.gallery.destroy', $foto->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100 rounded-pill"><i class="fas fa-trash me-1"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted">Belum ada foto di dalam galeri sekolah.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection