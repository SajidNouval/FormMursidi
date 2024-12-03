<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class irs extends Model
{
         /** @use HasFactory<\Database\Factories\UserFactory> */
         use HasFactory, Notifiable;
         
    protected $table = 'irs';

    // Tentukan kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'mahasiswa_nim', 
        'id_kelas', 
        'semester', 
        'total_sks',
        'tahun_akademik',
        'ruang_kuliah_kode_ruang',
        'is_verified',
        'diajukan'
    ];

    // Jika tabel tidak menggunakan timestamps
    // public $timestamps = false;

    // Relasi ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }

    // Relasi ke Mata Kuliah
    public function mataKuliah()
    {
        return $this->belongsTo(Mata_Kuliah::class, 'mata_kuliah_kode_mk', 'kode_mk');
    }
}
