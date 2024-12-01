<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosenData = [
            [
                // $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
                // $table->string('nip')->primary();
                // $table->string('nama');
                // $table->string('alamat');
                // $table->string('email')->unique();
                // $table->date('tanggal_lahir');
                // $table->enum('role', ['kaprodi', 'pakademik', 'dekan'])->default('kaprodi'); // Role dosen


                'nip' => '1234567890',
                'nama' => 'Irfan Sibudi',
                'alamat' => 'Jl. Kejambon',
                'email' => 'kaprodi@gmail.com',
                'tanggal_lahir' => '1990-01-01',
                'role' => 'kaprodi',
                'periode mulai'=> '2018',
                'periode selesai'=> '2026',
                'user_id' => 3, // Pastikan ID ini ada di tabel users
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
            ],
            [
                'nip' => '2234567890',
                'nama' => 'Sajid Ironi',
                'alamat' => 'Jl. Banjarsari',
                'email' => 'pamk@gmail.com',
                'tanggal_lahir' => '1991-02-12',
                'role' => 'pakademik',
                'periode mulai'=> '2018',
                'periode selesai'=> '2026',
                'user_id' => 2,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
            ],
            [
                'nip' => '3234567890',
                'nama' => 'Ayyub Perkedel',
                'alamat' => 'Jl. Gondang Timur',
                'email' => 'dekan@gmail.com',
                'tanggal_lahir' => '1998-10-12',
                'role' => 'dekan',
                'periode mulai'=> '2018',
                'periode selesai'=> '2026',
                'user_id' => 4,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
            ],
            [
                'nip' => '4234567890',
                'nama' => 'Titah Kelomang',
                'alamat' => 'Jl. Mulawarman',
                'email' => 'dosen@gmail.com',
                'tanggal_lahir' => '1994-09-10',
                'role' => 'dosen',
                'periode mulai'=> '2018',
                'periode selesai'=> '2026',
                'user_id' => 6,
                'program_studi_kode_prodi' => '01',
                'fakultas_kode_fakultas' => '101',
            ],


        ];

        foreach($dosenData as $key => $val){
            Dosen::create($val);
        }
    }
}
