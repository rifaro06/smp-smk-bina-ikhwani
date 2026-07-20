<?php

namespace Database\Seeders;

use App\Models\PpdbRegistration;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan seeder akun Admin dan Jurusan terlebih dahulu
        $this->call([
            UserSeeder::class,
            MajorSeeder::class,
        ]);

        // 2. Suruh pabrik (Factory) membuat 20 data dummy pendaftar PPDB!
        PpdbRegistration::factory(20)->create();
    }
}