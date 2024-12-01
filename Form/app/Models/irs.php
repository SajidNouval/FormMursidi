<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class irs extends Model
{
    protected $table = 'irs';
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(Mata_Kuliah::class, 'mata_kuliah_kode_mk', 'kode_mk');
    }
}
