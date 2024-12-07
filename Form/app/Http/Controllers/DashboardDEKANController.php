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
        $jadwal_kuliah = Jadwal_Kuliah::join('mata_kuliah', 'mata_kuliah.kode_mk', 'jadwal_kuliah.mata_kuliah_kode_mk')->get();
        $diajukan = $jadwal_kuliah->where('status', 'diajukan')->count();
        $disetujui = $jadwal_kuliah->where('status', 'disetujui')->count();
        $ditolak = $jadwal_kuliah->where('status', 'ditolak')->count();
    
        return view('JadwalDEKAN.jadwaldekan', compact('jadwal_kuliah', 'diajukan', 'disetujui', 'ditolak'));
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

    public function setujuiJadwal($id)
    {
        $jadwal = Jadwal_Kuliah::findOrFail($id);
        $jadwal->status = 'disetujui';
        $jadwal->save();

        return redirect()->route('dekan.jadwal.index')->with('success', 'Jadwal telah disetujui.');
    }

        // Mengubah status jadwal menjadi "ditolak"
        public function tolakJadwal($id)
        {
            $jadwal = Jadwal_Kuliah::findOrFail($id);
            $jadwal->status = 'ditolak';
            $jadwal->save();
    
            return redirect()->route('dekan.jadwal.index')->with('error', 'Jadwal telah ditolak.');
        }

        
}
