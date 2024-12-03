<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class irs extends Model
{
    protected $table = 'irs';

    // Tentukan kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'mahasiswa_nim', 
        // 'semester', 
        'mata_kuliah_kode_mk', 
        // 'total_sks',
        // 'tahun_akademik',
        // 'ruang_kuliah_kode_ruang'

    ];

}
