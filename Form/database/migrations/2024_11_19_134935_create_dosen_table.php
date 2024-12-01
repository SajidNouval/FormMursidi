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
        Schema::create('dosen', function (Blueprint $table) {
            $table->string('nip')->primary(); // NIP sebagai primary key
            $table->string('nama');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->date('tanggal_lahir');
            $table->string('program_studi_kode_prodi');
            $table->string('fakultas_kode_fakultas');
            $table->string('periode mulai');
            $table->string('periode selesai');
            $table->enum('role', ['kaprodi', 'pakademik', 'dekan','dosen'])->default('kaprodi'); // Role dosen
            $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->timestamps();
            $table->foreign('program_studi_kode_prodi')->references('kode_prodi')->on('program_studi')->onDelete('cascade');
            $table->foreign('fakultas_kode_fakultas')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
