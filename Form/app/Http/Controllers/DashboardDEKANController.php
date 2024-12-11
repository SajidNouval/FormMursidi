<?php

namespace App\Http\Controllers;

use App\Models\Ruang_Kuliah;
use App\Models\Jadwal_Kuliah;
use App\Models\Program_Studi;
use Illuminate\Http\Request;

class DashboardDEKANController extends Controller
{
    public function akademikdekan(Request $request)
    {
        $prodiList = Program_Studi::all();

        $query = Ruang_Kuliah::query();
        if ($request->has('prodi') && $request->prodi) {
            $query->where('program_studi_kode_prodi', $request->prodi);
        }

        $ruang_kuliah = $query->get();

        return view('AkademikDekan.akademikdekan', compact('ruang_kuliah', 'prodiList'));
    }

    public function jadwaldekan()
    {
        // Ambil semua jadwal kuliah
        $jadwal_kuliah = Jadwal_Kuliah::join('mata_kuliah', 'mata_kuliah.kode_mk', 'jadwal_kuliah.mata_kuliah_kode_mk')->get();
    
        // Hitung jumlah status jadwal
        $diajukan = $jadwal_kuliah->where('status', 'diajukan')->count();
        $disetujui = $jadwal_kuliah->where('status', 'disetujui')->count();
        $ditolak = $jadwal_kuliah->where('status', 'ditolak')->count();
    
        return view('JadwalDEKAN.jadwaldekan', compact('jadwal_kuliah', 'diajukan', 'disetujui', 'ditolak'));
    }
    
    // Mengubah status semua jadwal menjadi "disetujui"
    public function setujuiSemuaJadwal(Request $request)
    {
        // Ambil semua jadwal yang statusnya 'diajukan'
        $jadwalDiajukan = Jadwal_Kuliah::where('status', 'diajukan')->get();
    
        // Update status semua jadwal menjadi 'disetujui'
        foreach ($jadwalDiajukan as $jadwal) {
            $jadwal->status = 'disetujui';
            $jadwal->save();
        }
    
        return redirect()->route('dekan.jadwal.index')->with('success', 'Semua jadwal telah disetujui.');
    }
    
    // Mengubah status ruang menjadi "ditolak"
    public function tolak($kode_ruang)
    {
        $ruang = Ruang_Kuliah::findOrFail($kode_ruang);
        $ruang->status = 'ditolak';
        $ruang->save();

        return redirect()->route('dekan.ruang.index')->with('success', 'Ruang telah ditolak.');
    }

    // Mengubah status semua ruang dalam prodi menjadi "disetujui"
    public function setujuiSemua(Request $request)
    {
        $prodi = $request->input('prodi');
    
        if (!$prodi) {
            return redirect()->back()->with('error', 'Pilih prodi terlebih dahulu.');
        }
    
        // Ambil semua ruang dengan status 'diajukan' untuk prodi tertentu
        $ruangDiajukan = Ruang_Kuliah::where('program_studi_kode_prodi', $prodi)
                                     ->where('status', 'diajukan')
                                     ->get();
    
        foreach ($ruangDiajukan as $ruang) {
            $ruang->status = 'disetujui';
            $ruang->save();
        }
    
        return redirect()->back()->with('success', 'Semua ruang untuk prodi ' . $prodi . ' telah disetujui.');
    }
    

    // Mengubah status jadwal menjadi "disetujui"
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
