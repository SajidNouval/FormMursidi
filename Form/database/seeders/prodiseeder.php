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
                // $table->string('kode_prodi')->primary();
                // $table->string('nama_prodi');
                // $table->foreignId('fakultas_id')->constrained('fakultas')->onDelete('cascade');

                'kode_prodi' => '01',
                'nama_prodi' => 'Teknik Informatika',
                'fakultas_kode_fakultas' => '101'
    
            ],

        ];
        foreach($prodiData as $key => $val){
            Program_Studi::create($val);
        }
    }
}
