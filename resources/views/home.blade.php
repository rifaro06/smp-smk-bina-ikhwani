@extends('layouts.app')

@section('content')

    <!-- =========================================================================
             1. HERO SECTION (DENGAN CAROUSEL AUTO-SLIDE FOTO SEKOLAH)
             ========================================================================= -->
    <section class="py-5 position-relative overflow-hidden"
        style="background: linear-gradient(135deg, #F8FAFC 0%, #E2E8F0 100%); border-bottom: 1px solid #E2E8F0;">
        <!-- Dekorasi Background -->
        <div class="position-absolute top-0 end-0 translate-middle-y opacity-10 pe-none d-none d-lg-block">
            <i class="fas fa-graduation-cap text-success" style="font-size: 25rem;"></i>
        </div>

        <div class="container py-lg-4 position-relative">
            <div class="row align-items-center g-5">

                <!-- KIRI: HEADLINE & TOMBOL UTAMA -->
                <div class="col-lg-6">
                    <!-- Badge Pengumuman -->
                    <div
                        class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-white shadow-sm mb-4 border">
                        <span class="badge bg-success rounded-pill px-2 py-1">PPDB 2026/2027</span>
                        <span class="small fw-semibold text-dark">Pendaftaran Siswa Baru Telah Dibuka!</span>
                        <i class="fas fa-arrow-right text-success small ms-1"></i>
                    </div>

                    <h1 class="display-4 font-heading fw-extrabold text-dark mb-3" style="line-height: 1.2;">
                        Membentuk Generasi <span style="color: #10B981;">Beriman, Berilmu, dan Beradab</span>
                    </h1>

                    <p class="lead text-secondary mb-4 fs-6" style="line-height: 1.8;">
                        Selamat datang di portal resmi <strong class="text-dark">SMP & SMK Bina Ikhwani Dramaga
                            Bogor</strong>. Sekolah bernuansa Islami dengan keunggulan akses mudah, biaya terjangkau, serta
                        didukung tenaga pendidik profesional yang bersahabat.
                    </p>

                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <a href="{{ route('ppdb.register') }}"
                            class="btn btn-success btn-lg px-4 py-3 fs-6 rounded-pill fw-bold shadow"
                            style="background-color: #10B981; border:none;">
                            <i class="fas fa-paper-plane me-2"></i> Daftar PPDB Online
                        </a>
                        <a href="#keunggulan"
                            class="btn btn-outline-dark btn-lg px-4 py-3 fs-6 rounded-pill fw-bold bg-white">
                            <i class="fas fa-compass me-2"></i> Jelajahi Sekolah
                        </a>
                    </div>

                    <!-- Mini Trust Indicators -->
                    <div class="d-flex align-items-center gap-4 pt-3 border-top">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success fs-5"></i>
                            <span class="small fw-semibold text-secondary">Terakreditasi B</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success fs-5"></i>
                            <span class="small fw-semibold text-secondary">Kurikulum Merdeka</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success fs-5"></i>
                            <span class="small fw-semibold text-secondary">Biaya Terjangkau</span>
                        </div>
                    </div>
                </div>

                <!-- KANAN: FRAME CAROUSEL FOTO SEKOLAH & FLOATING BADGE -->
                <div class="col-lg-6">
                    <div class="position-relative p-2 bg-white rounded-5 shadow-lg border">
                        <div class="position-relative overflow-hidden rounded-4">

                            <!-- =========================================================
                                     BOOTSTRAP 5 CAROUSEL (AUTO SLIDE SETIAP 3.5 DETIK)
                                     ========================================================= -->
                            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                                data-bs-interval="3500">
                                <!-- Indikator Titik di Bawah Foto -->
                                <div class="carousel-indicators mb-2" style="z-index: 5;">
                                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                                        aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>

                                <!-- Daftar Slide Foto -->
                                <div class="carousel-inner">
                                    <!-- FOTO SLIDE 1 -->
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/sekolah-1.png') }}" alt="Gedung Sekolah Bina Ikhwani"
                                            class="img-fluid w-100 object-fit-cover rounded-4"
                                            style="min-height: 400px; max-height: 460px; object-fit: cover;"
                                            onerror="this.onerror=null; this.src='images/sekolah-1.png';">
                                    </div>

                                    <!-- FOTO SLIDE 2 -->
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/sekolah-2.jpg') }}" alt="Kegiatan Belajar Siswa"
                                            class="img-fluid w-100 object-fit-cover rounded-4"
                                            style="min-height: 400px; max-height: 460px; object-fit: cover;"
                                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1000&auto=format&fit=crop';">
                                    </div>

                                    <!-- FOTO SLIDE 3 -->
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/sekolah-3.jpg') }}" alt="Fasilitas Sekolah"
                                            class="img-fluid w-100 object-fit-cover rounded-4"
                                            style="min-height: 400px; max-height: 460px; object-fit: cover;"
                                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=1000&auto=format&fit=crop';">
                                    </div>
                                </div>
                            </div>

                            <!-- OVERLAY INFO SEKOLAH (TETAP DIAM DI ATAS SLIDER) -->
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 p-md-4 pe-none"
                                style="background: linear-gradient(to top, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.5) 60%, transparent 100%); z-index: 4;">
                                <div class="d-flex align-items-center justify-content-between text-white">
                                    <div>
                                        <h5 class="font-heading fw-bold mb-0 text-white">SMP & SMK Bina Ikhwani</h5>
                                        <small class="text-white-50"><i class="fas fa-location-dot me-1 text-success"></i>
                                            Dramaga, Kab. Bogor</small>
                                    </div>
                                    <span class="badge bg-success px-3 py-2 rounded-pill shadow-sm">Lingkungan Asri &
                                        Kondusif</span>
                                </div>
                            </div>

                        </div>

                        <!-- FLOATING BADGE (KIRI ATAS - TETAP ADA) -->
                        <div class="position-absolute top-0 start-0 translate-middle-x mt-4 ms-4 d-none d-sm-block"
                            style="z-index: 10;">
                            <div class="bg-white p-3 rounded-4 shadow border d-flex align-items-center gap-3">
                                <div class="rounded-circle bg-success bg-opacity-10 text-success p-3 d-flex align-items-center justify-content-center"
                                    style="width: 48px; height: 48px;">
                                    <i class="fas fa-user-graduate fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">1.000+</h6>
                                    <small class="text-muted" style="font-size: 11px;">Alumni Sukses & Kerja</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- =========================================================================
             2. STATISTIK / ANGKA KEBANGGAAN
             ========================================================================= -->
    <section class="py-4 bg-white border-bottom">
        <div class="container py-3">
            <div class="row g-4 text-center justify-content-center">
                <div class="col-6 col-md-3 border-end-md">
                    <h2 class="display-5 font-heading fw-extrabold text-dark mb-0" style="color: #10B981;">2</h2>
                    <p class="text-muted small fw-semibold mb-0 text-uppercase tracking-wide">Jenjang Pendidikan (SMP & SMK)
                    </p>
                </div>
                <div class="col-6 col-md-3 border-end-md">
                    <h2 class="display-5 font-heading fw-extrabold text-dark mb-0">30+</h2>
                    <p class="text-muted small fw-semibold mb-0 text-uppercase tracking-wide">Guru & Staf Kompeten</p>
                </div>
                <div class="col-6 col-md-3 border-end-md">
                    <h2 class="display-5 font-heading fw-extrabold text-dark mb-0" style="color: #1E3A8A;">12+</h2>
                    <p class="text-muted small fw-semibold mb-0 text-uppercase tracking-wide">Ekstrakurikuler Aktif</p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="display-5 font-heading fw-extrabold text-dark mb-0">100%</h2>
                    <p class="text-muted small fw-semibold mb-0 text-uppercase tracking-wide">Lingkungan Nyaman & Religius
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
             3. SAMBUTAN KEPALA SEKOLAH / YAYASAN
             ========================================================================= -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="card border-0 rounded-5 shadow-sm overflow-hidden bg-white">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-4 position-relative text-center p-4 bg-light">
                        <img src="{{ asset('images/sambutan.png') }}" alt="Kepala Sekolah Bina Ikhwani"
                            class="img-fluid rounded-4 shadow-sm object-fit-cover" style="max-height: 380px; width: 100%;">
                    </div>
                    <div class="col-lg-8 p-4 p-lg-5">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span
                                class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill fw-bold">SAMBUTAN
                                HANGAT</span>
                        </div>
                        <h3 class="font-heading fw-bold text-dark mb-3">Pendidikan Berakhlak untuk Masa Depan yang Cerah
                        </h3>
                        <p class="text-secondary mb-4 fst-italic" style="line-height: 1.8;">
                            "Assalamu’alaikum Warahmatullahi Wabarakatuh. Kami di Yayasan Abdul Wahab (YAADHAB) dan keluarga
                            besar Bina Ikhwani berkomitmen untuk tidak hanya membekali ilmu pengetahuan dan keterampilan
                            kerja, tetapi juga menanamkan akhlakul karimah serta nilai-nilai keislaman. Kami menyambut
                            dengan tangan terbuka kehadiran putra-putri Anda untuk bertumbuh bersama di sekolah ini."
                        </p>
                        <div class="d-flex align-items-center justify-content-between border-top pt-3">
                            <div>
                                <h6 class="font-heading fw-bold mb-0 text-dark">H. Abdul Wahab, S.Pd.I., M.M.</h6>
                                <small class="text-muted">Ketua Yayasan / Kepala Sekolah Bina Ikhwani</small>
                            </div>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Jon_Kirsch_Signature.png"
                                alt="Tanda Tangan" style="height: 40px; opacity: 0.5;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
             4. MENGAPA MEMILIH KAMI / KEUNGGULAN
             ========================================================================= -->
    <section id="keunggulan" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-success fw-bold text-uppercase tracking-wider">Keunggulan Sekolah</span>
                <h2 class="font-heading fw-bold text-dark display-6 mt-1">Mengapa Memilih Bina Ikhwani?</h2>
                <p class="text-muted">Kami menawarkan pendidikan berkualitas dengan berbagai kemudahan dan keunggulan
                    kompetitif bagi setiap siswa.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 rounded-4 shadow-sm" style="background: #F8FAFC;">
                        <div class="rounded-circle bg-success text-white p-3 d-flex align-items-center justify-content-center mb-4 shadow-sm"
                            style="width: 56px; height: 56px;">
                            <i class="fas fa-wallet fs-4"></i>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">Biaya Sangat Terjangkau</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">Pendidikan berkualitas tidak harus
                            mahal. Kami menyediakan skema biaya yang transparan, terjangkau, serta kemudahan mencicil dan
                            beasiswa bagi yang berprestasi.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 rounded-4 shadow-sm" style="background: #F8FAFC;">
                        <div class="rounded-circle text-white p-3 d-flex align-items-center justify-content-center mb-4 shadow-sm"
                            style="width: 56px; height: 56px; background-color: #1E3A8A;">
                            <i class="fas fa-chalkboard-teacher fs-4"></i>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">Guru Bersahabat & Kompeten</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">Tenaga pendidik muda, enerjik, dan
                            sabar yang menempatkan diri sebagai mendidik sekaligus teman diskusi, menciptakan suasana
                            belajar yang bebas dari perundungan (anti-bullying).</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 rounded-4 shadow-sm" style="background: #F8FAFC;">
                        <div class="rounded-circle text-white p-3 d-flex align-items-center justify-content-center mb-4 shadow-sm"
                            style="width: 56px; height: 56px; background-color: #F59E0B;">
                            <i class="fas fa-mosque fs-4"></i>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">Pembinaan Karakter Islami</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">Rutin melaksanakan pembiasaan sholat
                            dhuha, tadarus Al-Qur'an, kajian keislaman, serta eskul keagamaan seperti Hadroh dan Kaligrafi.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 rounded-4 shadow-sm" style="background: #F8FAFC;">
                        <div class="rounded-circle bg-info text-white p-3 d-flex align-items-center justify-content-center mb-4 shadow-sm"
                            style="width: 56px; height: 56px;">
                            <i class="fas fa-map-marked-alt fs-4"></i>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">Akses Mudah & Strategis</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">Berada di wilayah Dramaga, Bogor
                            dengan akses transportasi umum yang mudah dijangkau, namun tetap berada di lingkungan yang
                            tenang dan asri untuk belajar.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 rounded-4 shadow-sm" style="background: #F8FAFC;">
                        <div class="rounded-circle bg-danger text-white p-3 d-flex align-items-center justify-content-center mb-4 shadow-sm"
                            style="width: 56px; height: 56px;">
                            <i class="fas fa-laptop-code fs-4"></i>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">Kurikulum Merdeka Berbasis Digital</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">Menerapkan pembelajaran modern yang
                            relevan dengan perkembangan teknologi digital, kesiapan kerja, dan kewirausahaan
                            (entrepreneurship).</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 border-0 rounded-4 shadow-sm" style="background: #F8FAFC;">
                        <div class="rounded-circle bg-dark text-white p-3 d-flex align-items-center justify-content-center mb-4 shadow-sm"
                            style="width: 56px; height: 56px;">
                            <i class="fas fa-handshake fs-4"></i>
                        </div>
                        <h5 class="font-heading fw-bold text-dark mb-2">Mitra Industri & Siap Kerja</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.7;">Khusus jenjang SMK, kami menjalin
                            kerjasama dengan berbagai perusahaan dan instansi untuk Program Praktek Kerja Lapangan (PKL) dan
                            penyerapan tenaga kerja.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
             5. SEKSI VISI & MISI SEKOLAH
             ========================================================================= -->
    <section id="visimisi" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-success fw-bold text-uppercase tracking-wider">Arah & Landasan Pendidikan</span>
                <h2 class="font-heading fw-bold text-dark display-6 mt-1">Visi & Misi Sekolah</h2>
                <p class="text-muted">Komitmen Yayasan Abdul Wahab (YAADHAB) dalam membina generasi unggul, berakhlak mulia,
                    dan berdaya saing.</p>
            </div>

            <div class="row g-4">
                <!-- VISI MISI SMP BINA IKHWANI -->
                <div class="col-lg-6">
                    <div class="card school-card h-100 p-4 p-lg-5 border-0 shadow-sm bg-white rounded-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="rounded-circle text-white p-3 d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 52px; height: 52px; background-color: #10B981;">
                                <i class="fas fa-bullseye fs-4"></i>
                            </div>
                            <div>
                                <span
                                    class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-1 rounded-pill">JENJANG
                                    SMP</span>
                                <h4 class="font-heading fw-bold text-dark mb-0 mt-1">SMP Bina Ikhwani</h4>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="font-heading fw-bold text-dark text-uppercase small text-success mb-2">
                                <i class="fas fa-eye me-1"></i> Visi Utama
                            </h6>
                            <div class="p-3 rounded-3 bg-light border border-success border-opacity-25 shadow-sm">
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
                    <div class="card school-card h-100 p-4 p-lg-5 border-0 shadow-sm bg-white rounded-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="rounded-circle text-white p-3 d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 52px; height: 52px; background-color: #1E3A8A;">
                                <i class="fas fa-compass fs-4"></i>
                            </div>
                            <div>
                                <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-1 rounded-pill"
                                    style="color: #1E3A8A !important;">JENJANG SMK</span>
                                <h4 class="font-heading fw-bold text-dark mb-0 mt-1">SMK Bina Ikhwani</h4>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="font-heading fw-bold text-dark text-uppercase small mb-2" style="color: #1E3A8A;">
                                <i class="fas fa-eye me-1"></i> Visi Utama
                            </h6>
                            <div class="p-3 rounded-3 bg-light border border-primary border-opacity-25 shadow-sm">
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

    <!-- =========================================================================
             6. JENJANG PENDIDIKAN & PROGRAM KEAHLIAN
             ========================================================================= -->
    <section id="jenjang" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-success fw-bold text-uppercase tracking-wider">Pilihan Akademik</span>
                <h2 class="font-heading fw-bold text-dark display-6 mt-1">Program Pendidikan & Jurusan</h2>
                <p class="text-muted">Pilih jenjang dan program keahlian sesuai minat dan masa depan putra-putri Anda.</p>
            </div>

            <!-- Cards Jenjang -->
            <div class="row g-4 justify-content-center mb-5">
                <div class="col-lg-6">
                    <div
                        class="card school-card h-100 p-4 p-lg-5 border-top border-5 border-success bg-light rounded-4 shadow-sm">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span
                                class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-pill">SMP</span>
                            <small class="text-muted fw-bold">NPSN: {{ $smp->npsn ?? '20270943' }}</small>
                        </div>
                        <h3 class="font-heading fw-bold text-dark mb-2">SMP Bina Ikhwani Bogor</h3>
                        <p class="text-muted small mb-4">Fokus pada pendidikan karakter keislaman, penguasaan bahasa dasar,
                            hafalan Al-Qur'an (Tahfidz), serta lingkungan belajar yang bersahabat dan nyaman.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                            <span class="small fw-bold text-dark"><i class="fas fa-users text-success me-1"></i> Kuota: 160
                                Siswa/i</span>
                            <span class="badge bg-success px-3 py-2">Akreditasi B</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card school-card h-100 p-4 p-lg-5 border-top border-5 border-primary bg-light rounded-4 shadow-sm"
                        style="border-top-color: #1E3A8A !important;">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-2 rounded-pill"
                                style="color: #1E3A8A !important;">SMK</span>
                            <small class="text-muted fw-bold">NPSN: {{ $smk->npsn ?? '69756305' }}</small>
                        </div>
                        <h3 class="font-heading fw-bold text-dark mb-2">SMK Bina Ikhwani Bogor</h3>
                        <p class="text-muted small mb-4">Menyiapkan lulusan terampil di bidang era digital masa kini yang
                            mandiri, profesional, dan siap langsung terjun ke dunia kerja maupun melanjutkan ke perguruan
                            tinggi.</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                            <span class="small fw-bold text-dark"><i class="fas fa-briefcase text-primary me-1"></i>
                                Kurikulum Merdeka</span>
                            <span class="badge bg-dark px-3 py-2">Kuota: 120 Siswa/i</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Jurusan SMK -->
            <div class="pt-3">
                <h4 class="font-heading fw-bold text-center text-dark mb-4">Kompetensi Keahlian SMK Bina Ikhwani</h4>
                <div class="row g-4 justify-content-center">
                    @forelse($majors as $major)
                        <div class="col-md-6">
                            <div class="card school-card h-100 p-4 rounded-4 shadow-sm border" style="background: #FFF;">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-3 p-3 text-white me-3" style="background-color: #0F172A;">
                                        <i class="{{ $major->icon ?? 'fas fa-briefcase' }} fs-3"></i>
                                    </div>
                                    <div>
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success fw-bold mb-1">{{ $major->kode }}</span>
                                        <h4 class="font-heading fw-bold text-dark mb-0">{{ $major->nama_jurusan }}</h4>
                                    </div>
                                </div>
                                <p class="text-secondary small mb-4">{{ $major->deskripsi }}</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="small fw-semibold text-success"><i class="fas fa-check-circle me-1"></i> Ready
                                        for Industry</span>
                                    <span class="text-muted small fw-bold">Siap Kerja / Kuliah</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Fallback jika data $majors di controller belum ada -->
                        <div class="col-md-6">
                            <div class="card school-card h-100 p-4 rounded-4 shadow-sm border bg-white">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-3 p-3 text-white me-3" style="background-color: #0F172A;">
                                        <i class="fas fa-chart-line fs-3"></i>
                                    </div>
                                    <div>
                                        <span class="badge bg-success bg-opacity-10 text-success fw-bold mb-1">BD / BDSP</span>
                                        <h4 class="font-heading fw-bold text-dark mb-0">Bisnis Digital</h4>
                                    </div>
                                </div>
                                <p class="text-secondary small mb-4">Mempelajari strategi pemasaran online, e-commerce, digital
                                    branding, sosial media marketing, dan desain konten bisnis modern.</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="small fw-semibold text-success"><i class="fas fa-check-circle me-1"></i> Ready
                                        for Industry</span>
                                    <span class="text-muted small fw-bold">Siap Kerja / Kuliah</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card school-card h-100 p-4 rounded-4 shadow-sm border bg-white">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-3 p-3 text-white me-3" style="background-color: #0F172A;">
                                        <i class="fas fa-folder-open fs-3"></i>
                                    </div>
                                    <div>
                                        <span class="badge bg-success bg-opacity-10 text-success fw-bold mb-1">MPLB /
                                            OTKP</span>
                                        <h4 class="font-heading fw-bold text-dark mb-0">Manajemen Perkantoran</h4>
                                    </div>
                                </div>
                                <p class="text-secondary small mb-4">Mempelajari tata kelola administrasi modern, kearsipan
                                    digital, komunikasi publik, public speaking, serta pelayanan prima (excellent service).</p>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="small fw-semibold text-success"><i class="fas fa-check-circle me-1"></i> Ready
                                        for Industry</span>
                                    <span class="text-muted small fw-bold">Siap Kerja / Kuliah</span>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
             7. FASILITAS & EKSTRAKURIKULER
             ========================================================================= -->
    <section id="fasilitas" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-success fw-bold text-uppercase tracking-wider">Sarana & Prasarana</span>
                <h2 class="font-heading fw-bold text-dark display-6 mt-1">Fasilitas & Ekstrakurikuler</h2>
                <p class="text-muted">Dukungan penuh untuk mengembangkan bakat akademik maupun non-akademik siswa.</p>
            </div>

            <!-- Grid Fasilitas -->
            <div class="row g-4 mb-5">
                <div class="col-6 col-md-3 text-center">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100 border">
                        <i class="fas fa-desktop fs-2 text-success mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">Lab Komputer</h6>
                        <small class="text-muted">Praktek digital & UNBK</small>
                    </div>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100 border">
                        <i class="fas fa-mosque fs-2 text-success mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">Mushola Sekolah</h6>
                        <small class="text-muted">Ibadah & kajian dhuha</small>
                    </div>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100 border">
                        <i class="fas fa-futbol fs-2 text-success mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">Lapangan Olahraga</h6>
                        <small class="text-muted">Futsal, voli & badminton</small>
                    </div>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100 border">
                        <i class="fas fa-wifi fs-2 text-success mb-3"></i>
                        <h6 class="fw-bold text-dark mb-1">Free Wi-Fi Area</h6>
                        <small class="text-muted">Akses literasi digital</small>
                    </div>
                </div>
            </div>

            <!-- Ekstrakurikuler Chips -->
            <div class="card p-4 p-md-5 rounded-4 border-0 shadow-sm bg-white text-center">
                <h5 class="font-heading fw-bold text-dark mb-3">Ekstrakurikuler Pembinaan Bakat & Karakter</h5>
                <p class="text-muted small mb-4">Pilih kegiatan ekstrakurikuler yang sesuai dengan passion dan bakatmu:</p>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6"><i
                            class="fas fa-drum text-success me-1"></i> Seni Hadroh</span>
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6"><i
                            class="fas fa-pen-nib text-success me-1"></i> Kaligrafi</span>
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6"><i
                            class="fas fa-campground text-success me-1"></i> Pramuka</span>
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6"><i
                            class="fas fa-futbol text-success me-1"></i> Futsal & Olahraga</span>
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6"><i
                            class="fas fa-quran text-success me-1"></i> Rohis / Tahfidz</span>
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6"><i
                            class="fas fa-language text-success me-1"></i> Club B. Arab & Inggris</span>
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6"><i
                            class="fas fa-video text-success me-1"></i> Multimedia & Desain</span>
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6"><i
                            class="fas fa-first-aid text-success me-1"></i> PMR (Palang Merah)</span>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
             8. ALUR PENDAFTARAN PPDB ONLINE
             ========================================================================= -->
    <section id="alur-ppdb" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-success fw-bold text-uppercase tracking-wider">Panduan Pendaftaran</span>
                <h2 class="font-heading fw-bold text-dark display-6 mt-1">Alur Pendaftaran PPDB Online</h2>
                <p class="text-muted">4 Langkah mudah pendaftaran siswa baru secara online dari rumah.</p>
            </div>

            <div class="row g-4 position-relative">
                <div class="col-md-3 text-center">
                    <div class="p-4 bg-light rounded-4 h-100 border position-relative">
                        <div class="rounded-circle bg-success text-white fw-bold d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm"
                            style="width: 48px; height: 48px; font-size: 1.25rem;">1</div>
                        <h6 class="fw-bold text-dark mb-2">Daftar Akun</h6>
                        <p class="text-muted small mb-0">Klik tombol daftar PPDB dan buat akun menggunakan NISN, email, atau
                            nomor WhatsApp aktif.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="p-4 bg-light rounded-4 h-100 border position-relative">
                        <div class="rounded-circle bg-success text-white fw-bold d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm"
                            style="width: 48px; height: 48px; font-size: 1.25rem;">2</div>
                        <h6 class="fw-bold text-dark mb-2">Isi Formulir</h6>
                        <p class="text-muted small mb-0">Lengkapi biodata calon siswa, data orang tua/wali, serta pilih
                            jenjang (SMP/SMK) & jurusan.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="p-4 bg-light rounded-4 h-100 border position-relative">
                        <div class="rounded-circle bg-success text-white fw-bold d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm"
                            style="width: 48px; height: 48px; font-size: 1.25rem;">3</div>
                        <h6 class="fw-bold text-dark mb-2">Upload Berkas</h6>
                        <p class="text-muted small mb-0">Unggah foto/scan berkas pendukung seperti KK, Akta Kelahiran,
                            Ijazah/SKL, dan Pas Foto terbaru.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="p-4 bg-light rounded-4 h-100 border position-relative">
                        <div class="rounded-circle bg-dark text-white fw-bold d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm"
                            style="width: 48px; height: 48px; font-size: 1.25rem;">4</div>
                        <h6 class="fw-bold text-dark mb-2">Verifikasi & Daftar Ulang</h6>
                        <p class="text-muted small mb-0">Tunggu verifikasi admin sekolah, cetak bukti pendaftaran, dan
                            lakukan daftar ulang ke sekolah.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('ppdb.register') }}"
                    class="btn btn-success btn-lg px-5 py-3 rounded-pill fw-bold shadow-sm"
                    style="background-color: #10B981; border:none;">
                    <i class="fas fa-user-plus me-2"></i> Mulai Pendaftaran Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
             9. BERITA & AGENDA SEKOLAH (DINAMIS)
             ========================================================================= -->
    <section id="berita" class="py-5 bg-light">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <span class="text-success fw-bold text-uppercase tracking-wider">Kabar Sekolah</span>
                    <h2 class="font-heading fw-bold text-dark display-6 mb-0">Berita & Agenda Terbaru</h2>
                </div>
                <!-- Tombol Lihat Semua Berita sudah aktif! -->
                <a href="{{ route('public.news.index') }}"
                    class="btn btn-outline-dark rounded-pill px-4 d-none d-md-block">Lihat Semua Berita &rarr;</a>
            </div>

            <div class="row g-4">
                @forelse($latestNews as $item)
                    <div class="col-md-4">
                        <div
                            class="card school-card h-100 border-0 shadow-sm bg-white rounded-4 overflow-hidden d-flex flex-column">
                            <div class="img-zoom-container bg-secondary bg-opacity-10" style="height: 200px; overflow: hidden;">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="img-fluid w-100 h-100 object-fit-cover">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                        <i class="fas fa-newspaper fa-3x opacity-25"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body p-4 d-flex flex-column flex-grow-1">
                                <div class="d-flex justify-content-between text-muted small mb-2">
                                    <span><i class="far fa-calendar-alt me-1"></i>
                                        {{ $item->created_at->format('d M Y') }}</span>
                                    <span
                                        class="badge {{ $item->kategori == 'Agenda' ? 'bg-warning text-dark' : 'bg-success bg-opacity-10 text-success' }}">{{ $item->kategori }}</span>
                                </div>
                                <h5 class="font-heading fw-bold text-dark mb-2">{{ $item->judul }}</h5>
                                <p class="text-muted small mb-4 flex-grow-1">{{ Str::limit(strip_tags($item->konten), 100) }}
                                </p>
                                <a href="{{ route('public.news.show', $item->slug) }}"
                                    class="fw-bold text-success text-decoration-none small mt-auto">Baca Selengkapnya &rarr;</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada berita atau agenda yang diterbitkan oleh sekolah.</p>
                    </div>
                @endforelse
            </div>

            <!-- Tombol untuk layar HP (Mobile) -->
            <div class="mt-4 text-center d-block d-md-none">
                <a href="{{ route('public.news.index') }}" class="btn btn-outline-dark rounded-pill px-4 w-100">Lihat Semua
                    Berita &rarr;</a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
             10. TESTIMONI ALUMNI & ORANG TUA
             ========================================================================= -->
    <section id="testimoni" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-success fw-bold text-uppercase tracking-wider">Kata Mereka</span>
                <h2 class="font-heading fw-bold text-dark display-6 mt-1">Testimoni Alumni & Orang Tua</h2>
                <p class="text-muted">Bukti nyata dedikasi kami dalam mendidik generasi penerus bangsa.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 p-4 rounded-4 shadow-sm border bg-light">
                        <div class="text-warning mb-3">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-secondary small fst-italic mb-4 flex-grow-1">"Alhamdulillah anak saya sekolah di SMP
                            Bina Ikhwani banyak perubahan positif. Sholatnya jadi rajin, akhlaknya bagus, dan biaya
                            sekolahnya sangat membantu kami sebagai orang tua."</p>
                        <div class="d-flex align-items-center gap-3 border-top pt-3">
                            <div class="rounded-circle bg-success text-white fw-bold d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;">B</div>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark small">Bapak Heryanto</h6>
                                <small class="text-muted" style="font-size: 11px;">Orang Tua Siswa Kelas VIII</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 p-4 rounded-4 shadow-sm border bg-light">
                        <div class="text-warning mb-3">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-secondary small fst-italic mb-4 flex-grow-1">"Lulus dari SMK Bina Ikhwani jurusan
                            Administrasi Perkantoran, saya langsung diterima kerja admin di perusahaan swasta di Bogor. Ilmu
                            praktek komputer dari guru-gurunya sangat terpakai!"</p>
                        <div class="d-flex align-items-center gap-3 border-top pt-3">
                            <div class="rounded-circle bg-primary text-white fw-bold d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;">S</div>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark small">Siti Rahmawati</h6>
                                <small class="text-muted" style="font-size: 11px;">Alumni SMK Angkatan 2024</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 p-4 rounded-4 shadow-sm border bg-light">
                        <div class="text-warning mb-3">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-secondary small fst-italic mb-4 flex-grow-1">"Suasana sekolahnya asri dan gurunya
                            asik banget, kaya temen sendiri tapi tetap tegas. Belajar bisnis digital di sini bikin saya bisa
                            buka online shop sendiri sejak kelas 11."</p>
                        <div class="d-flex align-items-center gap-3 border-top pt-3">
                            <div class="rounded-circle bg-dark text-white fw-bold d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;">R</div>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark small">Rizki Maulana</h6>
                                <small class="text-muted" style="font-size: 11px;">Alumni SMK Bisnis Digital</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
         11. GALERI FOTO KEGIATAN (DINAMIS & DITAMBAH TOMBOL)
         ========================================================================= -->
    <section id="galeri" class="py-5 bg-white">
        <div class="container py-4">
            <!-- Kita ubah header galeri agar ada tombol "Lihat Semua Galeri" di kanan seperti berita -->
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <span class="text-success fw-bold text-uppercase tracking-wider">Dokumentasi</span>
                    <h2 class="font-heading fw-bold text-dark display-6 mb-0">Galeri Kegiatan Sekolah</h2>
                </div>
                <!-- Tombol Lihat Semua Galeri (Yang kamu lingkari hitam!) -->
                <a href="{{ route('public.gallery.index') }}"
                    class="btn btn-outline-dark rounded-pill px-4 d-none d-md-block">Lihat Semua Galeri &rarr;</a>
            </div>

            <div class="row g-3">
                @forelse($galleries as $foto)
                    <div class="col-md-4 col-6">
                        <div class="overflow-hidden rounded-4 shadow-sm position-relative group" style="height: 240px;">
                            <img src="{{ asset('storage/' . $foto->gambar) }}" class="img-fluid w-100 h-100"
                                style="object-fit: cover; transition: transform 0.3s;" alt="{{ $foto->judul }}"
                                onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-50 text-white small fw-semibold text-truncate"
                                style="backdrop-filter: blur(2px);">
                                {{ $foto->judul }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada dokumentasi foto kegiatan sekolah.</p>
                    </div>
                @endforelse
            </div>

            <!-- Tombol Galeri untuk layar HP (Mobile) -->
            <div class="mt-4 text-center d-block d-md-none">
                <a href="{{ route('public.gallery.index') }}" class="btn btn-outline-dark rounded-pill px-4 w-100">Lihat
                    Semua Galeri &rarr;</a>
            </div>
        </div>
    </section>

    <!-- =========================================================================
             12. FAQ (PERTANYAAN YANG SERING DIAJUKAN)
             ========================================================================= -->
    <section id="faq" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center max-w-2xl mx-auto mb-5">
                <span class="text-success fw-bold text-uppercase tracking-wider">Tanya Jawab</span>
                <h2 class="font-heading fw-bold text-dark display-6 mt-1">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-muted">Temukan jawaban atas keraguan atau pertanyaan seputar PPDB Bina Ikhwani.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion accordion-flush shadow-sm rounded-4 overflow-hidden border" id="accordionFAQ">

                        <div class="accordion-item border-bottom">
                            <h2 class="accordion-header" id="faqOne">
                                <button class="accordion-button fw-bold text-dark py-3 px-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <i class="fas fa-question-circle text-success me-2"></i> Kapan jadwal pendaftaran PPDB
                                    Bina Ikhwani dibuka?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne"
                                data-bs-parent="#accordionFAQ">
                                <div class="accordion-body px-4 py-3 text-secondary small" style="line-height: 1.7;">
                                    Pendaftaran PPDB Tahun Ajaran Baru saat ini <strong>telah resmi dibuka</strong> untuk
                                    gelombang pertama. Pendaftaran dapat ditutup sewaktu-waktu jika kuota kelas sudah
                                    terpenuhi. Kami menyarankan untuk segera mendaftar lebih awal.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-bottom">
                            <h2 class="accordion-header" id="faqTwo">
                                <button class="accordion-button collapsed fw-bold text-dark py-3 px-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    <i class="fas fa-question-circle text-success me-2"></i> Apa saja persyaratan berkas
                                    untuk mendaftar?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo"
                                data-bs-parent="#accordionFAQ">
                                <div class="accordion-body px-4 py-3 text-secondary small" style="line-height: 1.7;">
                                    Persyaratan dasar adalah fotokopi/scan Kartu Keluarga (KK), Akta Kelahiran, KTP Orang
                                    Tua/Wali, Ijazah atau Surat Keterangan Lulus (SKL) dari sekolah asal, serta Pas Foto
                                    terbaru berukuran 3x4 (2 lembar).
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-bottom">
                            <h2 class="accordion-header" id="faqThree">
                                <button class="accordion-button collapsed fw-bold text-dark py-3 px-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <i class="fas fa-question-circle text-success me-2"></i> Apakah tersedia beasiswa atau
                                    kemudahan cicilan biaya?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree"
                                data-bs-parent="#accordionFAQ">
                                <div class="accordion-body px-4 py-3 text-secondary small" style="line-height: 1.7;">
                                    Ya, tentu! Sesuai komitmen kami bahwa biaya pendidikan di Bina Ikhwani terjangkau, kami
                                    menyediakan kemudahan pembayaran uang pangkal secara dicicil, serta beasiswa khusus
                                    untuk siswa berprestasi (akademik/non-akademik) dan hafidz Al-Qur'an.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqFour">
                                <button class="accordion-button collapsed fw-bold text-dark py-3 px-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    <i class="fas fa-question-circle text-success me-2"></i> Di mana alamat tepatnya SMP &
                                    SMK Bina Ikhwani?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour"
                                data-bs-parent="#accordionFAQ">
                                <div class="accordion-body px-4 py-3 text-secondary small" style="line-height: 1.7;">
                                    Kami berlokasi di wilayah Dramaga, Kabupaten Bogor. Lokasi sekolah mudah dijangkau
                                    dengan kendaraan pribadi maupun transportasi umum. Anda dapat menghubungi WhatsApp kami
                                    untuk meminta titik koordinat Google Maps yang akurat.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================================================================
             13. BANNER PPDB PENUTUP
             ========================================================================= -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="card border-0 rounded-5 shadow-lg overflow-hidden text-white p-5 position-relative"
                style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">
                <!-- Background Decoration inside Card -->
                <div class="position-absolute end-0 bottom-0 translate-middle-y opacity-10 pe-none me-4 d-none d-lg-block">
                    <i class="fas fa-user-graduate" style="font-size: 18rem;"></i>
                </div>

                <div class="row align-items-center position-relative">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <span class="badge bg-white text-success fw-bold px-3 py-2 rounded-pill mb-3 shadow-sm">INFO
                            PENDAFTARAN SISWA BARU</span>
                        <h2 class="display-6 font-heading fw-bold mb-2">PPDB Tahun Ajaran 2026/2027 Telah Dibuka!</h2>
                        <p class="mb-0 text-white-50 fs-6" style="line-height: 1.7; max-width: 600px;">
                            Segera daftarkan putra/putri Anda dan bergabunglah menjadi bagian dari keluarga besar SMP & SMK
                            Bina Ikhwani Dramaga Bogor. Kuota terbatas!
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="d-flex flex-column flex-sm-row flex-lg-column gap-2 justify-content-lg-end">
                            <a href="{{ route('ppdb.register') }}"
                                class="btn btn-dark btn-lg px-5 py-3 fw-bold rounded-pill shadow"
                                style="background: #0F172A; border: none;">
                                <i class="fas fa-paper-plane me-2"></i> Daftar PPDB Sekarang
                            </a>
                            <a href="https://wa.me/6281234567890" target="_blank"
                                class="btn btn-outline-light btn-lg px-4 py-3 fw-bold rounded-pill">
                                <i class="fab fa-whatsapp me-2"></i> Chat Panitia PPDB
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection