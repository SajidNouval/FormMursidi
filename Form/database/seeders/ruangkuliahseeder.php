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
            ],
            [
                'kode_ruang' => 'E102',
                'kapasitas' => 30,
            ],
            [
                'kode_ruang' => 'E103',
                'kapasitas' => 38,
            ],
            [
                'kode_ruang' => 'E104',
                'kapasitas' => 20,
            ],
            [
                'kode_ruang' => 'E105',
                'kapasitas' => 55,
            ],
        ];
        foreach($rk as $key => $val){
            Ruang_Kuliah::create($val);
        }
    }
}
