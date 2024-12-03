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
        ];
        foreach($kelasData as $key => $val){
            Kelas::create($val);
        }
    }
}