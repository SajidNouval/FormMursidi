<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class irs extends Model
{

    use HasFactory;

    protected $table = 'irs'; // Nama tabel di database

    protected $fillable = [
        'mahasiswa_nim',
        'kelas_id',
        'semester',
        'tahun_akademik',
        'total_sks',
        'ruang_kuliah_kode_ruang',
        'is_verified',
        'diajukan',
    ];

    // Relasi ke tabel kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }

}
