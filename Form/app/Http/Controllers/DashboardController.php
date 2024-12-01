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
            'ruang_kuliah.kode_ruang'
        )
        ->get();

    // Kirim data ke view
    return view('AkademikMHS.akademikmhs', [
        'mahasiswa' => $mahasiswa,
        'irs' => $irs,
        'totalSKS' => $totalSKS,
        'jadwal_kuliah' => $jadwal_kuliah,
    ]);
}

    
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function akademikmhs(){
            $user = Auth::user();
            $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
            return view('AkademikMHS.akademikmhs', ['mahasiswa' => $mahasiswa]);
    }

    public function herregmhs(){
        return view('HerRegMHS.herregmhs');
    }

    public function kaprodidb(){
        return view('DashBKAPRODI.DashBKAPRODI');
    }

    public function profilmhs(){
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        return view('DashBMHS.profil', ['mahasiswa' => $mahasiswa]);
    }

}



 // $user = Auth::user();
        // $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        
        // // Mengambil jadwal kuliah yang terkait dengan mahasiswa
        // $jadwal_kuliah = Jadwal_Kuliah::where('mahasiswa_id', $mahasiswa->id)->get();
        // return view('AkademikMHS.akademikmhs',[
        //     'mahasiswa' =>$mahasiswa,
        //     'jadwal_kuliah'=>$jadwal_kuliah,
        // ]);