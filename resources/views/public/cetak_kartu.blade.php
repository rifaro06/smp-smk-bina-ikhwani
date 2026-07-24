<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Bukti Pendaftaran - {{ $registration->nama_lengkap }}</title>
    <!-- Bootstrap CSS CDN untuk Print Layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #525659;
            font-family: 'Times New Roman', Times, serif;
            color: #000;
        }
        .print-area {
            background: #fff;
            width: 210mm; /* Standar Lebar A4 */
            min-height: 297mm; /* Standar Tinggi A4 */
            margin: 20px auto;
            padding: 25mm 20mm;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            position: relative;
        }
        .kop-table {
            width: 100%;
            border-bottom: 3px double #000;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .data-table th {
            width: 35%;
            padding: 8px 0;
            font-weight: 600;
        }
        .data-table td {
            padding: 8px 0;
        }
        /* Sembunyikan latar belakang gelap saat proses nge-print */
        @media print {
            body { background: transparent; }
            .print-area { box-shadow: none; margin: 0; width: 100%; min-height: auto; padding: 0; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body onload="window.print()">

    <!-- Tombol Bantuan jika pop-up print diblokir browser -->
    <div class="text-center py-3 no-print">
        <button onclick="window.print()" class="btn btn-primary rounded-pill px-4 fw-bold shadow">
            🖨️ Klik di Sini Jika Cetak Tidak Muncul Otomatis
        </button>
        <button onclick="window.close()" class="btn btn-danger rounded-pill px-4 fw-bold shadow ms-2">
            ❌ Tutup Tab
        </button>
    </div>

    <!-- KERTAS A4 -->
    <div class="print-area">
        
        <!-- KOP SURAT SEKOLAH -->
        <table class="kop-table">
            <tr>
                <td style="width: 80px; text-align: center;">
                    <!-- Ganti dengan logo asli sekolah kamu nanti -->
                    <img src="{{ asset('images/logo-sekolah.png') }}" width="80" alt="Logo Bina Ikhwani">
                </td>
                <td style="text-align: center;">
                    <h4 style="margin: 0; font-weight: bold; font-family: Arial, sans-serif; letter-spacing: 1px;">YAYASAN PENDIDIKAN BINA IKHWANI</h4>
                    <h2 style="margin: 5px 0; font-weight: 800; font-family: Arial, sans-serif; color: #284EF6;">SMP & SMK BINA IKHWANI BOGOR</h2>
                    <p style="margin: 0; font-size: 12px; font-family: Arial, sans-serif;">Jl. Raya Dramaga No. KM 7, Dramaga, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680</p>
                    <p style="margin: 0; font-size: 12px; font-family: Arial, sans-serif;">Website: www.binaikhwani.sch.id | Email: info@binaikhwani.sch.id</p>
                </td>
            </tr>
        </table>

        <!-- JUDUL SURAT -->
        <div style="text-align: center; margin-bottom: 30px;">
            <h4 style="text-decoration: underline; font-weight: bold; margin-bottom: 5px;">KARTU BUKTI PENDAFTARAN PPDB ONLINE</h4>
            <span style="font-size: 14px; background: #eee; padding: 4px 15px; border: 1px solid #ccc; font-family: monospace; font-weight: bold;">
                NOMOR: PPDB-2026-{{ str_pad($registration->id, 4, '0', STR_PAD_LEFT) }}
            </span>
        </div>

        <p style="font-size: 14px; line-height: 1.6;">
            Panitia Penerimaan Peserta Didik Baru (PPDB) SMP & SMK Bina Ikhwani Bogor Tahun Ajaran 2026/2027 menyatakan bahwa calon siswa di bawah ini telah melakukan pendaftaran secara resmi melalui sistem online:
        </p>

        <!-- TABEL DATA SISWA -->
        <table class="data-table" style="width: 100%; font-size: 14px; margin-top: 15px; margin-bottom: 30px;">
            <tr>
                <th>Nama Lengkap</th>
                <td>: <strong>{{ strtoupper($registration->nama_lengkap) }}</strong></td>
            </tr>
            <tr>
                <th>NISN</th>
                <td>: {{ $registration->nisn }}</td>
            </tr>
            <tr>
                <th>Alamat Email</th>
                <td>: {{ $registration->email }}</td>
            </tr>
            <tr>
                <th>Jenjang Pilihan</th>
                <td>: <strong>{{ $registration->jenjang_pilihan }}</strong></td>
            </tr>
            <tr>
                <th>Program / Jurusan</th>
                <td>: {{ $registration->major ? $registration->major->nama : '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal Mendaftar</th>
                <td>: {{ $registration->created_at->format('d F Y, H:i') }} WIB</td>
            </tr>
            <tr>
                <th>Status Verifikasi</th>
                <td>: <span style="border: 1px solid #000; padding: 2px 8px; font-weight: bold; text-transform: uppercase;">{{ $registration->status }}</span></td>
            </tr>
        </table>

        <!-- KOTAK CATATAN -->
        <div style="border: 1px dashed #000; padding: 15px; font-size: 13px; background-color: #f9f9f9; margin-bottom: 40px;">
            <strong>📌 CATATAN PENTING UNTUK CALON SISWA:</strong>
            <ol style="margin: 5px 0 0 0; padding-left: 20px;">
                <li>Kartu bukti pendaftaran ini <strong>wajib dicetak/disimpan</strong> dan dibawa saat melakukan daftar ulang fisik ke gedung sekolah.</li>
                <li>Siapkan berkas fotokopi (Ijazah/SKL, Kartu Keluarga, Akta Kelahiran, dan Pas Foto 3x4) masing-masing 2 lembar dalam map.</li>
                <li>Jadwal wawancara dan tes masuk (jika ada) akan diinfokan lebih lanjut melalui WhatsApp oleh Panitia PPDB.</li>
            </ol>
        </div>

        <!-- TANDA TANGAN -->
        <div style="float: right; width: 250px; text-align: center; font-size: 14px;">
            <p style="margin-bottom: 70px;">Dramaga, {{ date('d F Y') }}<br><strong>Panitia PPDB Sekolah,</strong></p>
            <p style="text-decoration: underline; font-weight: bold; margin-bottom: 0;">( Panitia Penerimaan )</p>
            <small>SMP & SMK Bina Ikhwani</small>
        </div>

        <div style="clear: both;"></div>
    </div>

</body>
</html>