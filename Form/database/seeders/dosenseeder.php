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
                'email' => 'irfanm@gmail.com',
                'tanggal_lahir' => '1990-01-01',
                'role' => 'kaprodi',
                'periode mulai'=> '2018',
                'periode selesai'=> '2026',
                'user_id' => 3, // Pastikan ID ini ada di tabel users
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
            ],
            [
                'nip' => '2234567890',
                'nama' => 'Sajid Ironi',
                'alamat' => 'Jl. Banjarsari',
                'email' => 'pamk@gmail.com',
                'tanggal_lahir' => '1991-02-12',
                'role' => 'pakademik',
                'periode mulai'=> '2018',
                'periode selesai'=> '2026',
                'user_id' => 2,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
            ],
            [
                'nip' => '3234567890',
                'nama' => 'Ayyub Perkedel',
                'alamat' => 'Jl. Gondang Timur',
                'email' => 'dekan@gmail.com',
                'tanggal_lahir' => '1998-10-12',
                'role' => 'dekan',
                'periode mulai'=> '2018',
                'periode selesai'=> '2026',
                'user_id' => 4,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
            ],
            [
                'nip' => '42345632890',
                'nama' => 'Titah Kelomang',
                'alamat' => 'Jl. Mulawarman',
                'email' => 'dosenn2@unpas.ac.id',
                'tanggal_lahir' => '1994-09-10',
                'role' => 'dosen',
                'periode mulai'=> '2018',
                'periode selesai'=> '2026',
                'user_id' => 6,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
            ],
            [
                'user_id' => 7,
                'nip' => '52342567890',
                'nama' => 'Alwi Hambali',
                'alamat' => 'Jl. Aja Dulu',
                'email' => 'dosen5@unpas.ac.id',
                'tanggal_lahir' => '1980-11-11',
                'periode mulai'=> '2018',
                'periode selesai'=> '2026',
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
            ],
        ];
        foreach($dosenData as $key => $val){
            Dosen::create($val);
        }
    }
}
