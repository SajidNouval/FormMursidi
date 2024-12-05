<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\irs; // Model IRS
use App\Models\Mata_Kuliah; // Model Mata Kuliah
use App\Models\Kelas; // Model Kelas
use App\Models\Mahasiswa; // Model Mahasiswa
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class irsController extends Controller
{
    public function simpanirs(Request $request)
    {
        // Log data request untuk debugging
        Log::info('Data Request:', $request->all());

    
        // Ambil NIM mahasiswa berdasarkan user yang sedang login
        $userId = Auth::user()->id;
        $mahasiswa = Mahasiswa::where('user_id', $userId)->first();
    
        if (!$mahasiswa) {
            return response()->json(['error' => 'Mahasiswa tidak ditemukan'], 404);
        }
    
        $mahasiswaNim = $mahasiswa->nim;
        Log::info('Mahasiswa NIM:', ['nim' => $mahasiswaNim]);
        
        error_log("ok");
        error_log($mahasiswaNim);
        error_log($request->collect('irs'));
        // Iterasi setiap data IRS yang dikirimkan
        foreach ($request->input('irs') as $course) {
            Log::info('Processing course:', $course);
    
            // Pastikan semester ada
            if (!isset($course['semester'])) {
                return response()->json(['error' => 'Semester is required for each course'], 400);
            }
            
    
            // Cari mata kuliah berdasarkan kode MK
            $mataKuliah = Mata_Kuliah::where('kode_mk', $course['mata_kuliah_kode_mk'])->first();
    
            if (!$mataKuliah) {
                Log::warning('Mata kuliah tidak ditemukan:', ['kode_mk' => $course['mata_kuliah_kode_mk']]);
                return response()->json(['error' => 'Mata kuliah dengan kode ' . $course['mata_kuliah_kode_mk'] . ' tidak ditemukan'], 404);
            }

            // Cari kelas berdasarkan kode mata kuliah dan semester
            $kelas = Kelas::where('mata_kuliah_kode_mk', $course['mata_kuliah_kode_mk'])
                          ->where('tahun_Akademik', $course['tahun_akademik'])
                          ->first();

            if (!$kelas) {
                Log::warning('Kelas tidak ditemukan:', ['kode_mk' => $course['mata_kuliah_kode_mk']]);
                return response()->json(['error' => 'Kelas untuk mata kuliah ' . $course['mata_kuliah_kode_mk'] . ' tidak ditemukan'], 404);
            }
            
            // Simpan atau update IRS
            Irs::updateOrCreate(
                [
                    'mahasiswa_nim' => $mahasiswaNim,
                    'semester' => $course['semester'],
                    'tahun_akademik' => $course['tahun_akademik'],
                    'total_sks' => $course['total_sks'],
                    'ruang_kuliah_kode_ruang' => $course['ruang_kuliah_kode_ruang'],
                    'kelas_id' => $kelas->id, // Menghubungkan dengan ID kelas
                    'is_verified' => $course['is_verified'] ?? 0, // Nilai default jika tidak ada
                    'diajukan' => $course['diajukan'] ?? 0, // Nilai default jika tidak ada
                ]
            );
    
            Log::info('IRS berhasil disimpan atau diperbarui:', $course);
        }
    
        return response()->json(['message' => 'Simpan IRS berhasil', 'data' => $request->input('irs')], 200);
    }
    public function destroy($kode_mk)
{
    // Cari IRS berdasarkan kode mata kuliah
    $irs = Irs::whereHas('kelas.mataKuliah', function ($query) use ($kode_mk) {
        $query->where('kode_mk', $kode_mk);
    })->first();

    if ($irs) {
        $irs->delete(); // Hapus data IRS
        return response()->json(['message' => 'Mata kuliah berhasil dihapus.'], 200);
    }

    return response()->json(['message' => 'Mata kuliah tidak ditemukan.'], 404);
}

    public function getIrsData($nim)
    {
        $irsData = irs::where('mahasiswa_nim', $nim)->get();
        return response()->json($irsData);
    }
}
