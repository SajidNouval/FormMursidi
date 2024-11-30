<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosen;

class dosenseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosenData =[
            [
                // $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
                // $table->string('nip')->primary();
                // $table->string('nama');
                // $table->string('alamat');
                // $table->string('email')->unique();
                // $table->date('tanggal_lahir');
                // $table->enum('role', ['kaprodi', 'pakademik', 'dekan'])->default('kaprodi'); // Role dosen

                'user_id' => '2',
                'nip' => '1234567890',
                'nama' => 'Irfan Sibudi',
                'alamat' => 'Jl.Kejambon',
                'email' => 'dosen1@unpas.ac.id',
                'tanggal_lahir' => '1990-01-01',
                'role' => 'kaprodi'
            ],
<<<<<<< HEAD
=======
            [
                'user_id' => '3',
                'nip' => '2234567890',
                'nama' => 'Sajid Ironi',
                'alamat' => 'Jl.banjarsari',
                'email' => 'dosen2@unpas.ac.id',
                'tanggal_lahir' => '1991-02-12',
                'role' => 'pakademik'
            ],
            [
                'user_id' => '4',
                'nip' => '3234567890',
                'nama' => 'Ayyub Perkedel',
                'alamat' => 'Jl.Gondang Timur',
                'email' => 'dosen3@unpas.ac.id',
                'tanggal_lahir' => '1998-10-12',
                'role' => 'dekan'
            ],
            [
                'user_id' => '5',
                'nip' => '4234567890',
                'nama' => 'Titah Kelomang',
                'alamat' => 'Jl.Mulawarman',
                'email' => 'dosen4@unpas.ac.id',
                'tanggal_lahir' => '1994-09-10',
                'role' => 'dosen'
            ],
            [
                'user_id' => '6',
                'nip' => '5234561110',
                'nama' => 'Budi Sibudi',
                'alamat' => 'Jl. aja dulu kita',
                'email' => 'dosenn2@unpas.ac.id',
                'tanggal_lahir' => '1980-11-10',
                'role' => 'dosen'
            ],
            [
                'user_id' => '7',
                'nip' => '5234567890',
                'nama' => 'Alwi Hambali',
                'alamat' => 'Jl. aja dulu',
                'email' => 'dosen5@unpas.ac.id',
                'tanggal_lahir' => '1980-11-11',
                'role' => 'dosen'
            ],
>>>>>>> f61c53b (P BERUBAHHH)
        ];
        foreach($dosenData as $key => $val){
            Dosen::create($val);
        }
    }
}
