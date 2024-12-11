<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class irs extends Model
{

    use HasFactory;

    protected $table = 'irs'; // Nama tabel di database
    protected $attributes = [
        'is_verified' => 0, // 0: Diajukan, 1: Disetujui, -1: Ditolak
    ];

    protected $fillable = [
        'mahasiswa_nim',
        'kelas_id',
        'semester',
        'tahun_akademik',
        'total_sks',
        'ruang_kuliah_kode_ruang',
        'is_verified',
        'diajukan',
        'kode_kelas',
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

    public function jadwalkuliah(){
        return $this->hasOne(Jadwal_Kuliah::class, 'mata_kuliah_kode_mk', 'mata_kuliah_kode_mk');
    }

}
