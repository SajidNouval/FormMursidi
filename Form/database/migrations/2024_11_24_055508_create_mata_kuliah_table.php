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
            $table->string('kode_mk')->primary(); // Primary key
            $table->string('nama_mk'); // Name of the course
            $table->integer('sks'); // Credit hours
            $table->integer('semester'); // Semester number
            $table->string('jenis'); // Type of course
            $table->string('program_studi_kode_prodi'); // Foreign key to program_studi
            $table->string('fakultas_kode_fakultas'); // Foreign key to fakultas
            $table->string('pengampu1')->nullable(); // First lecturer
            $table->string('pengampu2')->nullable(); // Second lecturer
            $table->string('pengampu3')->nullable(); // Third lecturer
            $table->string('pengampu4')->nullable(); // Fourth lecturer
            $table->string('tahun_akademik')->nullable(); // Academic year
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraints
            $table->foreign('program_studi_kode_prodi')
                  ->references('kode_prodi')
                  ->on('program_studi')
                  ->onDelete('cascade');

            $table->foreign('fakultas_kode_fakultas')
                  ->references('kode_fakultas')
                  ->on('fakultas')
                  ->onDelete('cascade');
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