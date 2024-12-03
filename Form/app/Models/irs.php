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

}
