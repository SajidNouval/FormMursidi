<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class KHS extends Model
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable;

     protected $table = 'khs'; // Tentukan nama tabel yang benar
     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
        'mahasiswa_nim', // Kolom untuk foreign key mahasiswa
        'mata_kuliah_kode_mk', // Kolom untuk foreign key mata kuliah
        'status',
        'nilai_huruf',
        'Bobot',
        'Semester',
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
