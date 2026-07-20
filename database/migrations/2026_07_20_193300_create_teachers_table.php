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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable(); // NIP bisa kosong jika guru honorer/baru
            $table->string('jabatan'); // Contoh: Kepala Sekolah, Guru Matematika
            $table->enum('jenjang', ['SMP', 'SMK', 'UMUM']); // Memisahkan guru SMP dan SMK
            $table->string('foto')->nullable(); // Menyimpan path foto guru
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
