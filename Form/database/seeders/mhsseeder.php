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
                'tahun_masuk'=>'2022',
                'semester'=>'5',
                'nip_doswal'=>'42345632890',
                'SKS_Kumulatif'=>'20',
                'IPS'=>'2.82',
                'IPK'=>'2.95',
                'user_id' => '1'
    
            ],
            [
                'nim' =>'24060122130034',
                'nama' => 'Rusdi',
                'alamat' => 'Jl. Iwenisari',
                'email' => 'mhs2@gmail.com',
                'tanggal_lahir'=> '2000-10-15',
                'tahun_masuk'=>'2022',
                'semester'=>'5',
                'nip_doswal'=>'42345632890',
                'SKS_Kumulatif'=>'24',
                'IPS'=>'3.00',
                'IPK'=>'3.00',
                'user_id' => '2'
            ],
            [
                'nim' =>'2406012213001',
                'nama' => 'Fuad',
                'alamat' => 'Jl. Banjarsari',
                'email' => 'mhs3@gmail.com',
                'tanggal_lahir'=> '2001-10-11',
                'tahun_masuk'=>'2022',
                'semester'=>'5',
                'nip_doswal'=>'42345632890',
                'SKS_Kumulatif'=>'20',
                'IPS'=>'2.80',
                'IPK'=>'2.96',
                'user_id' => '3'
            ],
            [
                'nim' =>'2406012212000',
                'nama' => 'Ironi',
                'alamat' => 'Jl. Melati',
                'email' => 'mhs4@gmail.com',
                'tanggal_lahir'=> '2004-09-15',
                'tahun_masuk'=>'2022',
                'semester'=>'5',
                'nip_doswal'=>'42345632890',
                'SKS_Kumulatif'=>'20',
                'IPS'=>'2.75',
                'IPK'=>'2.90',
                'user_id' => '4'
            ],
            [
                'nim' =>'2406012214000',
                'nama' => 'imut',
                'alamat' => 'Jl. Mawar',
                'email' => 'mhs5@gmail.com',
                'tanggal_lahir'=> '2011-05-15',
                'tahun_masuk'=>'2022',
                'semester'=>'5',
                'nip_doswal'=>'42345632890',
                'SKS_Kumulatif'=>'24',
                'IPS'=>'3.00',
                'IPK'=>'3.69',
                'user_id' => '5'
            ],

        ];
        foreach($mhsData as $key => $val){
            Mahasiswa::create($val);
        }
    }
}
