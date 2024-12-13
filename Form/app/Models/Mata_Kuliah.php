<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Mata_Kuliah extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'mata_kuliah'; 

    protected $fillable = [
        'kode_mk' ,
        'nama_mk' ,
        'sks' ,
        'semester' ,
        'jenis' ,
        'program_studi_kode_prodi',
        'fakultas_kode_fakultas',
        'pengampu1',
        'pengampu2',
        'pengampu3',
        'tahun_akademik'
    ];

    // Tentukan kolom primary key yang digunakan
    protected $primaryKey = 'kode_mk';

    // Jika primary key tidak auto-increment
    public $incrementing = false;
  
    // Jika primary key adalah string
    protected $keyType = 'string';

    public function jadwalKuliah()
    {
        return $this->hasMany(Jadwal_Kuliah::class, 'mata_kuliah_kode_mk', 'kode_mk');
    }

    public function irs()
    {
        return $this->hasMany(IRS::class, 'mata_kuliah_kode_mk', 'kode_mk');
    }

     // Update the method name to 'dosen' and adjust the relationship
     public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'mata_kuliah_dosen', 'mata_kuliah_kode_mk', 'dosen_id');
    }
    public function kelas()
{
    return $this->hasMany(Kelas::class, 'mata_kuliah_kode_mk', 'kode_mk');
}

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
   
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
}
