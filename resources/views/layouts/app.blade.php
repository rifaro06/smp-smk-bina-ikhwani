<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Resmi SMP & SMK Bina Ikhwani Bogor</title>

    <!-- Google Fonts: Inter & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5 & FontAwesome 6 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        :root {
            --primary-navy: #0F172A;
            --secondary-blue: #1E3A8A;
            --accent-emerald: #10B981;
            --accent-emerald-hover: #059669;
            --bg-light: #F8FAFC;
        }

        /* Mencegah judul seksi tertutup sticky navbar saat anchor link diklik */
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 85px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: #334155;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .font-heading {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* --- NAVBAR SEKOLAH RESMI (GLASSMORPHISM) --- */
        .navbar-school {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.06);
            border-bottom: 3px solid var(--accent-emerald);
            transition: all 0.3s ease;
        }

        .nav-link {
            font-weight: 600;
            color: var(--primary-navy) !important;
            padding: 8px 16px !important;
            margin: 0 2px;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--accent-emerald) !important;
        }

        /* Animasi garis bawah pada menu navigasi */
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 4px;
            left: 16px;
            background-color: var(--accent-emerald);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: calc(100% - 32px);
        }

        /* Tombol Kustom PPDB */
        .btn-ppdb {
            background-color: var(--accent-emerald);
            color: #ffffff !important;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-ppdb:hover {
            background-color: var(--accent-emerald-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(16, 185, 129, 0.3) !important;
        }

        /* --- CARD & HOVER EFFECTS (LANDING PAGE) --- */
        .school-card {
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #fff;
        }

        .school-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.08);
        }

        .img-zoom-container {
            overflow: hidden;
            border-radius: 16px 16px 0 0;
        }

        .img-zoom {
            transition: transform 0.5s ease;
        }

        .school-card:hover .img-zoom {
            transform: scale(1.08);
        }

        /* --- FOOTER SEKOLAH --- */
        .footer-school {
            background-color: var(--primary-navy);
            color: #94A3B8;
            border-top: 4px solid var(--accent-emerald);
        }

        .hover-white {
            transition: all 0.2s ease;
        }

        .hover-white:hover {
            color: #ffffff !important;
            padding-left: 4px;
        }

        .btn-social {
            width: 36px;
            height: 36px;
            border-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .btn-social:hover {
            background-color: var(--accent-emerald);
            border-color: var(--accent-emerald);
            color: #ffffff;
            transform: translateY(-3px);
        }

        .fs-xs {
            font-size: 0.75rem;
        }
    </style>
</head>

<body>

    <!-- NAVBAR RESMI SEKOLAH -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-school py-2 py-lg-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo Bina Ikhwani"
                    style="height: 48px; width: auto;"
                    onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Bina+Ikhwani&background=0F172A&color=fff&bold=true';">

                <div>
                    <span class="fs-5 font-heading fw-bold text-dark d-block mb-0"
                        style="letter-spacing: -0.5px; line-height: 1.1;">BINA IKHWANI</span>
                    <small class="text-secondary fw-semibold d-block"
                        style="font-size: 11px; letter-spacing: 0.5px;">SMP & SMK DRAMAGA BOGOR</small>
                </div>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#visimisi">Visi & Misi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jenjang">Jenjang Pendidikan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berita">Berita & Agenda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item mt-2 mt-lg-0 ms-lg-3">
                        <a class="btn btn-ppdb fw-bold px-4 py-2 rounded-pill shadow-sm d-inline-flex align-items-center gap-2"
                            href="{{ route('ppdb.register') }}">
                            <i class="fas fa-user-plus"></i> <span>PPDB Online</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('public.ppdb.cek_status') }}">
                            <i class="fas fa-search me-1"></i> Cek Status
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- KONTEN HALAMAN -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER UTAMA -->
    <footer class="footer-school pt-5 pb-4">
        <div class="container">
            <div class="row g-4 mb-4">

                <!-- KOLOM 1: PROFIL SINGKAT -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <a class="text-decoration-none d-flex align-items-center gap-3" href="{{ route('home') }}">
                            <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo Bina Ikhwani"
                                style="height: 45px; width: auto;"
                                onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Bina+Ikhwani&background=0F172A&color=fff&bold=true';">
                            <span class="font-heading fw-bold fs-5 text-white">BINA IKHWANI</span>
                        </a>
                    </div>
                    <p class="text-white-50 small mb-4" style="line-height: 1.7;">
                        Lembaga Pendidikan di bawah naungan <strong>Yayasan Abdul Wahab (YAADHAB)</strong>.
                        Menyelenggarakan jenjang SMP dan SMK yang beriman, berilmu, dan beradab.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#"
                            class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center btn-social"
                            aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"
                            class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center btn-social"
                            aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#"
                            class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center btn-social"
                            aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center btn-social"
                            style="background-color: var(--accent-emerald); border-color: var(--accent-emerald);"
                            aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- KOLOM 2: TAUTAN PINTAR -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="font-heading fw-bold text-white text-uppercase mb-3" style="letter-spacing: 1px;">
                        Navigasi</h6>
                    <ul class="list-unstyled small mb-0 d-flex flex-column gap-2">
                        <li><a href="{{ route('home') }}" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-2 fs-xs text-success"></i>Beranda</a></li>
                        <li><a href="#visimisi" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-2 fs-xs text-success"></i>Visi & Misi</a></li>
                        <li><a href="#jenjang" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-2 fs-xs text-success"></i>Jenjang SMP/SMK</a></li>
                        <li><a href="#jurusan" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-2 fs-xs text-success"></i>Jurusan SMK</a></li>
                        <li><a href="#berita" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-2 fs-xs text-success"></i>Berita Sekolah</a></li>
                        <li class="mt-1"><a href="{{ route('ppdb.register') }}"
                                class="text-success fw-bold text-decoration-none hover-white"><i
                                    class="fas fa-user-plus me-2 fs-xs"></i>Pendaftaran PPDB</a></li>
                    </ul>
                </div>

                <!-- KOLOM 3: KONTAK -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="font-heading fw-bold text-white text-uppercase mb-3" style="letter-spacing: 1px;">Hubungi
                        Kami</h6>
                    <ul class="list-unstyled small mb-0 d-flex flex-column gap-3">
                        <li class="d-flex align-items-start gap-2">
                            <i class="fab fa-whatsapp text-success fs-5 mt-1"></i>
                            <div>
                                <span class="d-block text-white-50 small">WhatsApp / PPDB Hotline:</span>
                                <a href="https://wa.me/6281234567890" target="_blank"
                                    class="text-white fw-bold text-decoration-none hover-white">+62 812-3456-7890</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="far fa-envelope text-success fs-6 mt-1"></i>
                            <div>
                                <span class="d-block text-white-50 small">Email Layanan:</span>
                                <span class="text-white fw-semibold">info@binaikhwani.sch.id</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="far fa-clock text-success fs-6 mt-1"></i>
                            <div>
                                <span class="d-block text-white-50 small">Jam Pelayanan Kantor:</span>
                                <span class="text-white fw-semibold">Senin - Sabtu (07.30 - 15.00 WIB)</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- KOLOM 4: ALAMAT KHUSUS SEKOLAH -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="font-heading fw-bold text-white text-uppercase mb-3" style="letter-spacing: 1px;">Alamat
                        Sekolah</h6>
                    <div class="d-flex align-items-start gap-2 mb-3">
                        <i class="fas fa-location-dot text-success fs-5 mt-1"></i>
                        <div>
                            <strong class="text-white d-block mb-1">SMP & SMK Bina Ikhwani</strong>
                            <p class="text-white-50 small mb-0" style="line-height: 1.6;">
                                Jl. Raya Dramaga No. 123, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680
                            </p>
                        </div>
                    </div>
                    <a href="https://maps.app.goo.gl/EvCPNx73Y11zQiHP8" target="_blank"
                        class="btn btn-outline-light btn-sm rounded-pill w-100 mt-2 d-flex align-items-center justify-content-center gap-2 btn-social"
                        style="width: 100% !important; height: auto; padding: 8px 16px;">
                        <i class="fas fa-map-marked-alt text-success"></i> <span>Buka Google Maps</span>
                    </a>
                </div>

            </div>

            <hr class="border-secondary opacity-25 my-4">

            <!-- COPYRIGHT BAWAH -->
            <div class="row align-items-center small text-white-50">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    &copy; {{ date('Y') }} <strong>SMP & SMK Bina Ikhwani Dramaga Bogor</strong>. All rights reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <span>Yayasan Abdul Wahab (YAADHAB)</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>