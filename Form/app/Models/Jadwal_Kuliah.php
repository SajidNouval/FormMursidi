<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Kuliah extends Model
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable;

     protected $table = 'jadwal_kuliah'; // Tentukan nama tabel yang benar
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
        'jam_selesai'
     ];
     
 
     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array<int, string>
    
      * Get the attributes that should be cast.
      *
      * @return array<string, string>
      */
 
}
