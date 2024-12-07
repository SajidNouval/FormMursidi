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
                'kelas' => 'A',
                'jam_mulai' => '07:00',
                'jam_selesai' => '10:00',
                'status' => 'diajukan',
            ],
            [
                'id' => '2',
                'ruang_kuliah_kode_ruang' => 'E102',
                'mata_kuliah_kode_mk' => 'Paik101',
                'hari' => 'Selasa',
                'kelas' => 'B',
                'jam_mulai' => '08:00',
                'jam_selesai' => '11:00',
                'status' => 'diajukan',

            ],
            [
                'id' => '3',
                'ruang_kuliah_kode_ruang' => 'E103',
                'mata_kuliah_kode_mk' => 'Paik101',
                'hari' => 'Rabu',
                'kelas' => 'C',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
                'status' => 'diajukan',
            ],
            [
                'id' => '4',
                'ruang_kuliah_kode_ruang' => 'E104',
                'mata_kuliah_kode_mk' => 'Paik101',
                'hari' => 'Kamis',
                'kelas' => 'D',
                'jam_mulai' => '10:00',
                'jam_selesai' => '13:00',
                'status' => 'diajukan',
            ],
            [
                'id' => '5',
                'ruang_kuliah_kode_ruang' => 'E105',
                'mata_kuliah_kode_mk' => 'Paik102',
                'hari' => 'Jumat',
                'kelas' => 'A',
                'jam_mulai' => '08:00',
                'jam_selesai' => '11:00',
                'status' => 'diajukan',
            ],
            [
                'id' => '6',
                'ruang_kuliah_kode_ruang' => 'E105',
                'mata_kuliah_kode_mk' => 'Paik102',
                'hari' => 'Senin',
                'kelas' => 'B',
                'jam_mulai' => "11:00", // Format waktu diperbaiki
                'jam_selesai' => "12:00", // Format waktu diperbaiki
                'status' => 'diajukan',
            ],
            [
                'id' => '7',
                'ruang_kuliah_kode_ruang' => 'E201',
                'mata_kuliah_kode_mk' => 'Paik102',
                'hari' => 'Selasa',
                'kelas' => 'C',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
                'status' => 'diajukan',
            ],
            [
                'id' => '8',
                'ruang_kuliah_kode_ruang' => 'E202',
                'mata_kuliah_kode_mk' => 'Paik102',
                'hari' => 'Rabu',
                'kelas' => 'D',
                'jam_mulai' => '10:00',
                'jam_selesai' => '13:00',
                'status' => 'diajukan',
            ],
            [
                'id' => '9',
                'ruang_kuliah_kode_ruang' => 'E203',
                'mata_kuliah_kode_mk' => 'Paik103',
                'hari' => 'Kamis',
                'kelas'=> 'A',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
                'status' => 'diajukan',

            ],
            [
                'id' => '10',
                'ruang_kuliah_kode_ruang' => 'E204',
                'mata_kuliah_kode_mk' => 'Paik103',
                'hari' => 'Jumat',
                'kelas'=> 'B',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
                'status' => 'diajukan',

            ],
            [
                'id' => '11',
                'ruang_kuliah_kode_ruang' => 'E205',
                'mata_kuliah_kode_mk' => 'Paik103',
                'hari' => 'Senin',
                'kelas'=> 'C',
                'jam_mulai' => '15:00',
                'jam_selesai' => '18:00',
                'status' => 'diajukan',

            ],
            [
                'id' => '12',
                'ruang_kuliah_kode_ruang' => 'E205',
                'mata_kuliah_kode_mk' => 'Paik103',
                'hari' => 'Selasa',
                'kelas'=> 'D',
                'jam_mulai' => '08:00',
                'jam_selesai' => '11:00',
                'status' => 'diajukan',

            ],
            [
                'id' => '13',
                'ruang_kuliah_kode_ruang' => 'E201',
                'mata_kuliah_kode_mk' => 'Paik104',
                'hari' => 'Rabu',
                'kelas'=> 'A',
                'jam_mulai' => '08:00',
                'jam_selesai' => '11:00',
                'status' => 'diajukan',

            ],
            [
                'id' => '14',
                'ruang_kuliah_kode_ruang' => 'E202',
                'mata_kuliah_kode_mk' => 'Paik104',
                'hari' => 'Kamis',
                'kelas'=> 'B',
                'jam_mulai' => '08:00',
                'jam_selesai' => '11:00',
                'status' => 'diajukan',

            ],
            [
                'id' => '15',
                'ruang_kuliah_kode_ruang' => 'E203',
                'mata_kuliah_kode_mk' => 'Paik104',
                'hari' => 'Jumat',
                'kelas'=> 'C',
                'jam_mulai' => '10:00',
                'jam_selesai' => '13:00',
                'status' => 'diajukan',

            ],
            [
                'id' => '16',
                'ruang_kuliah_kode_ruang' => 'E204',
                'mata_kuliah_kode_mk' => 'Paik104',
                'hari' => 'Senin',
                'kelas'=> 'D',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
                'status' => 'diajukan',

            ],
            
            ];
            foreach ($jdwl_kul as $key=>$val) {
                Jadwal_Kuliah::create($val); // Menggunakan model yang benar
            }
    }
}
