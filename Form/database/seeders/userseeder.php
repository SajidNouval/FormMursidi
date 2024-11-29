<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'mahasiswa',
                'email'=>'mhs@gmail.com',
                'role'=>'mahasiswa',
                'password'=>bcrypt('12345')
            ],
            [
                'name'=>'bakademik',
                'email'=>'bamk@gmail.com',
                'role'=>'bakademik',
                'password'=>bcrypt('12345')
            ],
            [
                'name'=>'kaprodi',
                'email'=>'kaprodi@gmail.com',
                'role'=>'kaprodi',
                'password'=>bcrypt('12345')
            ],
            [
                'name'=>'dekan',
                'email'=>'dekan@gmail.com',
                'role'=>'dekan',
                'password'=>bcrypt('12345')
            ],
            [
                'name'=>'pakademik',
                'email'=>'pamk@gmail.com',
                'role'=>'pakademik',
                'password'=>bcrypt('12345')
            ],
            [   
                'name'=>'dosen',
                'email'=>'dosen@gmail.com',
                'role'=>'dosen',
                'password'=>bcrypt('12345')
            ]

        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
