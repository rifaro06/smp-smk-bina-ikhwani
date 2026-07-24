@extends('layouts.app') <!-- Sesuaikan dengan layout navbar utama landing page kamu -->

@section('content')
<div class="py-5 bg-light" style="min-height: 80vh; padding-top: 100px !important;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-success fw-bold text-uppercase tracking-wider">Arsip Informasi</span>
            <h1 class="font-heading fw-bold text-dark display-5">Berita & Agenda Sekolah</h1>
            <p class="text-muted">Ikuti terus perkembangan, prestasi, dan kegiatan terbaru di SMP & SMK Bina Ikhwani.</p>
        </div>

        <div class="row g-4">
            @forelse($news as $item)
            <div class="col-md-4">
                <div class="card school-card h-100 border-0 shadow-sm bg-white rounded-4 overflow-hidden d-flex flex-column">
                    <div class="img-zoom-container bg-secondary bg-opacity-10" style="height: 200px; overflow: hidden;">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="img-fluid w-100 h-100 object-fit-cover">
                        @endif
                    </div>
                    <div class="card-body p-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between text-muted small mb-2">
                            <span><i class="far fa-calendar-alt me-1"></i> {{ $item->created_at->format('d M Y') }}</span>
                            <span class="badge {{ $item->kategori == 'Agenda' ? 'bg-warning text-dark' : 'bg-success bg-opacity-10 text-success' }}">{{ $item->kategori }}</span>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">{{ $item->judul }}</h5>
                        <p class="text-muted small mb-4 flex-grow-1">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
                        <a href="{{ route('public.news.show', $item->slug) }}" class="fw-bold text-success text-decoration-none small mt-auto">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Belum ada berita yang diterbitkan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection