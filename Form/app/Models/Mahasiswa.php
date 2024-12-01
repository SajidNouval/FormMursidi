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

    // Specify the primary key
    protected $primaryKey = 'nim'; 

    // If the primary key is not an integer, specify its type
    protected $keyType = 'string'; 

    // Disable auto-incrementing since 'nim' is not an incrementing integer
    public $incrementing = false;

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
        'tahunMasuk',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Add any attributes you want to hide from serialization
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        // Define any attributes that should be cast to a specific type
    ];
}