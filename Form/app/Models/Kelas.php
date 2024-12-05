<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'kelas'; // Tentukan nama tabel yang benar
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id' ,
       'kode_kelas' ,
       'mata_kuliah_kode_mk',
       'tahun_akademik' ,
       'kuota'
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
   
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function mataKuliah()
    {
        return $this->belongsTo(Mata_Kuliah::class, 'mata_kuliah_kode_mk', 'kode_mk');
    }

}
