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
        Schema::create('ruang_kuliah', function (Blueprint $table) {
            $table->string('kode_ruang')->primary(); // Kode unik untuk ruang kuliah
            $table->integer('kapasitas'); // Kapasitas ruang
            $table->string('program_studi_kode_prodi');
            $table->string('fakultas_kode_fakultas');
            $table->enum('status',['diajukan', 'disetujui','ditolak'])->default('diajukan');
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Tambahkan unique constraint
            $table->unique(['kode_ruang', 'program_studi_kode_prodi'], 'unique_kode_ruang_prodi');

            $table->foreign('program_studi_kode_prodi')->references('kode_prodi')->on('program_studi')->onDelete('cascade');
            $table->foreign('fakultas_kode_fakultas')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang_kuliah');
    }
};
