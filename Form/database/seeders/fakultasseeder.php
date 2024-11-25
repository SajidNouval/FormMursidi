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
                // $table->string('kode_fakultas')->primary();
                // $table->string('nama_fakultas');
                // $table->string('alamat');
                // $table->string('email')->nullable();
                // $table->timestamps();

                'kode_fakultas' => '101',
                'nama_fakultas' => 'Fakultas Sastra Mesin',
                'alamat' => 'Jl. Raya Bandung',
                'email' => 'fsm@unpas.ac.id',
                
            ],
        ];
        foreach($fakultasData as $key => $val){
            Fakultas::create($val);
        }
    }
}
