<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Irs; // Pastikan model IRS sudah benar
use App\Models\Mata_Kuliah; // Model MataKuliah
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class irsController extends Controller
{
    // Menambah IRS untuk daftar mata kuliah
    public function tambah(Request $request)
{
    $data = $request->validate([
        'mahasiswa_nim' => 'required|string',
        'selected_courses' => 'required|array',
        'selected_courses.*.mata_kuliah_kode_mk' => 'required|string',
        'selected_courses.*.semester' => 'required|integer',
        'selected_courses.*.tahun_akademik' => 'required|string',
    ]);

    // Cek apakah mahasiswa ada di database
    $mahasiswa = Mahasiswa::where('nim', $data['mahasiswa_nim'])->first();
    if (!$mahasiswa) {
        return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
    }

    $addedCourses = [];
    foreach ($data['selected_courses'] as $courseData) {
        $mataKuliah = Mata_Kuliah::where('mata_kuliah_kode_mk', $courseData['mata_kuliah_kode_mk'])->first();
        if ($mataKuliah) {
            $irs = new Irs();
            $irs->mahasiswa_nim = $mahasiswa->nim;
            $irs->mata_kuliah_kode_mk = $mataKuliah->mata_kuliah_kode_mk;
            $irs->semester = $courseData['semester'];
            $irs->tahun_akademik = $courseData['tahun_akademik'];
            $irs->save();

            $addedCourses[] = $mataKuliah;
        }
    }

    return response()->json([
        'message' => 'Mata kuliah berhasil ditambahkan',
        'added_courses' => $addedCourses,
    ]);
}

    // Menghapus IRS
    public function hapus(Request $request)
    {
        $data = $request->validate([
            'mahasiswa_nim' => 'required|string',
            'mata_kuliah_kode_mk' => 'required|string',
        ]);
    
        // Cek apakah mahasiswa ada di database
        $mahasiswa = Mahasiswa::where('nim', $data['mahasiswa_nim'])->first();
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }
    
        // Cari mata kuliah yang akan dihapus
        $irs = Irs::where('mahasiswa_nim', $mahasiswa->nim)
                  ->where('mata_kuliah_kode_mk', $data['mata_kuliah_kode_mk'])
                  ->first();
    
        if (!$irs) {
            return response()->json(['message' => 'Mata kuliah tidak ditemukan di IRS'], 404);
        }
    
        // Hapus mata kuliah dari IRS
        $irs->delete();
    
        return response()->json([
            'message' => 'Mata kuliah berhasil dihapus',
        ]);
    }
    
}
