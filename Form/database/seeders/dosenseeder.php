<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dosenseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosenData = [
            [
                'nip' => '1234567890',
                'nama' => 'Irfan Sibudi',
                'alamat' => 'Jl. Kejambon',
                'email' => 'dosen@gmail.com',
                'tanggal_lahir' => '1990-01-01',
                'role' => 'dosen',
                'user_id' => '1',
            ],
        ];
        foreach($dosenData as $key => $val){
            Dosen::create($val);
        }
    }
}
