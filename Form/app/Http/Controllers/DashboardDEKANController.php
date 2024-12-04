<?php

namespace App\Http\Controllers;
use App\Models\Ruang_Kuliah;
use App\Models\Jadwal_Kuliah;

use Illuminate\Http\Request;

class DashboardDEKANController extends Controller
{

    public function akademikdekan()
    {
        $ruang_kuliah = Ruang_Kuliah::all();
        return view('AkademikDekan.akademikdekan', compact('ruang_kuliah'));
    }
    public function jadwaldekan()
    {
        $jadwal_kuliah = Jadwal_Kuliah::all();
        return view('JadwalDEKAN.jadwaldekan', compact('jadwal_kuliah'));
    }

    // Mengubah status menjadi "disetujui"
    public function setujui($kode_ruang)
    {
        $ruang = Ruang_Kuliah::findOrFail($kode_ruang);
        $ruang->status = 'disetujui';
        $ruang->save();

        return redirect()->route('dekan.ruang.index')->with('success', 'Ruang telah disetujui.');
    }

    // Mengubah status menjadi "ditolak"
    public function tolak($kode_ruang)
    {
        $ruang = Ruang_Kuliah::findOrFail($kode_ruang);
        $ruang->status = 'ditolak';
        $ruang->save();

        return redirect()->route('dekan.ruang.index')->with('success', 'Ruang telah ditolak.');
    }
}
