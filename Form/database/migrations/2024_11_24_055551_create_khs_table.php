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
        Schema::create('khs', function (Blueprint $table) {
            // $table->id(); // Tambahkan primary key default
            $table->string('mahasiswa_nim'); // Kolom untuk foreign key mahasiswa
            $table->string('mata_kuliah_kode_mk'); // Kolom untuk foreign key mata kuliah
            $table->string('status');
            $table->string('nilai_huruf');
            $table->float('IPS');
            $table->float('IPK');
            $table->timestamps();

            $table->primary(['mahasiswa_nim', 'mata_kuliah_kode_mk']);

            // Tambahkan foreign key
            $table->foreign('mahasiswa_nim')
                  ->references('nim')
                  ->on('mahasiswa')
                  ->onDelete('cascade');
                  
            $table->foreign('mata_kuliah_kode_mk')
                  ->references('kode_mk')
                  ->on('mata_kuliah')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khs');
    }
};
