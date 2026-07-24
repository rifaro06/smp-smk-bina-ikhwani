<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Panel PPDB - Bina Ikhwani</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background: #0F172A; min-height: 100vh; display: flex; align-items: center; }
        .login-card { background: #ffffff; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.3); overflow: hidden; }
        .font-heading { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="login-card p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-user-shield fa-2x"></i>
                        </div>
                        <h4 class="font-heading fw-bold text-dark mb-1">Panitia PPDB</h4>
                        <p class="text-secondary small mb-0">SMP & SMK Bina Ikhwani Bogor</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger small p-3 rounded-3">
                            <i class="fas fa-exclamation-triangle me-1"></i> {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('admin.login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Email Admin</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                <input type="email" name="email" class="form-control border-start-0 ps-0" value="{{ old('email', 'admin@binaikhwani.sch.id') }}" required placeholder="email@sekolah.sch.id">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                                <input type="password" name="password" class="form-control border-start-0 ps-0" value="password123" required placeholder="••••••••">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold rounded-pill shadow-sm" style="background-color: #10B981; border: none;">
                            <i class="fas fa-sign-in-alt me-1"></i> Masuk ke Panel
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <a href="{{ route('home') }}" class="small text-decoration-none text-muted"><i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda Sekolah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>