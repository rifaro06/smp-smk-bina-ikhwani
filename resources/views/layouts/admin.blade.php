<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin PPDB - Bina Ikhwani</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F8FAFC;
            color: #1E293B;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .font-heading { font-family: 'Plus Jakarta Sans', sans-serif; }
        .admin-navbar {
            background: #0F172A;
            border-bottom: 3px solid #10B981;
        }
    </style>
</head>
<body>

    <!-- NAVBAR KHUSUS ADMIN -->
    <nav class="navbar navbar-expand-lg navbar-dark admin-navbar py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                    <i class="fas fa-shield-alt small"></i>
                </div>
                <div>
                    <span class="font-heading fw-bold d-block lh-1" style="font-size: 16px;">ADMIN BI-One</span>
                    <small class="text-secondary" style="font-size: 11px;">SMP & SMK Bina Ikhwani</small>
                </div>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active text-success fw-semibold' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-desktop me-1"></i> Dashboard
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-light rounded-pill px-3">
                        <i class="fas fa-globe me-1"></i> Lihat Website
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3 fw-bold">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- KONTEN HALAMAN ADMIN -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- FOOTER ADMIN -->
    <footer class="bg-white border-top py-3 mt-auto text-center text-muted small">
        <div class="container">
            &copy; {{ date('Y') }} Portal PPDB SMP & SMK Bina Ikhwani Bogor — Sistem Manajemen Panitia
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>