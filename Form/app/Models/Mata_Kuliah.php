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
        'prodi_id' ,
        'program_studi_kode_prodi',
        'fakultas_kode_fakultas'
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

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
   
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
}
