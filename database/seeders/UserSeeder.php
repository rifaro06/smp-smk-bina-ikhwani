<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 1 Akun Administrator Utama
        User::create([
            'name' => 'Administrator Sekolah',
            'email' => 'admin@binaikhwani.sch.id',
            'password' => Hash::make('password123'), // Password wajib di-hash (enkripsi)
            // 'role' => 'admin', // (Buka komen ini kalau nanti kita sudah tambah kolom role di migration users)
        ]);
    }
}