<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\dosen_mk;

class dosen_mkseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dmkData =[
            [
                'id' => 1,
                'dosen_nip'=> '1234567890',
                'mata_kuliah_kode_mk' =>'Paik101',
                'tahun_akademik' => '2024/2025'
        
            ],
        ];
        foreach($dmkData as $key => $val){
            dosen_mk::create($val);
        }

    }
}
