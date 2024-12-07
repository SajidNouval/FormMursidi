<?php

namespace App\Http\Controllers;
use App\Models\irs;
use Illuminate\Http\Request;

class getIrsController extends Controller
{
  /**
     * Menampilkan data IRS berdasarkan semester dan mahasiswa
     *
     * @param  int  $semester
     * @param  string  $nim
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIrsBySemester($semester, $nim)
    {
        // Ambil data IRS berdasarkan semester dan NIM mahasiswa
        $irs = IRS::with(['kelas', 'kelas.mataKuliah', 'kelas.mataKuliah.dosenMk', 'kelas.mataKuliah.dosenMk.dosen'])
                  ->where('semester', $semester)
                  ->where('mahasiswa_nim', $nim)
                  ->get();

        // Jika data tidak ditemukan, kembalikan respon kosong
        if ($irs->isEmpty()) {
            return response()->json([], 200);
        }

        // Format data untuk dikirim sebagai JSON
        $data = $irs->map(function ($item) {
            return [
                'kode_mk' => $item->kelas->mataKuliah->kode_mk,
                'nama_mk' => $item->kelas->mataKuliah->nama_mk,
                'kelas' => $item->kelas->kode_kelas,
                'sks' => $item->kelas->mataKuliah->sks,
                'ruang' => $item->ruang_kuliah_kode_ruang,
                // 'status' => $item->is_verified == 1 ? 'Verified' : 'Not Verified',
                'dosen' => $item->kelas->mataKuliah->dosenMk->dosen->nama, // Ambil nama dosen
                'tahun_akademik' => $item->tahun_akademik,
                'total_sks' => $item->total_sks
            ];
        });

        // Mengembalikan response JSON
        return response()->json($data);
    }
}
