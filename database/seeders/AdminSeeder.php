<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun khusus Panitia PPDB
        User::updateOrCreate(
            ['email' => 'ppdb@binaikhwani.sch.id'],
            [
                'name'     => 'Panitia PPDB Sekolah',
                'password' => Hash::make('password123'),
                'role'     => 'ppdb',
            ]
        );

        // 2. Akun khusus Tim Humas (Pengelola Konten Berita/Galeri)
        User::updateOrCreate(
            ['email' => 'humas@binaikhwani.sch.id'],
            [
                'name'     => 'Tim Humas & Media Sekolah',
                'password' => Hash::make('password123'),
                'role'     => 'humas',
            ]
        );
    }
}