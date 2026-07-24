@extends('layouts.admin')

@section('content')
    <div class="py-5" style="background-color: #F8FAFC; min-height: 85vh;">
        <div class="container">

            <div class="mb-4 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-outline-secondary rounded-pill px-3 py-2 small fw-semibold">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
                </a>
                <span class="text-muted small">ID Sistem: #{{ $registration->id }}</span>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 p-3 mb-4 shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-4">
                <!-- DATA SISWA -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-3">
                            <div>
                                <span
                                    class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill small mb-1">{{ $registration->registration_number }}</span>
                                <h3 class="font-heading fw-bold mb-0">{{ $registration->nama_lengkap }}</h3>
                            </div>
                            <span
                                class="badge {{ $registration->jenjang_pilihan == 'SMP' ? 'bg-info' : 'bg-success' }} fs-6 rounded-pill px-3 py-2">
                                {{ $registration->jenjang_pilihan }}
                                {{ $registration->major ? ' - ' . $registration->major->nama_jurusan : '' }}
                            </span>
                        </div>

                        <h6 class="font-heading fw-bold text-secondary text-uppercase small mb-3">Data Kependudukan</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <small class="text-muted d-block">NISN (Nomor Induk Siswa Nasional):</small>
                                <strong class="fs-5 text-dark font-monospace">{{ $registration->nisn }}</strong>
                            </div>
                            <div class="col-sm-6">
                                <small class="text-muted d-block">NIK (Nomor Induk Kependudukan):</small>
                                <strong class="fs-5 text-dark font-monospace">{{ $registration->nik }}</strong>
                            </div>
                            <div class="col-12">
                                <small class="text-muted d-block">Waktu Pendaftaran Masuk:</small>
                                <span
                                    class="text-dark fw-medium">{{ $registration->created_at->translatedFormat('l, d September Y - H:i:s') }}
                                    WIB</span>
                            </div>
                        </div>
                    </div>

                    <!-- PREVIEW DOKUMEN UPLOAD -->
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <h5 class="font-heading fw-bold mb-3"><i class="fas fa-folder-open text-warning me-2"></i>Berkas
                            Dokumen Lampiran</h5>
                        <p class="text-muted small mb-4">Klik tombol di bawah untuk melihat atau mengunduh berkas fisik yang
                            diunggah oleh calon siswa.</p>

                        <div class="row g-3">
                            <!-- Kartu Keluarga -->
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <i class="fas fa-file-invoice text-primary fa-2x"></i>
                                        <div>
                                            <strong class="d-block small">Kartu Keluarga (KK)</strong>
                                            <small class="text-muted" style="font-size: 11px;">Format: Lampiran
                                                Resmi</small>
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.dokumen.lihat', ['id' => $registration->id, 'jenis' => 'kk']) }}"
                                        target="_blank" class="btn btn-outline-primary w-100">
                                        <i class="fas fa-external-link-alt me-1"></i> Buka / Unduh KK
                                    </a>
                                </div>
                            </div>

                            <!-- Ijazah / SKL -->
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <i class="fas fa-graduation-cap text-success fa-2x"></i>
                                        <div>
                                            <strong class="d-block small">Ijazah / SKL</strong>
                                            <small class="text-muted" style="font-size: 11px;">Format: Lampiran
                                                Resmi</small>
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.dokumen.lihat', ['id' => $registration->id, 'jenis' => 'ijazah']) }}"
                                        target="_blank" class="btn btn-outline-success w-100">
                                        <i class="fas fa-external-link-alt me-1"></i> Buka / Unduh Ijazah
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PANEL VERIFIKASI -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white border-top border-4 border-warning">
                        <h5 class="font-heading fw-bold text-dark mb-3"><i
                                class="fas fa-clipboard-check text-warning me-2"></i>Tindakan Verifikasi</h5>
                        <p class="text-muted small">Periksa keabsahan berkas Kartu Keluarga dan Ijazah di samping sebelum
                            mengubah status pendaftar di sistem.</p>

                        <form action="{{ route('admin.updateStatus', $registration->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="form-label fw-semibold small">Tetapkan Status Pendaftaran:</label>
                                <select name="status" class="form-select form-select-lg fw-semibold">
                                    <option value="Menunggu Verifikasi" {{ $registration->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>⏳ Menunggu Verifikasi</option>
                                    <option value="Berkas Kurang" {{ $registration->status == 'Berkas Kurang' ? 'selected' : '' }}>⚠️ Berkas Kurang / Salah</option>
                                    <option value="Sedang Diproses" {{ $registration->status == 'Sedang Diproses' ? 'selected' : '' }}>🔄 Sedang Diproses</option>
                                    <option value="Diterima" {{ $registration->status == 'Diterima' ? 'selected' : '' }}>✅
                                        Diterima (Lolos)</option>
                                    <option value="Ditolak" {{ $registration->status == 'Ditolak' ? 'selected' : '' }}>❌
                                        Ditolak</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success w-100 py-3 fw-bold rounded-pill shadow-sm"
                                style="background-color: #10B981; border: none;">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan Status
                            </button>
                        </form>

                        <hr class="my-4">
                        <div class="bg-light p-3 rounded-3 small text-muted">
                            <i class="fas fa-info-circle text-primary me-1"></i> <strong>Catatan Sistem:</strong> Mengubah
                            status menjadi <em>"Diterima"</em> atau status lainnya akan memperbarui data secara langsung dan
                            dapat dilihat oleh siswa apabila fitur Cek Status Publik diaktifkan.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection