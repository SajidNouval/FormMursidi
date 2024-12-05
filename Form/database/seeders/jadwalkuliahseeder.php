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
                'kelas'=> 'A',
                'jam_mulai' => '07:00',
                'jam_selesai' => '10:00',
            ],
            [
                'id' => '2',
                'ruang_kuliah_kode_ruang' => 'E102',
                'mata_kuliah_kode_mk' => 'Paik102',
                'hari' => 'Selasa',
                'kelas'=> 'A',
                'jam_mulai' => '09:00',
                'jam_selesai' => '12:00',
            ],
            [
                'id' => '3',
                'ruang_kuliah_kode_ruang' => 'E103',
                'mata_kuliah_kode_mk' => 'Paik103',
                'hari' => 'Rabu',
                'kelas'=> 'A',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
            ],
            [
                'id' => '4',
                'ruang_kuliah_kode_ruang' => 'E104',
                'mata_kuliah_kode_mk' => 'Paik104',
                'hari' => 'Kamis',
                'kelas'=> 'A',
                'jam_mulai' => '10:00',
                'jam_selesai' => '13:00',
            ],
            [
                'id' => '5',
                'ruang_kuliah_kode_ruang' => 'E105',
                'mata_kuliah_kode_mk' => 'Paik105',
                'hari' => 'Jumat',
                'kelas'=> 'A',
                'jam_mulai' => '08:00',
                'jam_selesai' => '11:00',
            ],
            [
                'id' => '6',
                'ruang_kuliah_kode_ruang' => 'E105',
                'mata_kuliah_kode_mk' => 'Paik106',
                'hari' => 'Senin',
                'kelas'=> 'A',
                'jam_mulai' => '11:00',
                'jam_selesai' => '14:00',
            ],
            [
                'id' => '7',
                'ruang_kuliah_kode_ruang' => 'E201',
                'mata_kuliah_kode_mk' => 'Paik107',
                'hari' => 'Selasa',
                'kelas'=> 'A',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
            ],
            [
                'id' => '8',
                'ruang_kuliah_kode_ruang' => 'E202',
                'mata_kuliah_kode_mk' => 'Paik108',
                'hari' => 'Rabu',
                'kelas'=> 'A',
                'jam_mulai' => '10:00',
                'jam_selesai' => '13:00',
            ],
            [
                'id' => '9',
                'ruang_kuliah_kode_ruang' => 'E203',
                'mata_kuliah_kode_mk' => 'Paik109',
                'hari' => 'Kamis',
                'kelas'=> 'A',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
            ],
            [
                'id' => '10',
                'ruang_kuliah_kode_ruang' => 'E204',
                'mata_kuliah_kode_mk' => 'Paik110',
                'hari' => 'Jumat',
                'kelas'=> 'A',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
            ],
            [
                'id' => '11',
                'ruang_kuliah_kode_ruang' => 'E205',
                'mata_kuliah_kode_mk' => 'Paik111',
                'hari' => 'Senin',
                'kelas'=> 'A',
                'jam_mulai' => '15:00',
                'jam_selesai' => '18:00',
            ],
            [
                'id' => '12',
                'ruang_kuliah_kode_ruang' => 'E205',
                'mata_kuliah_kode_mk' => 'Paik112',
                'hari' => 'Selasa',
                'kelas'=> 'A',
                'jam_mulai' => '08:00',
                'jam_selesai' => '11:00',
            ],
            [
                'id' => '13',
                'ruang_kuliah_kode_ruang' => 'E201',
                'mata_kuliah_kode_mk' => 'Paik113',
                'hari' => 'Rabu',
                'kelas'=> 'A',
                'jam_mulai' => '08:00',
                'jam_selesai' => '11:00',
            ],
            [
                'id' => '14',
                'ruang_kuliah_kode_ruang' => 'E202',
                'mata_kuliah_kode_mk' => 'Paik114',
                'hari' => 'Kamis',
                'kelas'=> 'A',
                'jam_mulai' => '08:00',
                'jam_selesai' => '11:00',
            ],
            [
                'id' => '15',
                'ruang_kuliah_kode_ruang' => 'E203',
                'mata_kuliah_kode_mk' => 'Paik115',
                'hari' => 'Jumat',
                'kelas'=> 'A',
                'jam_mulai' => '10:00',
                'jam_selesai' => '13:00',
            ],
            [
                'id' => '16',
                'ruang_kuliah_kode_ruang' => 'E204',
                'mata_kuliah_kode_mk' => 'Paik116',
                'hari' => 'Senin',
                'kelas'=> 'A',
                'jam_mulai' => '13:00',
                'jam_selesai' => '16:00',
            ],
            
            ];
            foreach ($jdwl_kul as $key=>$val) {
                Jadwal_Kuliah::create($val); // Menggunakan model yang benar
            }
    }
}
