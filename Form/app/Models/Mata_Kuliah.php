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
        'semenster' ,
        'prodi_id' ,
        'dosen_id' 
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
