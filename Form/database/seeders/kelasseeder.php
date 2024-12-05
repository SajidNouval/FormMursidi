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
                'kode_kelas' => 'B' ,
                'mata_kuliah_kode_mk'=> 'Paik102',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 3,
                'kode_kelas' => 'C' ,
                'mata_kuliah_kode_mk'=> 'Paik103',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 4,
                'kode_kelas' => 'D' ,
                'mata_kuliah_kode_mk'=> 'Paik104',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 5,
                'kode_kelas' => 'A' ,
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
            [
                'id' => 7,
                'kode_kelas' => 'C' ,
                'mata_kuliah_kode_mk'=> 'Paik107',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 8,
                'kode_kelas' => 'D' ,
                'mata_kuliah_kode_mk'=> 'Paik108',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 9,
                'kode_kelas' => 'A' ,
                'mata_kuliah_kode_mk'=> 'Paik109',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 10,
                'kode_kelas' => 'B' ,
                'mata_kuliah_kode_mk'=> 'Paik110',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 11,
                'kode_kelas' => 'C' ,
                'mata_kuliah_kode_mk'=> 'Paik111',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 12,
                'kode_kelas' => 'D' ,
                'mata_kuliah_kode_mk'=> 'Paik112',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 13,
                'kode_kelas' => 'A' ,
                'mata_kuliah_kode_mk'=> 'Paik113',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 14,
                'kode_kelas' => 'B' ,
                'mata_kuliah_kode_mk'=> 'Paik114',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 15,
                'kode_kelas' => 'C' ,
                'mata_kuliah_kode_mk'=> 'Paik115',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],
            [
                'id' => 16,
                'kode_kelas' => 'D' ,
                'mata_kuliah_kode_mk'=> 'Paik116',
                'tahun_akademik' => '2024/2025' ,
                'kuota' => 30
                
            ],

        ];
        
        foreach($kelasData as $key => $val){
            Kelas::create($val);
        }
    }
}