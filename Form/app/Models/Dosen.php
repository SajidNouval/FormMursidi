<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'dosen'; // Nama tabel di database

    /**
     * Atribut yang dapat diisi secara massal.
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
          'user_id',
    ];

    /**
     * Definisi relasi ke tabel `users`.
     * Setiap dosen memiliki satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dosen()
{
    return $this->hasOne(Dosen::class);
}
}
