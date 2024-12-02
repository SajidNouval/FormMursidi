<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Konsultasi;

class KonsultasiSeeder extends Seeder
{
    public function run()
    {
        // Mendefinisikan data konsultasi
        $konsultasiData = [
            [
                'dosen_wali_nip' => '1234567890', // Pastikan NIP ini ada di tabel dosen
                'mahasiswa_nim' => '2406012213110', // Pastikan NIM ini ada di tabel mahasiswa
                'subjek' => 'Permohonan Konsultasi',
                'isi_pesan' => 'Saya ingin bertanya tentang tugas.',
                'tanggal_konsultasi' => now(),
                'status' => 'Pending',
            ],
            [
                'dosen_wali_nip' => '1234567890',
                'mahasiswa_nim' => '24060122130034',
                'subjek' => 'Pertanyaan tentang Ujian',
                'isi_pesan' => 'Apa saja yang harus dipersiapkan untuk ujian?',
                'tanggal_konsultasi' => now(),
                'status' => 'Pending',
            ],
        ];

        // Menginsert data ke dalam tabel konsultasi
        foreach ($konsultasiData as $data) {
            Konsultasi::create($data);
        }
    }
}