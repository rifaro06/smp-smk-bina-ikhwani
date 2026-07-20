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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Contoh: Sejarah Singkat, Visi & Misi, Fasilitas Kampus
            $table->text('konten'); // Isi dari profil tersebut
            $table->enum('kategori', ['SMP', 'SMK', 'UMUM'])->default('UMUM'); // Membedakan profil SMP/SMK
            $table->string('foto')->nullable(); // Foto gedung/kegiatan pendukung
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
