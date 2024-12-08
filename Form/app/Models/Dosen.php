<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    
    // Assuming you want to retrieve the name for dropdowns
    public function getRouteKeyName()
    {
        return 'id'; // Assuming 'id' is the primary key
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
   
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $primaryKey = 'id';

    public function mataKuliah()
    {
        return $this->belongsToMany(Mata_Kuliah::class, 'mata_kuliah_dosen', 'dosen_id', 'mata_kuliah_kode_mk');
    }

}
