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
            $table->string('jenjang'); // <--- Kolom ini yang tadi kurang!
            $table->string('nama_sekolah');
            $table->string('npsn');
            $table->text('alamat');
            $table->string('kode_pos');
            $table->string('telepon');
            $table->string('email');
            $table->string('kepala_sekolah');
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
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
