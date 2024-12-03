<?php

namespace Database\Seeders;

use App\Models\Jadwal_Kuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jadwalkuliahseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jdwl_kul = [
            [
            'id' => '1',
            'ruang_kuliah_kode_ruang' => 'E101',
            'mata_kuliah_kode_mk' => 'Paik101',
            'hari' => 'Senin',
            'jam_mulai' => '07:00',
            'jam_selesai' => '11:00',
            ],
            [
                'id' => '2',
                'ruang_kuliah_kode_ruang' => 'E102',
                'mata_kuliah_kode_mk' => 'Paik102',
                'hari' => 'Selasa',
                'jam_mulai' => '09:00',
                'jam_selesai' => '12:00',
            ],
            [
                'id' => '3',
                'ruang_kuliah_kode_ruang' => 'E103',
                'mata_kuliah_kode_mk' => 'Paik103',
                'hari' => 'Rabu',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
            ],
            [
                'id' => '4',
                'ruang_kuliah_kode_ruang' => 'E103',
                'mata_kuliah_kode_mk' => 'Paik104',
                'hari' => 'Rabu',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
            ],
            [
                'id' => '5',
                'ruang_kuliah_kode_ruang' => 'E105',
                'mata_kuliah_kode_mk' => 'Paik103',
                'hari' => 'Senin',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
            ],
            [
                'id' => '6',
                'ruang_kuliah_kode_ruang' => 'E101',
                'mata_kuliah_kode_mk' => 'Paik106',
                'hari' => 'Selasa',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
            ],
            
            ];
            foreach ($jdwl_kul as $key=>$val) {
                Jadwal_Kuliah::create($val); // Menggunakan model yang benar
            }
    }
}
