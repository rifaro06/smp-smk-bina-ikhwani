@extends('layouts.app')

@section('content')

<!-- 1. HERO SECTION (CLEAN TANPA BOX PROMO) -->
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #F8FAFC 0%, #E2E8F0 100%); border-bottom: 1px solid #E2E8F0;">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">
            
            <!-- KIRI: HEADLINE & TOMBOL UTAMA -->
            <div class="col-lg-6">
                

                <h1 class="display-4 font-heading fw-extrabold text-dark mb-3" style="line-height: 1.2;">
                    Membentuk Generasi <span style="color: #10B981;">Beriman, Berilmu, dan Beradab</span>
                </h1>

                <p class="lead text-secondary mb-4 fs-6" style="line-height: 1.7;">
                    Selamat datang di portal resmi pendidikan <strong class="text-dark">SMP & SMK Bina Ikhwani Dramaga Bogor</strong>. Aksesnya mudah, biayanya murah, dan gurunya bersahabat.
                </p>
                
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('ppdb.register') }}" class="btn btn-success btn-lg px-4 py-3 fs-6 rounded-pill fw-bold shadow-sm" style="background-color: #10B981; border:none;">
                        <i class="fas fa-paper-plane me-2"></i> Daftar PPDB Online
                    </a>
                    <a href="#visimisi" class="btn btn-outline-dark btn-lg px-4 py-3 fs-6 rounded-pill fw-bold">
                        <i class="fas fa-bullseye me-2"></i> Visi & Misi Sekolah
                    </a>
                </div>
            </div>

            <!-- KANAN: FRAME FOTO SEKOLAH -->
            <div class="col-lg-6">
                <div class="position-relative p-2 bg-white rounded-5 shadow-lg border">
                    <div class="position-relative overflow-hidden rounded-4">
                        <img src="{{ asset('images/sekolah.jpg') }}" 
                             alt="Gedung SMP & SMK Bina Ikhwani" 
                             class="img-fluid w-100 object-fit-cover rounded-4 shadow-sm" 
                             style="min-height: 380px; max-height: 420px; object-fit: cover;"
                             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1000&auto=format&fit=crop';">
                        
                        <div class="position-absolute bottom-0 start-0 end-0 p-3 p-md-4" style="background: linear-gradient(to top, rgba(15, 23, 42, 0.85), transparent);">
                            <div class="d-flex align-items-center justify-content-between text-white">
                                <div>
                                    <h5 class="font-heading fw-bold mb-0 text-white">SMP & SMK Bina Ikhwani</h5>
                                    <small class="text-white-50"><i class="fas fa-location-dot me-1 text-success"></i> Dramaga, Kab. Bogor</small>
                                </div>
                                <span class="badge bg-success px-3 py-2 rounded-pill">Lingkungan Asri & Kondusif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. SEKSI VISI & MISI SEKOLAH -->
