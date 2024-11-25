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
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'dosen_nip' => '1234567890', // Sesuaikan dengan kolom yang ada
            ]
        ];

        foreach ($mtklData as $key=>$val) {
            Mata_Kuliah::create($val); // Menggunakan model yang benar
        }
    }
}
