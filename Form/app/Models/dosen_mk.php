<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class dosen_mk extends Model
{
       /** @use HasFactory<\Database\Factories\UserFactory> */
       use HasFactory, Notifiable;

       protected $table = 'dosen_mk'; // Tentukan nama tabel yang benar
       /**
        * The attributes that are mass assignable.
        *
        * @var array<int, string>
        */
       protected $fillable = [
             'id',
             'dosen_nip',
             'mata_kuliah_kode_mk',
             'tahun_akademik'
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
