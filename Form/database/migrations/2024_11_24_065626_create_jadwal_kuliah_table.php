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
            $table->id();
            $table->string('ruang_kuliah_kode_ruang');
            $table->string('mata_kuliah_kode_mk');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();

            $table->foreign('ruang_kuliah_kode_ruang')->references('kode_ruang')->on('ruang_kuliah')->onDelete('cascade');
            $table->foreign('mata_kuliah_kode_mk')->references('kode_mk')->on('mata_kuliah')->onDelete('cascade');

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
