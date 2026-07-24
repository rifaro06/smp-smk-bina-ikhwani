@extends('layouts.admin')

@section('content')
<div class="py-5" style="background-color: #F8FAFC; min-height: 85vh;">
    <div class="container">
        
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <a href="{{ route('admin.humas.dashboard') }}" class="text-decoration-none small text-muted mb-1 d-block"><i class="fas fa-arrow-left me-1"></i> Kembali ke Dasbor Humas</a>
                <h2 class="font-heading fw-bold text-dark mb-0">Manajemen Berita & Artikel</h2>
            </div>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm">
                <i class="fas fa-plus me-1"></i> Tulis Berita Baru
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 p-3 mb-4 shadow-sm">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            @forelse($news as $item)
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 d-flex flex-column">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="Sampul" style="height: 160px; object-fit: cover;">
                    @else
                        <div class="bg-secondary bg-opacity-10 text-muted d-flex align-items-center justify-content-center" style="height: 160px;">
                            <i class="fas fa-image fa-2x opacity-50"></i>
                        </div>
                    @endif
                    <div class="card-body p-3 d-flex flex-column justify-content-between flex-grow-1">
                        <div>
                            <small class="text-muted d-block mb-1" style="font-size: 11px;">{{ $item->created_at->format('d M Y') }}</small>
                            <h6 class="font-heading fw-bold text-dark mb-2 line-clamp-2">{{ $item->judul }}</h6>
                            <p class="text-secondary small mb-3 text-truncate">{{ Str::limit(strip_tags($item->konten), 60) }}</p>
                        </div>
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100 rounded-pill">
                                <i class="fas fa-trash me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="card border-0 shadow-sm rounded-4 p-5 bg-white">
                    <i class="fas fa-newspaper fa-3x text-muted opacity-50 mb-3"></i>
                    <h5 class="fw-bold">Belum Ada Berita yang Diterbitkan</h5>
                    <p class="text-secondary small mb-0">Klik tombol "Tulis Berita Baru" di pojok kanan atas untuk mempublikasikan artikel pertama sekolah.</p>
                </div>
            </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $news->links() }}
        </div>

    </div>
</div>
@endsection