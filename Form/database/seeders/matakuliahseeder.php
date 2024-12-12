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
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Irfan Sibudi',
                'pengampu2' => 'Titah Kelomang',
            ],
            [
                'kode_mk' => 'Paik102',
                'nama_mk' => 'Basis Data',
                'sks' => 4,
                'semester' => 3,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Titah Kelomang',
                'pengampu2' => 'Sajid Ironi',
            ],
            [
                'kode_mk' => 'Paik103',
                'nama_mk' => 'PPL',
                'sks' => 4,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Titah Kelomang',
                'pengampu2' => 'Irfan Sibudi',
            ],
            [
                'kode_mk' => 'Paik104',
                'nama_mk' => 'KWU',
                'sks' => 2,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Alwi Hambali',
            ],
            [
                'kode_mk' => 'Paik090',
                'nama_mk' => 'GKV',
                'sks' => 3,
                'semester' => 4,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Alwi Hambali',
            ],
            [
                'kode_mk' => 'Paik091',
                'nama_mk' => 'PBO',
                'sks' => 3,
                'semester' => 4,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Alwi Hambali',
            ],
            [
                'kode_mk' => 'Paik092',
                'nama_mk' => 'SISCER',
                'sks' => 3,
                'semester' => 4,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Alwi Hambali',
                'pengampu2' => 'Irfan Sibudi',
            ],
            [
                'kode_mk' => 'Paik093',
                'nama_mk' => 'RPL',
                'sks' => 3,
                'semester' => 4,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Sajid Ironi',
            ],
            [
                'kode_mk' => 'Paik094',
                'nama_mk' => 'MBD',
                'sks' => 3,
                'semester' => 4,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Sajid Ironi',
            ],
            [
                'kode_mk' => 'Paik095',
                'nama_mk' => 'IOT',
                'sks' => 2,
                'semester' => 4,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Sajid Ironi',
                'pengampu2' => 'Irfan Sibudi',
            ],
            [
                'kode_mk' => 'Paik105',
                'nama_mk' => 'SI',
                'sks' => 4,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Sajid Ironi',
            ],
            [
                'kode_mk' => 'Paik106',
                'nama_mk' => 'ML',
                'sks' => 4,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Sajid Ironi',
            ],
            [
                'kode_mk' => 'Paik107',
                'nama_mk' => 'WEB DEV',
                'sks' => 4,
                'semester' => 5,
                'jenis'=>'Wajib',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Irfan Sibudi',
            ],
            [
                'kode_mk' => 'Paik108',
                'nama_mk' => 'Bahasa Jepang',
                'sks' => 2,
                'semester' => 5,
                'jenis'=>'Pilihan',
                'program_studi_kode_prodi' => '01', // Sesuaikan dengan kolom yang ada
                'fakultas_kode_fakultas' => '101',
                'pengampu1' => 'Irfan Sibudi',
            ],
        ];

        foreach ($mtklData as $key=>$val) {
            Mata_Kuliah::create($val); // Menggunakan model yang benar
        }
    }
}
