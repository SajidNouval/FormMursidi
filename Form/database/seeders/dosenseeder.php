<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dosenseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosenData = [
            [
                'nip' => '1234567890',
                'nama' => 'Irfan Sibudi',
                'alamat' => 'Jl. Kejambon',
                'email' => 'kaprodi@gmail.com',
                'tanggal_lahir' => '1990-01-01',
                'role' => 'kaprodi',
                'user_id' => 1, // Pastikan ID ini ada di tabel users
            ],
            [
                'nip' => '2234567890',
                'nama' => 'Sajid Ironi',
                'alamat' => 'Jl. Banjarsari',
                'email' => 'pamk@gmail.com',
                'tanggal_lahir' => '1991-02-12',
                'role' => 'pakademik',
                'user_id' => 2,
            ],
            [
                'nip' => '3234567890',
                'nama' => 'Ayyub Perkedel',
                'alamat' => 'Jl. Gondang Timur',
                'email' => 'dekan@gmail.com',
                'tanggal_lahir' => '1998-10-12',
                'role' => 'dekan',
                'user_id' => 3,
            ],
            [
                'nip' => '4234567890',
                'nama' => 'Titah Kelomang',
                'alamat' => 'Jl. Mulawarman',
                'email' => 'dosen@gmail.com',
                'tanggal_lahir' => '1994-09-10',
                'role' => 'dosen',
                'user_id' => 4,
            ],
            [
                'nip' => '5234567890',
                'nama' => 'Alwi Hambali',
                'alamat' => 'Jl. Aja Dulu',
                'email' => 'dosen5@unpas.ac.id',
                'tanggal_lahir' => '1980-11-11',
                'role' => 'dosen',
                'user_id' => 5,
            ],


        ];
        foreach($dosenData as $key => $val){
            Dosen::create($val);
        }
    }
}
