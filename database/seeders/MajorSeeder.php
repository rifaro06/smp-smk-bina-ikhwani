<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run(): void
    {
        $majors = [
            [
                'nama_jurusan' => 'Teknik Komputer dan Jaringan (TKJ)',
                'slug' => 'teknik-komputer-dan-jaringan',
                'deskripsi' => 'Fokus pada perakitan komputer, jaringan LAN/WAN, administrasi server, dan keamanan siber.',
                'icon' => 'fas fa-network-wired', // Class icon FontAwesome untuk AdminLTE
            ],
            [
                'nama_jurusan' => 'Akuntansi dan Keuangan Lembaga (AKL)',
                'slug' => 'akuntansi-dan-keuangan-lembaga',
                'deskripsi' => 'Mempelajari pembukuan keuangan, perpajakan, komputer akuntansi (MYOB), dan manajemen kas.',
                'icon' => 'fas fa-calculator',
            ],
            [
                'nama_jurusan' => 'Desain Komunikasi Visual (DKV)',
                'slug' => 'desain-komunikasi-visual',
                'deskripsi' => 'Mengembangkan kreativitas di bidang desain grafis, fotografi, videografi, dan animasi digital.',
                'icon' => 'fas fa-palette',
            ],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}