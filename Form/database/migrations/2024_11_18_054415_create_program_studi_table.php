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
        Schema::create('program_studi', function (Blueprint $table) {
            // $table->id();
            $table->string('kode_prodi')->primary();
            $table->string('nama_prodi');
            $table->string('fakultas_kode_fakultas');
            // $table->foreignId('fakultas_id')->constrained('fakultas')->onDelete('cascade');
            $table->timestamps();

            $table->foreign('fakultas_kode_fakultas')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studi');
    }
};
