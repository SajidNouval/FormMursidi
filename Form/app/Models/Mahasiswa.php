<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'mahasiswa'; // Tentukan nama tabel yang benar
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'email',
        'tanggal_lahir',
        'tahun_masuk',
        'semester',
        'user_id'
    ];
    public function irs()
    {
        return $this->hasMany(IRS::class, 'mahasiswa_nim', 'nim');
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
