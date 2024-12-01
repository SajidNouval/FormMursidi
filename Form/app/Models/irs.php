<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class irs extends Model
{
    protected $table = 'irs';

    // Tentukan kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'mahasiswa_nim', 
        'mata_kuliah_kode_mk', 
        'semester', 
        'tahun_akademik'
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
