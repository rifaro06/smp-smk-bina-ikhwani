<?php

namespace Database\Factories;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

class PpdbRegistrationFactory extends Factory
{
    public function definition(): array
    {
        // Menentukan apakah pendaftar ini milih SMP atau SMK secara acak
        $jenjang = fake()->randomElement(['SMP', 'SMK']);

        return [
            // Membuat nomor pendaftaran unik otomatis, misal: PPDB-2026-8492
            'registration_number' => 'PPDB-' . date('Y') . '-' . fake()->unique()->randomNumber(4, true),
            'nisn' => fake()->numerify('##########'), // 10 digit angka acak
            'nik' => fake()->numerify('################'), // 16 digit angka acak
            'nama_lengkap' => fake()->name(), // Nama acak bergaya Indonesia (kalau diset id_ID)
            'jenjang_pilihan' => $jenjang,
            // Kalau pilih SMK, ambil ID jurusan dari tabel majors secara acak. Kalau SMP, isi null.
            'major_id' => ($jenjang === 'SMK') ? Major::inRandomOrder()->first()?->id : null,
            'document_kk' => 'dummy/kk.pdf', // Path file dokumen sementara
            'document_ijazah' => 'dummy/ijazah.pdf',
            'status' => fake()->randomElement([
                'Menunggu Verifikasi', 
                'Berkas Kurang', 
                'Sedang Diproses', 
                'Diterima', 
                'Ditolak'
            ]),
        ];
    }
}