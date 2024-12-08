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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->enum('kode_kelas', ['A', 'B', 'C', 'D']);
            $table->string('mata_kuliah_kode_mk');
            $table->string('tahun_Akademik');
            $table->string('kuota');
            $table->timestamps();

            $table->foreign('mata_kuliah_kode_mk')->references('kode_mk')->on('mata_kuliah')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
