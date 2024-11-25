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
        Schema::create('ruang_kuliah', function (Blueprint $table) {
            $table->string('kode_ruang')->primary(); // Kode unik untuk ruang kuliah
            $table->integer('kapasitas'); // Kapasitas ruang
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang_kuliah');
    }
};
