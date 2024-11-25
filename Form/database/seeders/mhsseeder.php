<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class mhsseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mhsData = [
            [
                'nim' =>'2406012213110',
                'nama' => 'mursid',
                'alamat' => 'Jl. Mawah Sejati',
                'email' => 'mhs@gmail.com',
                'tanggal_lahir'=> '1969-10-15',
                'user_id' => '1'
    
            ],

        ];
        foreach($mhsData as $key => $val){
            Mahasiswa::create($val);
        }
    }
}
