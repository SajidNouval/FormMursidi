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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->date('tanggal_lahir');
            $table->string('tahun_masuk');
            $table->string('semester');
            $table->enum('role', ['aktif', 'cuti', 'kosong' ])->default('kosong');
            $table->string('nip_doswal');
            $table->integer('SKS_Kumulatif');
            $table->float('IPS');
            $table->float('IPK');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->foreign('nip_doswal')->references('nip')->on('dosen')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
