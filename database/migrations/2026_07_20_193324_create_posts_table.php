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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul berita/pengumuman
            $table->string('slug')->unique();
            $table->text('body')->nullable(); // Isi konten berita
            $table->string('image')->nullable(); // Gambar sampul atau galeri
            $table->enum('type', ['berita', 'pengumuman', 'galeri']); // Pembeda modul
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
