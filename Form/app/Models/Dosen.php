<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dosen extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'dosen'; // Tentukan nama tabel yang benar
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
          'nip',
          'nama',
          'alamat',
          'email',
          'tanggal_lahir',
          'role',
          'periode mulai',
          'periode selesai',
          'user_id',
          'program_studi_kode_prodi',
          'fakultas_kode_fakultas'
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
