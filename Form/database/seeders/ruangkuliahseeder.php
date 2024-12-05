<?php

namespace Database\Seeders;

use App\Models\Ruang_Kuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ruangkuliahseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rk = [
            [
                'kode_ruang' => 'E101',
                'kapasitas' => 35,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'
            ],
            [
                'kode_ruang' => 'E102',
                'kapasitas' => 30,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'

            ],
            [
                'kode_ruang' => 'E103',
                'kapasitas' => 38,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'

            ],
            [
                'kode_ruang' => 'E104',
                'kapasitas' => 20,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'

            ],
            [
                'kode_ruang' => 'E105',
                'kapasitas' => 55,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'

            ],
            [
                'kode_ruang' => 'E201',
                'kapasitas' => 55,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'

            ],
            [
                'kode_ruang' => 'E202',
                'kapasitas' => 55,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'

            ],
            [
                'kode_ruang' => 'E203',
                'kapasitas' => 55,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'

            ],
            [
                'kode_ruang' => 'E204',
                'kapasitas' => 55,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'

            ],
            [
                'kode_ruang' => 'E205',
                'kapasitas' => 55,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
                'status' => 'diajukan'

            ],
        ];
        foreach($rk as $key => $val){
            Ruang_Kuliah::create($val);
        }
    }
}
