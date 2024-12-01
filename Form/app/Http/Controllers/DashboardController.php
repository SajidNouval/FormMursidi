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
        
        // Ambil data mahasiswa berdasarkan user yang login
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        // Pastikan $mahasiswa tidak null sebelum mengambil data terkait
        if ($mahasiswa) {
            // Ambil data IRS terkait mahasiswa
            $irs = Irs::where('mahasiswa_id', $mahasiswa->id)->get();
            
            // Hitung total SKS
            $totalSKS = $irs->sum('sks');

            // Ambil jadwal kuliah terkait mahasiswa (opsional)
            $jadwal_kuliah = Jadwal_Kuliah::where('mahasiswa_id', $mahasiswa->id)->get();
        } else {
            // Default jika mahasiswa tidak ditemukan
            $irs = collect(); // Koleksi kosong
            $totalSKS = 0;
            $jadwal_kuliah = collect(); // Koleksi kosong
        }

        // Kirim data ke view
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

    public function kaprodidb()
    {
        return view('DashBKAPRODI.DashBKAPRODI');
    }

    public function profilmhs()
    {
        $user = Auth::user();
        
        // Ambil data mahasiswa berdasarkan user yang login
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        
        return view('DashBMHS.profil', ['mahasiswa' => $mahasiswa]);
    }
}
