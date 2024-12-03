<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class irs extends Model
{

         
    protected $table = 'irs';

    // Tentukan kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'mahasiswa_nim', 
        'semester', 
        'tahun_akademik',
        'total_sks',
        'ruang_kuliah_kode_ruang',
        'is_verified',
        'diajukan',
        'kelas_id', 

    ];

}
