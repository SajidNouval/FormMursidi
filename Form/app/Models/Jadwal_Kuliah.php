<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Jadwal_Kuliah extends Model
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable;

     protected $table = 'jadwal_kuliah'; // Tentukan nama tabel yang benar
     protected $primaryKey = 'id'; 
     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'id' ,
        'ruang_kuliah_kode_ruang' ,
        'mata_kuliah_kode_mk',
        'hari' ,
        'kelas',
        'jam_mulai' ,
        'jam_selesai',
        'status'
     ];
     
     public function mataKuliah()
        {
            return $this->belongsTo(Mata_Kuliah::class, 'mata_kuliah_kode_mk', 'kode_mk');
        }

    public function irs()
    {
        return $this->belongsTo(Irs::class, 'mata_kuliah_kode_mk', 'mata_kuliah_kode_mk');
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