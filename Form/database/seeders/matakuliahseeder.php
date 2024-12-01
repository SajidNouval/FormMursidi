<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mata_Kuliah; // Pastikan menggunakan model yang benar
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class matakuliahseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mtklData = [
            [
                'kode_mk' => 'Paik101',
                'nama_mk' => 'PBP',
                'sks' => 4,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'dosen_nip' => '1234567890', // Sesuaikan dengan kolom yang ada
            ],
            [
                'kode_mk' => 'Paik102',
                'nama_mk' => 'ML',
                'sks' => 3,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'dosen_nip' => '2234567890', // Sesuaikan dengan kolom yang ada
            ],
            [
                'kode_mk' => 'Paik103',
                'nama_mk' => 'KTP',
                'sks' => 3,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'dosen_nip' =>  '3234567890', // Sesuaikan dengan kolom yang ada
            ],
            [
                'kode_mk' => 'Paik104',
                'nama_mk' => 'PPL',
                'sks' => 3,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'dosen_nip' => '42345632890', // Sesuaikan dengan kolom yang ada
            ],
            [
                'kode_mk' => 'Paik105',
                'nama_mk' => 'SI',
                'sks' => 3,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'dosen_nip' => '5234561110', // Sesuaikan dengan kolom yang ada
            ],
            [
                'kode_mk' => 'Paik106',
                'nama_mk' => 'Basis Data',
                'sks' => 4,
                'semester' => 3,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'dosen_nip' => '52342567890', // Sesuaikan dengan kolom yang ada
            ],

        ];

        foreach ($mtklData as $key=>$val) {
            Mata_Kuliah::create($val); // Menggunakan model yang benar
        }
    }
}
