<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;


class kelasseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelasData =[
            [
                'id' => 1,
                'kode_kelas' => 'A' ,
                'mata_kuliah_kode_mk'=> 'Paik101',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 2,
                'kode_kelas' => 'A' ,
                'mata_kuliah_kode_mk'=> 'Paik102',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 3,
                'kode_kelas' => 'B' ,
                'mata_kuliah_kode_mk'=> 'Paik103',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 4,
                'kode_kelas' => 'C' ,
                'mata_kuliah_kode_mk'=> 'Paik104',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 5,
                'kode_kelas' => 'C' ,
                'mata_kuliah_kode_mk'=> 'Paik105',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 6,
                'kode_kelas' => 'B' ,
                'mata_kuliah_kode_mk'=> 'Paik106',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
        ];
        
        foreach($kelasData as $key => $val){
            Kelas::create($val);
        }
    }
}