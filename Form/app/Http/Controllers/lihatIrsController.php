<?php

namespace App\Http\Controllers;

use App\Models\Irs;
use Illuminate\Http\Request;
use App\Models\Mahasiswa; // Model Mahasiswa
use Illuminate\Support\Facades\Auth;

class lihatIrsController extends Controller
{
    /**
     * Menampilkan data IRS berdasarkan semester
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function getIrsData(Request $request)
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        // Mendapatkan data mahasiswa berdasarkan user_id
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        // Jika mahasiswa tidak ditemukan, kembalikan response error
        if (!$mahasiswa) {
            return view('akademikmhs.blade.php')->with('error', 'Mahasiswa tidak ditemukan');
        }

        // Ambil NIM mahasiswa
        $nim = $mahasiswa->nim;

        // Ambil semester dari input request
        $semester = $request->input('semester');

        // Jika semester dipilih
        if ($semester) {
            // Ambil data IRS berdasarkan semester dan NIM mahasiswa
            $irsData = Irs::with(['kelas', 'kelas.mataKuliah'])
                          ->where('semester', $semester)
                          ->where('mahasiswa_nim', $nim)
                          ->get();

            // Kembalikan tampilan dengan data IRS yang ditemukan
            return view('akademikmhs.blade.php', compact('irsData'));
        }

        // Jika semester tidak dipilih, tampilkan halaman tanpa data IRS
        return view('akademikmhs.blade.php');
    }
}
