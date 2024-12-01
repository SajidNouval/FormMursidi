<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Jadwal_Kuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\irs;
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
    

}
}