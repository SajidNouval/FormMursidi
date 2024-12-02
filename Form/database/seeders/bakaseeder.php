<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Baka;

class bakaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bakaData =[
            [
                'nip' => '91234567890',
                'nama'=> 'Sahrul Anwar',
                'alamat' => 'Jl. Mawar',
                'notelp' => '081927243825',
                'user_id'=> 9,
                'fakultas_kode_fakultas' => '101'  
            ],
        ];
        foreach($bakaData as $key => $val){
            Baka::create($val);
        }
    }
}

