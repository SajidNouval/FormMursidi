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
                'id'=> 1,
                'name'=>'mahasiswa',
                'email'=>'mhs@gmail.com',
                'role'=>'mahasiswa',
                'password'=>bcrypt('12345')
            ],
            [
                'id'=> 2, 
                'name'=>'bakademik',
                'email'=>'bamk@gmail.com',
                'role'=>'bakademik',
                'password'=>bcrypt('12345')
            ],
            [
                'id'=> 3, 
                'name'=>'kaprodi',
                'email'=>'kaprodi@gmail.com',
                'role'=>'kaprodi',
                'password'=>bcrypt('12345')
            ],
            [
                'id'=> 4, 
                'name'=>'dekan',
                'email'=>'dekan@gmail.com',
                'role'=>'dekan',
                'password'=>bcrypt('12345')
            ],
            [
                'id'=> 5, 
                'name'=>'pakademik',
                'email'=>'pamk@gmail.com',
                'role'=>'pakademik',
                'password'=>bcrypt('12345')
            ],
            [   
                'id'=> 6, 
                'name'=>'dosen',
                'email'=>'dosen@gmail.com',
                'role'=>'dosen',
                'password'=>bcrypt('12345')
            ],
            [
                'id'=> 7, 
                'name'=>'osen',
                'email'=>'dosenn2@unpas.ac.id',
                'role'=>'dosen',
                'password'=>bcrypt('12345')
            ],
            [
                'id'=> 8, 
                'name'=>'ddosen',
                'email'=>'dosen5@unpas.ac.id',
                'role'=>'dosen',
                'password'=>bcrypt('12345')
            ],
          


        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
