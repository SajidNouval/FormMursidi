<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    // Specify the table if it does not follow Laravel's naming convention
    protected $table = 'konsultasi';

    // Specify the fillable fields if you want to use mass assignment
    protected $fillable = [
        'dosen_wali_nip',
        'mahasiswa_nim',
        'subjek',
        'isi_pesan',
        'tanggal_konsultasi',
        'status',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_wali_nip', 'nip');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }

}