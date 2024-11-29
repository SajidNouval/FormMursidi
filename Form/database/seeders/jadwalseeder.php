<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jadwal_Kuliah; // Pastikan menggunakan model yang benar

class jadwalseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwalData =[[
            'id' => '1',
            'ruang_kuliah_kode_ruang' => 'E101',
            'mata_kuliah_kode_mk' => 'Paik101',
            'hari' => 'Senin',
            'jam_mulai' => '07:00',
            'jam_selesai' => '09:00',
        ],
        [
            'id' => '2',
            'ruang_kuliah_kode_ruang' => 'E102',
            'mata_kuliah_kode_mk' => 'Paik102',
            'hari' => 'Selasa',
            'jam_mulai' => '09:00',
            'jam_selesai' => '11:00',
        ],
        [
            'id' => '3',
            'ruang_kuliah_kode_ruang' => 'E103',
            'mata_kuliah_kode_mk' => 'Paik103',
            'hari' => 'Rabu',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:00',
        ],
        ];
        foreach($jadwalData as $key => $val){
            Jadwal_Kuliah::create($val);
        }
    }
}