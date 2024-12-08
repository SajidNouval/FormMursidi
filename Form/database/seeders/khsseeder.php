<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KHS;

class khsseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $khsData =[
            [
                'id' => 1,
                'mahasiswa_nim'=> '2406012213110', 
                'mata_kuliah_kode_mk'=>'Paik090', 
                'status'=>'Baru',
                'nilai_huruf'=>'B',
                'Bobot'=>'3',
                'Semester'=>'4',
                
            ],
            [
                'id' => 2,
                'mahasiswa_nim'=> '2406012213110', 
                'mata_kuliah_kode_mk'=>'Paik091', 
                'status'=>'Baru',
                'nilai_huruf'=>'C',
                'Bobot'=>'2',
                'Semester'=>'4',
                
            ],
            [
                'id' => 3,
                'mahasiswa_nim'=> '2406012213110', 
                'mata_kuliah_kode_mk'=>'Paik092', 
                'status'=>'Baru',
                'nilai_huruf'=>'B',
                'Bobot'=>'3',
                'Semester'=>'4',
                
            ],
            [
                'id' => 4,
                'mahasiswa_nim'=> '2406012213110', 
                'mata_kuliah_kode_mk'=>'Paik093', 
                'status'=>'Baru',
                'nilai_huruf'=>'B',
                'Bobot'=>'3',
                'Semester'=>'4',
                
            ],
            [
                'id' => 5,
                'mahasiswa_nim'=> '2406012213110', 
                'mata_kuliah_kode_mk'=>'Paik094', 
                'status'=>'Baru',
                'nilai_huruf'=>'B',
                'Bobot'=>'3',
                'Semester'=>'4',
                
            ],
            [
                'id' => 6,
                'mahasiswa_nim'=> '2406012213110', 
                'mata_kuliah_kode_mk'=>'Paik095', 
                'status'=>'Baru',
                'nilai_huruf'=>'B',
                'Bobot'=>'3',
                'Semester'=>'4',
                
            ],
        ];
        
            foreach($khsData as $key => $val){
                KHS::create($val);
            }
        
    }
}
