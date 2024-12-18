<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\irs;
use App\Models\Mahasiswa;

class DashboardPAKAController extends Controller
{
    public function akademikpaka()
    {
        // Ambil data IRS yang diajukan
        $irs = irs::where('diajukan', 1)->with('kelas.mataKuliah')->get();

        // Kirim data ke view
        return view('AkademikPAKA.akademikpaka', compact('irs'));
    }

    public function rekappaka()
    {
        // Ambil data mahasiswa
        $mahasiswa = Mahasiswa::all();

        // Ambil data IRS untuk semester aktif
        $semesterAktif = '2024/2025'; // Contoh nilai, sesuaikan dengan data sebenarnya
        $irs = Irs::where('tahun_akademik', $semesterAktif)->get();

        return view('RekapPAKA.rekappaka', compact('mahasiswa', 'irs'));
    }
}
