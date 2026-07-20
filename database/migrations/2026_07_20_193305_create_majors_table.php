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
        Schema::create('majors', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' (Primary Key, Auto Increment)
            $table->string('nama_jurusan'); // Contoh: Teknik Komputer dan Jaringan
            $table->string('slug')->unique(); // Untuk URL ramah SEO: /jurusan/teknik-komputer
            $table->text('deskripsi')->nullable(); // Penjelasan singkat jurusan
            $table->string('icon')->nullable(); // Nama class icon (misal dari FontAwesome)
            $table->timestamps(); // Otomatis membuat kolom 'created_at' & 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};
