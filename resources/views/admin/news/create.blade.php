@extends('layouts.admin')

@section('content')
    <div class="py-5" style="background-color: #F8FAFC; min-height: 85vh;">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="font-heading fw-bold mb-0">Tulis Berita / Artikel Baru</h3>
                        <a href="{{ route('admin.news.index') }}"
                            class="btn btn-outline-secondary rounded-pill px-3 py-1 small fw-semibold">
                            <i class="fas fa-arrow-left me-1"></i> Batal & Kembali
                        </a>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger p-3 rounded-3 mb-4">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Judul Artikel <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="judul" class="form-control form-control-lg" required
                                    placeholder="Contoh: Siswa SMK Bina Ikhwani Juara 1 Lomba Web Design">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Foto Sampul (Opsional max 2MB)</label>
                                <input type="file" name="gambar" class="form-control" accept="image/*">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold small">Isi Konten Berita <span
                                        class="text-danger">*</span></label>
                                <textarea name="konten" class="form-control" rows="8" required
                                    placeholder="Tuliskan isi berita atau pengumuman secara lengkap di sini..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Kategori Tulisan <span
                                        class="text-danger">*</span></label>
                                <select name="kategori" class="form-select form-select-lg fw-semibold">
                                    <option value="Berita">📰 Berita / Artikel Sekolah</option>
                                    <option value="Agenda">📅 Agenda / Kegiatan Mendatang</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">
                                <i class="fas fa-paper-plane me-2"></i> Publikasikan Berita Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection