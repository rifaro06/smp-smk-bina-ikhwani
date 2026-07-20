<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    // 1. Mendaftarkan kolom apa saja yang boleh diisi melalui form (Mass Assignment)
    protected $fillable = [
        'nama_jurusan',
        'slug',
        'deskripsi',
        'icon',
    ];

    // 2. Relasi: Satu jurusan (Major) memiliki BANYAK (hasMany) pendaftar PPDB
    public function ppdbRegistrations()
    {
        return $this->hasMany(PpdbRegistration::class);
    }
}