@extends('layouts.app')

@section('content')
<div class="py-5 bg-white" style="min-height: 80vh; padding-top: 100px !important;">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Navigasi Breadcrumb -->
                <a href="{{ route('public.news.index') }}" class="text-decoration-none text-muted small mb-3 d-inline-block"><i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Berita</a>
                
                <div class="mb-3">
                    <span class="badge {{ $news->kategori == 'Agenda' ? 'bg-warning text-dark' : 'bg-success' }} px-3 py-2 rounded-pill">{{ $news->kategori }}</span>
                    <span class="text-muted small ms-2"><i class="far fa-calendar-alt me-1"></i> {{ $news->created_at->format('d M Y, H:i') }} WIB</span>
                </div>

                <h1 class="font-heading fw-bold text-dark mb-4">{{ $news->judul }}</h1>

                @if($news->gambar)
                    <div class="rounded-4 overflow-hidden mb-5 shadow-sm" style="max-height: 450px;">
                        <img src="{{ asset('storage/' . $news->gambar) }}" class="w-100 object-fit-cover" alt="{{ $news->judul }}">
                    </div>
                @endif

                <!-- Isi Artikel -->
                <div class="article-content text-secondary fs-6 lh-lg mb-5" style="white-space: pre-line;">
                    {!! $news->konten !!}
                </div>

                <hr class="my-5">

                <!-- Rekomendasi Berita Lain -->
                <h4 class="font-heading fw-bold mb-4">Berita Lainnya</h4>
                <div class="row g-3">
                    @foreach($recentNews as $item)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-3 h-100 p-2">
                            <h6 class="fw-bold small mb-1"><a href="{{ route('public.news.show', $item->slug) }}" class="text-dark text-decoration-none">{{ $item->judul }}</a></h6>
                            <small class="text-muted" style="font-size: 11px;">{{ $item->created_at->format('d M Y') }}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection