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
        Schema::create('dosen_mk', function (Blueprint $table) {
            $table->id();
            $table->string('dosen_nip');
            $table->string('mata_kuliah_kode_mk');
            $table->string('tahun_akademik');
            $table->timestamps();

            $table->foreign('dosen_nip')->references('nip')->on('dosen')->onDelete('cascade');
            $table->foreign('mata_kuliah_kode_mk')->references('kode_mk')->on('mata_kuliah')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_mk');
    }
};
