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
        Schema::create('irs', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswa_nim'); // Menambahkan kolom mahasiswa_nim
            $table->integer('semester');
            $table->string('tahun_akademik');
            $table->integer('total_sks')->default(0);
            $table->string('mata_kuliah_kode_mk'); // Menambahkan kolom mata_kuliah_kode_mk
            $table->timestamps();

            // Menambahkan foreign key ke tabel mahasiswa pada kolom nim
            $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            // Menambahkan foreign key ke tabel mata_kuliah pada kolom kode_mk
            $table->foreign('mata_kuliah_kode_mk')->references('kode_mk')->on('mata_kuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs');
    }
};

