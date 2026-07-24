@extends('layouts.app')

@section('content')
    <div class="py-5" style="background-color: var(--bg-light);">
        <div class="container">

            <!-- Header Form -->
            <div class="row justify-content-center text-center mb-4">
                <div class="col-lg-8">
                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold mb-2">
                        <i class="fas fa-door-open me-1"></i> PPDB ONLINE {{ date('Y') }}/{{ date('Y') + 1 }}
                    </span>
                    <h1 class="font-heading fw-bold text-dark">Formulir Pendaftaran Siswa Baru</h1>
                    <p class="text-secondary">Lengkapi data diri dan unggah dokumen persyaratan calon peserta didik baru.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <!-- NOTIFIKASI SUKSES -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show p-4 rounded-4 shadow-sm mb-4 border-0"
                            role="alert" style="background-color: #D1FAE5; color: #065F46;">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fas fa-check-circle fa-2x"></i>
                                <div>
                                    <h5 class="alert-heading fw-bold mb-1">Alhamdulillah, Pendaftaran Berhasil!</h5>
                                    <p class="mb-0 small">{{ session('success') }}</p>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card school-card border-0 shadow-sm p-4 p-md-5">

                        <!-- WAJIB ADD: enctype="multipart/form-data" -->
                        <form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- SEKSI 1: DATA PRIBADI -->
                            <h5 class="font-heading fw-bold text-dark mb-3 pb-2 border-bottom border-2"
                                style="border-color: var(--accent-emerald) !important;">
                                <i class="fas fa-user-graduate text-success me-2"></i>1. Data Pribadi Siswa
                            </h5>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap Sesuai Ijazah <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap"
                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    value="{{ old('nama_lengkap') }}" required placeholder="Contoh: Ahmad Rifai">
                                @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">NISN (10 Digit) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" inputmode="numeric" name="nisn"
                                        class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}"
                                        required placeholder="Contoh: 0123456789">
                                    @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">NIK KTP / Kartu Keluarga (16 Digit) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" inputmode="numeric" name="nik"
                                        class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                                        required placeholder="Contoh: 3201xxxxxxxxxxxx">
                                    @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Alamat Email Aktif <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Contoh: ahmadrifai@gmail.com" value="{{ old('email') }}" required>
                                <div class="form-text small text-muted">
                                    <i class="fas fa-info-circle me-1"></i> Gunakan email aktif. Email ini dapat digunakan
                                    untuk mengecek status pendaftaran Anda.
                                </div>
                            </div>

                            <!-- SEKSI 2: JENJANG & JURUSAN -->
                            <h5 class="font-heading fw-bold text-dark mb-3 pb-2 border-bottom border-2"
                                style="border-color: var(--accent-emerald) !important;">
                                <i class="fas fa-graduation-cap text-success me-2"></i>2. Pilihan Jenjang & Jurusan
                            </h5>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Pilih Jenjang Sekolah <span
                                            class="text-danger">*</span></label>
                                    <select name="jenjang_pilihan" id="jenjang_select"
                                        class="form-select @error('jenjang_pilihan') is-invalid @enderror" required>
                                        <option value="">-- Pilih Jenjang --</option>
                                        <option value="SMP" {{ old('jenjang_pilihan') == 'SMP' ? 'selected' : '' }}>SMP Bina
                                            Ikhwani</option>
                                        <option value="SMK" {{ old('jenjang_pilihan') == 'SMK' ? 'selected' : '' }}>SMK Bina
                                            Ikhwani</option>
                                    </select>
                                    @error('jenjang_pilihan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6 d-none" id="major_container">
                                    <label class="form-label fw-semibold">Pilih Jurusan (Khusus SMK) <span
                                            class="text-danger">*</span></label>
                                    <select name="major_id" id="major_select"
                                        class="form-select @error('major_id') is-invalid @enderror">
                                        <option value="">-- Pilih Jurusan SMK --</option>
                                        @foreach($majors as $major)
                                            <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                                {{ $major->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('major_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- SEKSI 3: UNGGAN DOKUMEN FISIK REAL -->
                            <h5 class="font-heading fw-bold text-dark mb-3 pb-2 border-bottom border-2"
                                style="border-color: var(--accent-emerald) !important;">
                                <i class="fas fa-cloud-upload-alt text-success me-2"></i>3. Upload Dokumen Persyaratan
                            </h5>
                            <p class="text-muted small mb-3">Format file yang diperbolehkan: <strong>PDF, JPG, JPEG,
                                    PNG</strong> (Maksimal 2 MB per file).</p>

                            <div class="row g-3 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Upload Kartu Keluarga (KK) <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="document_kk"
                                        class="form-control @error('document_kk') is-invalid @enderror"
                                        accept=".pdf,.jpg,.jpeg,.png" required>
                                    @error('document_kk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Upload Ijazah / Surat Keterangan Lulus <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="document_ijazah"
                                        class="form-control @error('document_ijazah') is-invalid @enderror"
                                        accept=".pdf,.jpg,.jpeg,.png" required>
                                    @error('document_ijazah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- TOMBOL SUBMIT -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-ppdb px-5 py-3 fw-bold rounded-pill shadow-sm">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Formulir Pendaftaran
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const jenjangSelect = document.getElementById('jenjang_select');
            const majorContainer = document.getElementById('major_container');
            const majorSelect = document.getElementById('major_select');

            function toggleMajor() {
                if (jenjangSelect.value === 'SMK') {
                    majorContainer.classList.remove('d-none');
                    majorSelect.setAttribute('required', 'required');
                } else {
                    majorContainer.classList.add('d-none');
                    majorSelect.removeAttribute('required');
                    majorSelect.value = '';
                }
            }

            jenjangSelect.addEventListener('change', toggleMajor);
            toggleMajor();
        });
    </script>
@endsection