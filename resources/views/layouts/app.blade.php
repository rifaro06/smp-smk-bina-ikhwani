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
            --bg-light: #F8FAFC;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: #334155;
        }

        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Navbar Sekolah Resmi */
        .navbar-school {
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border-bottom: 3px solid var(--accent-emerald);
        }

        .nav-link {
            font-weight: 600;
            color: var(--primary-navy) !important;
            padding: 10px 15px !important;
            transition: all 0.2s;
        }

        .nav-link:hover {
            color: var(--accent-emerald) !important;
        }

        /* Card & Hover Effects */
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

        /* News Image Zoom */
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

        .hover-white:hover {
            color: #ffffff !important;
        }

        .fs-xs {
            font-size: 0.75rem;
        }

        footer {
            background: var(--primary-navy);
            color: #94A3B8;
        }
    </style>
</head>

<body>

    <!-- NAVBAR RESMI SEKOLAH -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-school py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo Bina Ikhwani"
                    style="height: 50px; width: auto;"
                    onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Bina+Ikhwani&background=0F172A&color=fff&bold=true';">

                <div>
                    <span class="fs-5 font-heading fw-bold text-dark d-block mb-0"
                        style="letter-spacing: -0.5px; line-height:1.1;">BINA IKHWANI</span>
                    <small class="text-secondary fw-semibold d-block"
                        style="font-size: 11px; letter-spacing: 0.5px;">SMP & SMK DRAMAGA BOGOR</small>
                </div>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#visimisi">Visi & Misi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jenjang">Jenjang Pendidikan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jurusan">Program Keahlian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berita">Berita & Agenda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-success fw-bold px-4 py-2 rounded-pill shadow-sm"
                            style="background-color: #10B981; border:none;" href="{{ route('ppdb.register') }}">
                            <i class="fas fa-user-plus me-1"></i> PPDB Online
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
    <footer class="bg-dark text-white pt-5 pb-4 border-top border-success border-4"
        style="background-color: #0F172A !important;">
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
                            class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"
                            class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px;"><i class="fab fa-instagram"></i></a>
                        <a href="#"
                            class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px;"><i class="fab fa-youtube"></i></a>
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="btn btn-outline-success btn-sm rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px;"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- KOLOM 2: TAUTAN PINTAR -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="font-heading fw-bold text-white text-uppercase mb-3" style="letter-spacing: 1px;">
                        Navigasi</h6>
                    <ul class="list-unstyled small mb-0 d-flex flex-column gap-2">
                        <li><a href="{{ route('home') }}" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-1 fs-xs text-success"></i> Beranda</a></li>
                        <li><a href="#visimisi" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-1 fs-xs text-success"></i> Visi & Misi</a></li>
                        <li><a href="#jenjang" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-1 fs-xs text-success"></i> Jenjang SMP/SMK</a></li>
                        <li><a href="#jurusan" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-1 fs-xs text-success"></i> Jurusan SMK</a></li>
                        <li><a href="#berita" class="text-white-50 text-decoration-none hover-white"><i
                                    class="fas fa-chevron-right me-1 fs-xs text-success"></i> Berita Sekolah</a></li>
                        <li><a href="{{ route('ppdb.register') }}" class="text-success fw-bold text-decoration-none"><i
                                    class="fas fa-chevron-right me-1 fs-xs"></i> Pendaftaran PPDB</a></li>
                    </ul>
                </div>

                <!-- KOLOM 3: KONTAK -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="font-heading fw-bold text-white text-uppercase mb-3" style="letter-spacing: 1px;">Hubungi Kami</h6>
                    <ul class="list-unstyled small mb-0 d-flex flex-column gap-3">
                        <li class="d-flex align-items-start gap-2">
                            <i class="fab fa-whatsapp text-success fs-5 mt-1"></i>
                            <div>
                                <span class="d-block text-white-50 small">WhatsApp / PPDB Hotline:</span>
                                <a href="https://wa.me/6281234567890" target="_blank"
                                    class="text-white fw-bold text-decoration-none">+62 812-3456-7890</a>
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
                    <h6 class="font-heading fw-bold text-white text-uppercase mb-3" style="letter-spacing: 1px;">Alamat Sekolah</h6>
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
                        class="btn btn-outline-light btn-sm rounded-pill w-100 mt-2">
                        <i class="fas fa-map-marked-alt text-success me-1"></i> Buka Google Maps
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