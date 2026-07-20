<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ppdb_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->unique(); // Contoh: PPDB-2026-0001
            $table->string('nisn', 10); // NISN maksimal 10 digit
            $table->string('nik', 16); // NIK KTP maksimal 16 digit
            $table->string('nama_lengkap');
            $table->enum('jenjang_pilihan', ['SMP', 'SMK']);

            // Relasi ke tabel majors (Jurusan). Nullable karena kalau pilih SMP tidak butuh jurusan!
            $table->foreignId('major_id')->nullable()->constrained('majors')->nullOnDelete();

            // Path penyimpanan file dokumen yang diupload
            $table->string('document_kk');
            $table->string('document_ijazah');

            // Status alur pendaftaran sesuai kesepakatan
            $table->enum('status', [
                'Menunggu Verifikasi',
                'Berkas Kurang',
                'Sedang Diproses',
                'Diterima',
                'Ditolak'
            ])->default('Menunggu Verifikasi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdb_registrations');
    }
};
