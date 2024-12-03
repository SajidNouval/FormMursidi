<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class fakultasseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultasData =[
            [

                'kode_fakultas' => '101',
                'nama_fakultas' => 'Fakultas Sastra Mesin',
                'alamat' => 'Jl. Raya Bandung',
                'email' => 'fsm@unpas.ac.id',
                
            ],
            [

                'kode_fakultas' => '102',
                'nama_fakultas' => 'Fakultas Teknik',
                'alamat' => 'Jl. Raya Firdaus',
                'email' => 'ft@unpas.ac.id',
                
            ],
        ];
        foreach($fakultasData as $key => $val){
            Fakultas::create($val);
        }
    }
}
