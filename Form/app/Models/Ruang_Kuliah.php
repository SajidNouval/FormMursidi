<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Ruang_Kuliah extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'ruang_kuliah'; // Tentukan nama tabel yang benar

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_ruang',
        'kapasitas',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Add any attributes you want to hide for serialization
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        // Define any attributes that should be cast to a specific type
    ];
}