<section id="visimisi" class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <span class="text-success fw-bold text-uppercase tracking-wider">Arah & Landasan Pendidikan</span>
            <h2 class="font-heading fw-bold text-dark display-6 mt-1">Visi & Misi Sekolah</h2>
            <p class="text-muted">Komitmen Yayasan Abdul Wahab (YAADHAB) dalam membina generasi unggul, berakhlak mulia, dan berdaya saing.</p>
        </div>

        <div class="row g-4">
            <!-- VISI MISI SMP BINA IKHWANI -->
            <div class="col-lg-6">
                <div class="card school-card h-100 p-4 p-lg-5 border-0 shadow-sm" style="background: #F8FAFC; border: 1px solid #E2E8F0 !important;">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="rounded-circle text-white p-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 52px; height: 52px; background-color: #10B981;">
                            <i class="fas fa-bullseye fs-4"></i>
                        </div>
                        <div>
                            <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-1 rounded-pill">JENJANG SMP</span>
                            <h4 class="font-heading fw-bold text-dark mb-0 mt-1">SMP Bina Ikhwani</h4>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="font-heading fw-bold text-dark text-uppercase small text-success mb-2">
                            <i class="fas fa-eye me-1"></i> Visi Utama
                        </h6>
                        <div class="p-3 rounded-3 bg-white border border-success border-opacity-25 shadow-sm">
                            <p class="text-dark small mb-0 fw-semibold fst-italic">
                                "{{ $smp->visi ?? 'Membentuk Generasi Beriman, Berilmu, Beradab, dan Berakhlak Mulia.' }}"
                            </p>
                        </div>
                    </div>

                    <div>
                        <h6 class="font-heading fw-bold text-dark text-uppercase small text-success mb-2">
                            <i class="fas fa-list-check me-1"></i> Misi Sekolah
                        </h6>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">
                            {{ $smp->misi ?? 'Menyelenggarakan pendidikan SMP berakreditasi B dengan lingkungan guru yang bersahabat, biaya terjangkau, serta fokus pada pembinaan karakter keislaman (Hadroh, Kaligrafi, B. Arab).' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- VISI MISI SMK BINA IKHWANI -->
            <div class="col-lg-6">
                <div class="card school-card h-100 p-4 p-lg-5 border-0 shadow-sm" style="background: #F8FAFC; border: 1px solid #E2E8F0 !important;">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="rounded-circle text-white p-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 52px; height: 52px; background-color: #1E3A8A;">
                            <i class="fas fa-compass fs-4"></i>
                        </div>
                        <div>
                            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-1 rounded-pill" style="color: #1E3A8A !important;">JENJANG SMK</span>
                            <h4 class="font-heading fw-bold text-dark mb-0 mt-1">SMK Bina Ikhwani</h4>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="font-heading fw-bold text-dark text-uppercase small mb-2" style="color: #1E3A8A;">
                            <i class="fas fa-eye me-1"></i> Visi Utama
                        </h6>
                        <div class="p-3 rounded-3 bg-white border border-primary border-opacity-25 shadow-sm">
                            <p class="text-dark small mb-0 fw-semibold fst-italic">
                                "{{ $smk->visi ?? 'Menjadi SMK Unggulan yang Menghasilkan Lulusan Mandiri, Profesional, Berakhlak Mulia, dan Siap Diserap Dunia Kerja.' }}"
                            </p>
                        </div>
                    </div>

                    <div>
                        <h6 class="font-heading fw-bold text-dark text-uppercase small mb-2" style="color: #1E3A8A;">
                            <i class="fas fa-list-check me-1"></i> Misi Sekolah
                        </h6>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">
                            {{ $smk->misi ?? 'Menerapkan Kurikulum Merdeka berbasis industri pada jurusan Bisnis Digital & Manajemen Perkantoran, dibekali praktek kewirausahaan dan etika kerja islami.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. JENJANG PENDIDIKAN -->
<section id="jenjang" class="py-5">
    <div class="container py-4">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <span class="text-success fw-bold text-uppercase">Jenjang Pendidikan</span>
            <h2 class="font-heading fw-bold text-dark display-6">Program Pendidikan Bina Ikhwani</h2>
            <p class="text-muted">Informasi kuota dan akreditasi resmi jenjang SMP dan SMK.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-6">
                <div class="card school-card h-100 p-4 p-lg-5 border-top border-5 border-success bg-white shadow-sm">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-pill">SMP</span>
                        <small class="text-muted fw-bold">NPSN: {{ $smp->npsn ?? '20270943' }}</small>
                    </div>
                    <h3 class="font-heading fw-bold text-dark mb-2">SMP Bina Ikhwani Bogor</h3>
                    <p class="text-muted small mb-4">Focus pada pendidikan karakter keislaman, bahasa, hafalan Qur'an, serta lingkungan belajar yang bersahabat.</p>
                    <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                        <span class="small fw-bold text-dark"><i class="fas fa-users text-success me-1"></i> Kuota: 160 Siswa/i</span>
                        <span class="badge bg-success">Akreditasi B</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card school-card h-100 p-4 p-lg-5 border-top border-5 border-primary bg-white shadow-sm" style="border-top-color: #1E3A8A !important;">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-2 rounded-pill" style="color: #1E3A8A !important;">SMK</span>
                        <small class="text-muted fw-bold">NPSN: {{ $smk->npsn ?? '69756305' }}</small>
                    </div>
                    <h3 class="font-heading fw-bold text-dark mb-2">SMK Bina Ikhwani Bogor</h3>
                    <p class="text-muted small mb-4">Menyiapkan lulusan terampil di bidang Bisnis Digital & Administrasi Perkantoran modern yang siap kerja.</p>
                    <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                        <span class="small fw-bold text-dark"><i class="fas fa-briefcase text-primary me-1"></i> Kurikulum Merdeka</span>
                        <span class="badge bg-dark">Kuota: 120 Siswa/i</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. PROGRAM KEAHLIAN SMK -->
<section id="jurusan" class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <span class="badge bg-dark text-white px-3 py-2 rounded-pill mb-2">KOMPETENSI KEAHLIAN</span>
            <h2 class="font-heading fw-bold text-dark display-6">Jurusan SMK Bina Ikhwani</h2>
            <p class="text-muted">Fokus keahlian untuk membekali siswa dengan skill profesional dunia kerja.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($majors as $major)
            <div class="col-md-6">
                <div class="card school-card h-100 p-4 shadow-sm" style="border: 1px solid #E2E8F0 !important;">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-3 p-3 text-white me-3" style="background-color: #0F172A;">
                            <i class="{{ $major->icon ?? 'fas fa-briefcase' }} fs-3"></i>
                        </div>
                        <div>
                            <span class="badge bg-success bg-opacity-10 text-success fw-bold mb-1">{{ $major->kode }}</span>
                            <h4 class="font-heading fw-bold text-dark mb-0">{{ $major->nama_jurusan }}</h4>
                        </div>
                    </div>
                    <p class="text-secondary small mb-4">{{ $major->deskripsi }}</p>
                    <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                        <span class="small fw-semibold text-success"><i class="fas fa-check-circle me-1"></i> Ready for Industry</span>
                        <span class="text-muted small fw-bold">Siap Kerja / Kuliah</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 5. BERITA & AGENDA SEKOLAH -->
<section id="berita" class="py-5">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <span class="text-success fw-bold text-uppercase">Kabar Sekolah</span>
                <h2 class="font-heading fw-bold text-dark display-6 mb-0">Berita & Agenda Terbaru</h2>
            </div>
            <a href="#" class="btn btn-outline-dark rounded-pill px-4 d-none d-md-block">Lihat Semua Berita &rarr;</a>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card school-card h-100 border-0 shadow-sm bg-white">
                    <div class="img-zoom-container" style="height: 200px;">
                        <img src="https://img.freepik.com/free-photo/group-diverse-grads-throwing-caps-up-sky_53876-56031.jpg?w=740" alt="Berita 1" class="img-fluid w-100 h-100 object-fit-cover img-zoom">
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between text-muted small mb-2">
                            <span><i class="far fa-calendar-alt me-1"></i> 15 Juli 2026</span>
                            <span class="badge bg-success bg-opacity-10 text-success">Kegiatan</span>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">Pelaksanaan Pembelajaran Tatap Muka Tahun Ajaran Baru</h5>
                        <p class="text-muted small mb-4 flex-grow-1">Seluruh siswa/i SMP dan SMK Bina Ikhwani mengawali tahun ajaran baru dengan semangat tinggi dan apel pagi rutin...</p>
                        <a href="#" class="fw-bold text-dark text-decoration-none small mt-auto">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card school-card h-100 border-0 shadow-sm bg-white">
                    <div class="img-zoom-container" style="height: 200px;">
                        <img src="https://img.freepik.com/free-photo/islamic-new-year-concept-with-quran_23-2148611703.jpg?w=740" alt="Berita 2" class="img-fluid w-100 h-100 object-fit-cover img-zoom">
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between text-muted small mb-2">
                            <span><i class="far fa-calendar-alt me-1"></i> 10 Juli 2026</span>
                            <span class="badge bg-primary bg-opacity-10 text-primary">Prestasi</span>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">Siswa SMP Bina Ikhwani Raih Juara Lomba Hadroh</h5>
                        <p class="text-muted small mb-4 flex-grow-1">Tim ekstrakurikuler Hadroh Bina Ikhwani berhasil menorehkan prestasi membanggakan pada gelaran kompetisi seni islami...</p>
                        <a href="#" class="fw-bold text-dark text-decoration-none small mt-auto">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card school-card h-100 border-0 shadow-sm bg-white">
                    <div class="img-zoom-container" style="height: 200px;">
                        <img src="https://img.freepik.com/free-photo/students-knowing-right-answer_329181-14271.jpg?w=740" alt="Berita 3" class="img-fluid w-100 h-100 object-fit-cover img-zoom">
                    </div>
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex justify-content-between text-muted small mb-2">
                            <span><i class="far fa-calendar-alt me-1"></i> 01 Juli 2026</span>
                            <span class="badge bg-warning bg-opacity-20 text-dark">Akademik</span>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">Penerapan Kurikulum Merdeka di SMK Bina Ikhwani</h5>
                        <p class="text-muted small mb-4 flex-grow-1">Dengan metode pembelajaran berbasis projek (PjBL), siswa jurusan Pemasaran dan Perkantoran diajak langsung mempraktekkan...</p>
                        <a href="#" class="fw-bold text-dark text-decoration-none small mt-auto">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. GALERI FOTO KEGIATAN -->
<section id="galeri" class="py-5 bg-white">
    <div class="container py-4 text-center">
        <h2 class="font-heading fw-bold text-dark mb-2">Galeri Kegiatan Sekolah</h2>
        <p class="text-muted mb-5">Dokumentasi suasana belajar dan aktivitas siswa/i Bina Ikhwani.</p>
        
        <div class="row g-3">
            <div class="col-md-4 col-6">
                <img src="https://img.freepik.com/free-photo/young-asia-university-students-using-laptop-library_7861-3373.jpg?w=740" class="img-fluid rounded-4 shadow-sm w-100" style="height: 220px; object-fit: cover;" alt="Galeri 1">
            </div>
            <div class="col-md-4 col-6">
                <img src="https://img.freepik.com/free-photo/teacher-helping-kids-class_23-2148888812.jpg?w=740" class="img-fluid rounded-4 shadow-sm w-100" style="height: 220px; object-fit: cover;" alt="Galeri 2">
            </div>
            <div class="col-md-4 col-12">
                <img src="https://img.freepik.com/free-photo/medium-shot-happy-graduate-students_23-2148950577.jpg?w=740" class="img-fluid rounded-4 shadow-sm w-100" style="height: 220px; object-fit: cover;" alt="Galeri 3">
            </div>
        </div>
    </div>
</section>

<!-- 7. BANNER PPDB PENUTUP -->
<section class="py-5">
    <div class="container py-4">
        <div class="card border-0 rounded-5 shadow-lg overflow-hidden text-white p-5" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <span class="badge bg-white text-success fw-bold px-3 py-2 rounded-pill mb-3">INFO PENDAFTARAN SISWA BARU</span>
                    <h2 class="display-6 font-heading fw-bold mb-2">PPDB Tahun Ajaran 2026/2027 Telah Dibuka!</h2>
                    <p class="mb-0 text-white-50 fs-6">
                        Segera daftarkan putra/putri Anda dan bergabunglah menjadi bagian dari keluarga besar SMP & SMK Bina Ikhwani Dramaga Bogor.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('ppdb.register') }}" class="btn btn-dark btn-lg px-5 py-3 fw-bold rounded-pill shadow" style="background: #0F172A;">
                        <i class="fas fa-paper-plane me-2"></i> Daftar PPDB Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection