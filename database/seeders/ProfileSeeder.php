<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::truncate();

        // 1. Data Profil SMP Bina Ikhwani (Nuansa Hijau Islami)
        Profile::create([
            'jenjang' => 'SMP',
            'nama_sekolah' => 'SMP BINA IKHWANI BOGOR',
            'npsn' => '20270943',
            'alamat' => 'Jl. Cibeureum Petir, Kp. Cereme RT 01/RW 03, Sinarsari, Kec. Dramaga, Kab. Bogor 16680',
            'kode_pos' => '16680',
            'telepon' => '0877-3057-4913',
            'email' => 'smpbinaikhwanibogor@gmail.com',
            'kepala_sekolah' => 'Cecep Supriadi',
            'visi' => 'Membentuk Generasi Beriman, Berilmu, Beradab, dan Berakhlak Mulia.',
            'misi' => 'Menyelenggarakan pendidikan SMP berakreditasi B dengan lingkungan gurunya yang bersahabat, biaya terjangkau, serta fokus pada pembinaan karakter keislaman (Hadroh, Kaligrafi, B. Arab).'
        ]);

        // 2. Data Profil SMK Bina Ikhwani (Nuansa Biru Profesional)
        Profile::create([
            'jenjang' => 'SMK',
            'nama_sekolah' => 'SMKS BINA IKHWANI DRAMAGA',
            'npsn' => '69756305',
            'alamat' => 'Jl. Cibeureum Petir, Kp. Cereme RT 01/RW 03, Sinarsari, Kec. Dramaga, Kab. Bogor 16680',
            'kode_pos' => '16680',
            'telepon' => '0857-8085-0310',
            'email' => 'smksbinaikhwanibogor@gmail.com',
            'kepala_sekolah' => 'Cecep Supriadi',
            'visi' => 'Menjadi SMK Unggulan yang Mencetak Lulusan Kompeten, Siap Kerja, dan Berjiwa Wirausaha.',
            'misi' => 'Mengembangkan Kurikulum Merdeka Bidang Bisnis & Pemasaran serta Administrasi Perkantoran yang berdaya saing tinggi di dunia industri.'
        ]);
    }
}