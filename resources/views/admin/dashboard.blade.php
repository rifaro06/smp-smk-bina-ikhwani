@extends('layouts.admin')

@section('content')
<div class="py-5" style="background-color: #F8FAFC; min-height: 85vh;">
    <div class="container">
        
        <!-- HEADER DASHBOARD -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-3 border-bottom gap-3">
            <div>
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill small fw-bold mb-1">PORTAL PANITIA</span>
                <h2 class="font-heading fw-bold text-dark mb-0">Dashboard Verifikasi PPDB</h2>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('ppdb.register') }}" target="_blank" class="btn btn-outline-dark rounded-pill px-3 py-2 small fw-semibold">
                    <i class="fas fa-external-link-alt me-1"></i> Lihat Form Publik
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger rounded-pill px-4 py-2 small fw-bold shadow-sm">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 p-3 mb-4 shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- KARTU STATISTIK -->
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-6">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-primary">
                    <small class="text-muted fw-bold text-uppercase" style="font-size: 11px;">Total Pendaftar</small>
                    <h3 class="font-heading fw-bold text-dark mb-0 mt-1">{{ $totalPendaftar }} <span class="fs-6 text-muted fw-normal">Siswa</span></h3>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-info">
                    <small class="text-muted fw-bold text-uppercase" style="font-size: 11px;">Pendaftar SMP</small>
                    <h3 class="font-heading fw-bold text-dark mb-0 mt-1">{{ $totalSMP }} <span class="fs-6 text-muted fw-normal">Siswa</span></h3>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-success">
                    <small class="text-muted fw-bold text-uppercase" style="font-size: 11px;">Pendaftar SMK</small>
                    <h3 class="font-heading fw-bold text-dark mb-0 mt-1">{{ $totalSMK }} <span class="fs-6 text-muted fw-normal">Siswa</span></h3>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-warning">
                    <small class="text-muted fw-bold text-uppercase" style="font-size: 11px;">Perlu Diverifikasi</small>
                    <h3 class="font-heading fw-bold text-warning mb-0 mt-1">{{ $menunggu }} <span class="fs-6 text-muted fw-normal">Berkas</span></h3>
                </div>
            </div>
        </div>

        <!-- FILTER & TABEL DATA -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4 border-bottom d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <h5 class="font-heading fw-bold mb-0"><i class="fas fa-list text-success me-2"></i>Daftar Calon Peserta Didik Baru</h5>
                
                <!-- Form Filter -->
                <form action="{{ route('admin.dashboard') }}" method="GET" class="d-flex gap-2">
                    <select name="jenjang" class="form-select form-select-sm rounded-pill px-3" onchange="this.form.submit()">
                        <option value="">Semua Jenjang</option>
                        <option value="SMP" {{ request('jenjang') == 'SMP' ? 'selected' : '' }}>Jenjang SMP</option>
                        <option value="SMK" {{ request('jenjang') == 'SMK' ? 'selected' : '' }}>Jenjang SMK</option>
                    </select>
                    <select name="status" class="form-select form-select-sm rounded-pill px-3" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="Menunggu Verifikasi" {{ request('status') == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                        <option value="Sedang Diproses" {{ request('status') == 'Sedang Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                        <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    @if(request('jenjang') || request('status'))
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-light rounded-circle" title="Reset Filter"><i class="fas fa-times"></i></a>
                    @endif
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr class="text-uppercase small text-muted">
                            <th class="py-3 px-4">No. Daftar</th>
                            <th class="py-3">Nama Siswa / NISN</th>
                            <th class="py-3">Jenjang & Jurusan</th>
                            <th class="py-3">Tanggal Daftar</th>
                            <th class="py-3">Status Verifikasi</th>
                            <th class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registrations as $reg)
                        <tr>
                            <td class="px-4 fw-bold text-primary font-heading">{{ $reg->registration_number }}</td>
                            <td>
                                <strong class="text-dark d-block">{{ $reg->nama_lengkap }}</strong>
                                <small class="text-muted">NISN: {{ $reg->nisn }}</small>
                            </td>
                            <td>
                                <span class="badge {{ $reg->jenjang_pilihan == 'SMP' ? 'bg-info' : 'bg-success' }} bg-opacity-10 {{ $reg->jenjang_pilihan == 'SMP' ? 'text-info' : 'text-success' }} rounded-pill px-2 py-1">{{ $reg->jenjang_pilihan }}</span>
                                @if($reg->major)
                                    <small class="d-block text-muted mt-1">{{ $reg->major->nama_jurusan }}</small>
                                @endif
                            </td>
                            <td class="small text-muted">{{ $reg->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                @php
                                    $badgeColor = match($reg->status) {
                                        'Menunggu Verifikasi' => 'bg-warning text-dark',
                                        'Berkas Kurang'       => 'bg-secondary text-white',
                                        'Sedang Diproses'     => 'bg-info text-white',
                                        'Diterima'            => 'bg-success text-white',
                                        'Ditolak'             => 'bg-danger text-white',
                                        default               => 'bg-light text-dark'
                                    };
                                @endphp
                                <span class="badge {{ $badgeColor }} rounded-pill px-3 py-1 fw-medium">{{ $reg->status }}</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('admin.show', $reg->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold">
                                        <i class="fas fa-eye me-1"></i> Periksa Berkas
                                    </a>
                                    
                                    <!-- Tombol Hapus Peserta -->
                                    <form action="{{ route('admin.destroy', $reg->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data atas nama {{ $reg->nama_lengkap }}? Semua berkas lampiran juga akan terhapus permanen.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle d-flex align-items-center justify-content-center" title="Hapus Peserta" style="width: 32px; height: 32px; padding: 0;">
                                            <i class="fas fa-trash-alt" style="font-size: 13px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 text-secondary opacity-50 d-block"></i>
                                Belum ada data pendaftar yang sesuai dengan filter.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($registrations->hasPages())
                <div class="card-footer bg-white p-3 border-top">
                    {{ $registrations->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
@endsection