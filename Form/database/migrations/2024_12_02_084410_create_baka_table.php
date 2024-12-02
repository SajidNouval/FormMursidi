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
        Schema::create('baka', function (Blueprint $table) {
            $table->string('nip')->primary();
            $table->string('nama');
            $table->string('alamat');
            $table->string('notelp');
            $table->string('fakultas_kode_fakultas');
            $table->timestamps();

            $table->foreign('fakultas_kode_fakultas')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baka');
    }
};
