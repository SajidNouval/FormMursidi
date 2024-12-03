<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id(); // ID sebagai primary key
            $table->string('dosen_wali_nip'); // Menggunakan nip sebagai foreign key
            $table->foreign('dosen_wali_nip')->references('nip')->on('dosen')->onDelete('cascade'); // Relasi ke tabel dosen
            $table->string('mahasiswa_nim'); // Menggunakan nim sebagai foreign key
            $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswa')->onDelete('cascade'); // Relasi ke tabel mahasiswa
            $table->string('subjek'); // Subjek konsultasi
            $table->text('isi_pesan'); // Isi pesan
            $table->timestamp('tanggal_konsultasi')->useCurrent(); // Tanggal dan waktu konsultasi
            $table->enum('status', ['pending', 'completed'])->default('pending'); // Status konsultasi
            $table->timestamps(); // Menyimpan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi');
    }
};