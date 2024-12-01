<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jadwal_Kuliah;
use App\Models\Irs; // Perbaikan nama model IRS (sesuai penamaan Anda)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function akademikmhs()
{
    // Ambil user yang sedang login
    $user = Auth::user();
    $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
    
    // Ambil IRS mahasiswa berdasarkan NIM
    $irs = DB::table('irs')
        ->join('mata_kuliah', 'irs.mata_kuliah_kode_mk', '=', 'mata_kuliah.kode_mk')
        ->select('irs.*', 'mata_kuliah.nama_mk', 'mata_kuliah.sks')
        ->where('irs.mahasiswa_nim', $mahasiswa->nim)
        ->get();

    // Hitung total SKS yang diambil
    $totalSKS = $irs->sum('sks');
    
    // Ambil jadwal kuliah dengan DB::table()
    $jadwal_kuliah = DB::table('jadwal_kuliah')
        ->join('mata_kuliah', 'jadwal_kuliah.mata_kuliah_kode_mk', '=', 'mata_kuliah.kode_mk')
        ->join('ruang_kuliah', 'jadwal_kuliah.ruang_kuliah_kode_ruang', '=', 'ruang_kuliah.kode_ruang')
        ->select(
            'jadwal_kuliah.hari',
            'jadwal_kuliah.jam_mulai',
            'jadwal_kuliah.jam_selesai',
            'jadwal_kuliah.mata_kuliah_kode_mk',
            'mata_kuliah.nama_mk',
            'ruang_kuliah.kode_ruang',
            'mata_kuliah.sks',
            'mata_kuliah.semester',
        )
        ->get();

        // Pastikan $mahasiswa tidak null sebelum mengambil data terkait
        if ($mahasiswa) {
            // Ambil data IRS terkait mahasiswa
            $irs = Irs::where('mahasiswa_nim', $mahasiswa->nim)->get();
            
            // Hitung total SKS
            $totalSKS = $irs->sum('sks');

            // // Ambil jadwal kuliah terkait mahasiswa (opsional)
            // $jadwal_kuliah = Jadwal_Kuliah::where('mahasiswa_nim', $mahasiswa->id)->get();
        } else {
            // Default jika mahasiswa tidak ditemukan
            $irs = collect(); // Koleksi kosong
            $totalSKS = 0;
            $jadwal_kuliah = collect(); // Koleksi kosong
        }

        return view('AkademikMHS.akademikmhs', [
            'mahasiswa' => $mahasiswa,
            'irs' => $irs,
            'totalSKS' => $totalSKS,
            'jadwal_kuliah' => $jadwal_kuliah,
        ]);
    }

    public function herregmhs()
    {
        $user = Auth::user();

        // Mengambil data mahasiswa yang sedang login
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        return view('HerRegMHS.herregmhs', ['mahasiswa' => $mahasiswa]); // Mengirim data mahasiswa ke view
    }

    public function profilmhs()
    {
        $user = Auth::user();
        
        // Ambil data mahasiswa berdasarkan user yang login
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        
        return view('DashBMHS.profil', ['mahasiswa' => $mahasiswa]);
    }
}
