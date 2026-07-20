<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'nisn',
        'nik',
        'nama_lengkap',
        'jenjang_pilihan',
        'major_id',
        'document_kk',
        'document_ijazah',
        'status',
    ];

    // Relasi Kebalikan: Setiap data pendaftar PPDB (jika pilih SMK) DIMILIKI OLEH (belongsTo) satu Jurusan
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}