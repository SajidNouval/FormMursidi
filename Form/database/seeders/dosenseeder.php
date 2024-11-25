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

                'user_id' => '1',
                'nip' => '1234567890',
                'nama' => 'Irfan Sibudi',
                'alamat' => 'Jl.Kejambon',
                'email' => 'dosen1@unpas.ac.id',
                'tanggal_lahir' => '1990-01-01',
                'role' => 'kaprodi'
            ],
        ];
        foreach($dosenData as $key => $val){
            Dosen::create($val);
        }
    }
}
