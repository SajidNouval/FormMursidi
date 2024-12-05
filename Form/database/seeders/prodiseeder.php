<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program_Studi;

class prodiseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodiData = [
            [

                'kode_prodi' => '01',
                'nama_prodi' => 'Teknik Informatika',
                'fakultas_kode_fakultas' => '101'
    
            ],
            [

                'kode_prodi' => '02',
                'nama_prodi' => 'Biologi',
                'fakultas_kode_fakultas' => '101'
    
            ],
            [

                'kode_prodi' => '03',
                'nama_prodi' => 'Teknik Mesin',
                'fakultas_kode_fakultas' => '102'
    
            ],

        ];
        foreach($prodiData as $key => $val){
            Program_Studi::create($val);
        }
    }
}
