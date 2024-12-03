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
            $table->string('ruang_kuliah_kode_ruang');
            $table->tinyInteger('is_verified');
            $table->tinyInteger('diajukan');
            $table->timestamps();
            // Menambahkan foreign key ke tabel mahasiswa pada kolom nim
            $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            // $table->foreign('ruang_kuliah_kode_ruang')->references('kode_ruang')->on('ruang_kuliah')->onDelete('cascade');
            $table->foreign('ruang_kuliah_kode_ruang')->references('kode_ruang')->on('ruang_kuliah')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade'); // Relasi ke tabel users

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

