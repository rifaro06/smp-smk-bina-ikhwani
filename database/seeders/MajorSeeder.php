<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run(): void
    {
        Major::truncate();

        Major::create([
            'nama_jurusan' => 'Bisnis dan Pemasaran (BDP)',
            'kode' => 'BDP',
            'deskripsi' => 'Fokus pada strategi pemasaran modern, digital marketing, pengelola toko online (e-commerce), komunikasi bisnis, dan kewirausahaan.',
            'icon' => 'fas fa-store'
        ]);

        Major::create([
            'nama_jurusan' => 'Administrasi Perkantoran (OTKP)',
            'kode' => 'OTKP',
            'deskripsi' => 'Mempelajari tata kelola administrasi surat menyurat digital, kearsipan elektronik, pelayanan publik, dan manajemen kantor profesional.',
            'icon' => 'fas fa-briefcase'
        ]);
    }
}