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
        Schema::create('jadwal_kuliah', function (Blueprint $table) {
            $table->id() ->primary();
            $table->string('ruang_kuliah_kode_ruang');
            $table->string('mata_kuliah_kode_mk');
            $table->string('hari');
            $table->string('kelas');
            $table->enum('jam_mulai', ['07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','kosong'])->default('kosong'); 
            $table->enum('jam_selesai', ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','kosong'])->default('kosong');
            
            $table->timestamps();
            
            $table->foreign('ruang_kuliah_kode_ruang')->references('kode_ruang')->on('ruang_kuliah')->onDelete('cascade');
            $table->foreign('mata_kuliah_kode_mk')->references('kode_mk')->on('mata_kuliah')->onDelete('cascade');

            // $table->enum('jam_mulai', ['07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','kosong'])->default('kosong'); 
            // $table->enum('jam_selesai', ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','kosong'])->default('kosong');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kuliah');
    }
};