@extends('layouts.app')

@section('content')
<div class="py-5 bg-light" style="min-height: 80vh; padding-top: 100px !important;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-success fw-bold text-uppercase tracking-wider">Dokumentasi Sekolah</span>
            <h1 class="font-heading fw-bold text-dark display-5">Galeri Foto Kegiatan</h1>
            <p class="text-muted">Merekam jejak aktivitas akademis, praktikum, serta momen kebersamaan di Bina Ikhwani.</p>
        </div>

        <div class="row g-4">
            @forelse($galleries as $foto)
            <div class="col-md-3 col-6">
                <div class="overflow-hidden rounded-4 shadow-sm position-relative bg-white" style="height: 250px;">
                    <img src="{{ asset('storage/' . $foto->gambar) }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s;" alt="{{ $foto->judul }}" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75 text-white small fw-semibold text-truncate">
                        {{ $foto->judul }}
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Belum ada foto yang diunggah.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $galleries->links() }}
        </div>
    </div>
</div>
@endsection