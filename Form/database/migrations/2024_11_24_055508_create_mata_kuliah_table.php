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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('kode_mk')->primary();
            $table->string('nama_mk');
            $table->integer('sks');
            $table->integer('semester');
            $table->string('jenis');
            $table->string('program_studi_kode_prodi'); // Tambahkan kolom program_studi_kode_prodi
            $table->string('fakultas_kode_fakultas');
            $table->timestamps();

            // Menambahkan foreign key ke tabel program_studi
            $table->foreign('program_studi_kode_prodi')
                  ->references('kode_prodi')
                  ->on('program_studi')
                  ->onDelete('cascade');

                  $table->foreign('fakultas_kode_fakultas')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');

        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
