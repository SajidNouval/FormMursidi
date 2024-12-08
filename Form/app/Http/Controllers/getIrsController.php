<?php
namespace App\Http\Controllers;
use App\Models\Irs;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class getIrsController extends Controller
{
    /**
     * Menampilkan data IRS berdasarkan semester dan mahasiswa
     *
     * @param  int  $semester
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIrsBySemester($semester)
    {
        $user = Auth::user();
        // Debugging auth
        if (!$user) {
            return response()->json(['error' => 'User tidak terautentikasi'], 401);
        }
    
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
    
        if (!$mahasiswa) {
            return response()->json(['error' => 'Mahasiswa tidak ditemukan'], 404);
        }
    
        $nim = $mahasiswa->nim;
    
        // Tambahkan log untuk debug
        Log::info('Semester:', ['semester' => $semester]);
        Log::info('Mahasiswa NIM:', ['nim' => $nim]);
    
        $irs = Irs::with(['kelas', 'kelas.mataKuliah'])
            ->where('semester', $semester)
            ->where('mahasiswa_nim', $nim)
            ->get();
        if ($irs->isEmpty()) {
            return response()->json([], 200);
        }
        return response()->json($irs);
        
        error_log("Sini");
        error_log($irs);
        Log::info('IRS Data:', $irs->toArray());
    
        return response()->json($irs->map(function ($item) {
            return [
                'nama_mk' => $item->kelas->mata_kuliah->nama_mk,
                'semester' => $item->semester,
                'tahun_akademik' => $item->tahun_akademik,
                'ruang' => $item->ruang_kuliah_kode_ruang,
                'total_sks' => $item->total_sks,
            ];
        }));
    }
    
}
