<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Ruang_Kuliah extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ruang_kuliah'; // Tentukan nama tabel yang benar
    protected $primaryKey = 'kode_ruang'; // Menentukan primary key
    public $incrementing = false; // Jika primary key bukan auto-increment
    protected $keyType = 'string'; // Menyesuaikan tipe data (string)
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_ruang',
        'kapasitas', 
        'fakultas_kode_fakultas',
        'program_studi_kode_prodi',
        'status'
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
