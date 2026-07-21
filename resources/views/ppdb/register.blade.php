@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- PESAN SUKSES (Jika formulir berhasil dikirim) -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show p-4 rounded-3 shadow-sm mb-4" role="alert">
                <h4 class="alert-heading fw-bold"><i class="fas fa-check-circle me-2"></i>Alhamdulillah!</h4>
                <p class="mb-0">{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white p-4">
                    <h3 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i>Formulir Pendaftaran PPDB Online</h3>
                    <p class="mb-0 text-white-50">Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }} - SMP & SMK Bina Ikhwani</p>
                </div>
                <div class="card-body p-4 p-md-5">
                    
                    <!-- FORMULIR PENDAFTARAN -->
                    <form action="{{ route('ppdb.store') }}" method="POST">
                        
                        {{-- SATPAM WAJIB LARAVEL: Mencegah serangan CSRF Hacker --}}
                        @csrf 

                        <h5 class="fw-bold text-primary mb-3 border-bottom pb-2">1. Data Pribadi Siswa</h5>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap Sesuai Ijazah <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" required placeholder="Contoh: Ahmad Rifai">
                            @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">NISN (10 Digit) <span class="text-danger">*</span></label>
                                <input type="number" name="nisn" class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn') }}" required placeholder="0123456789">
                                @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">NIK KTP / Kartu Keluarga <span class="text-danger">*</span></label>
                                <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" required placeholder="3201xxxxxxxxxxxx">
                                @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <h5 class="fw-bold text-primary mb-3 mt-4 border-bottom pb-2">2. Pilihan Jenjang & Jurusan</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Pilih Jenjang Sekolah <span class="text-danger">*</span></label>
                                <select name="jenjang_pilihan" id="jenjang" class="form-select @error('jenjang_pilihan') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenjang --</option>
                                    <option value="SMP" {{ old('jenjang_pilihan') == 'SMP' ? 'selected' : '' }}>SMP Bina Ikhwani</option>
                                    <option value="SMK" {{ old('jenjang_pilihan') == 'SMK' ? 'selected' : '' }}>SMK Bina Ikhwani</option>
                                </select>
                                @error('jenjang_pilihan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Pilih Jurusan (Khusus SMK)</label>
                                <select name="major_id" class="form-select @error('major_id') is-invalid @enderror">
                                    <option value="">-- Pilih Jurusan SMK --</option>
                                    @foreach($majors as $major)
                                        <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                            {{ $major->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Abaikan jika memilih jenjang SMP.</small>
                                @error('major_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <h5 class="fw-bold text-primary mb-3 mt-4 border-bottom pb-2">3. Dokumen Persyaratan (Sementara)</h5>
                        <p class="text-muted small">Untuk tahap testing, silakan ketik nama file terlebih dahulu. Fitur upload file fisik akan kita tambahkan di tahap selanjutnya.</p>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Nama File Kartu Keluarga <span class="text-danger">*</span></label>
                                <input type="text" name="document_kk" class="form-control" value="kk_ahmad.pdf" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">Nama File Ijazah / SKL <span class="text-danger">*</span></label>
                                <input type="text" name="document_ijazah" class="form-control" value="ijazah_ahmad.pdf" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold rounded-pill shadow">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Formulir Pendaftaran Sekarang
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection