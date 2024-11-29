<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruang_Kuliah;

class ruangseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangData = [
            [
                'kode_ruang' => 'E101',
                'kapasitas' => 40,
            ],
            [
                'kode_ruang' => 'E102',
                'kapasitas' => 32,
            ],
            [
                'kode_ruang' => 'E103',
                'kapasitas' => 32,
            ],
            ];

            foreach($ruangData as $key => $val){
                Ruang_Kuliah::create($val);
            }
    }
}