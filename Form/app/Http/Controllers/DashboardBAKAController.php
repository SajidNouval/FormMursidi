<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang_Kuliah;
use App\Models\Program_Studi;
use App\Models\Baka;

use Illuminate\Support\Facades\Auth;

class DashboardBAKAController extends Controller
{
    public function akademikbaka(){
        $ruangan = Ruang_Kuliah::join('program_studi', 'program_studi.kode_prodi', 'ruang_kuliah.program_studi_kode_prodi')
        ->join('fakultas', 'fakultas.kode_fakultas', 'ruang_kuliah.fakultas_kode_fakultas')
        ->get();

        $programStudi = Program_Studi::all(); // Ambil data program studi

        return view('AkademikBAKA.akademikbaka', compact('ruangan','programStudi'));
        
    }

    // Menyimpan data ruangan baru
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'kode_ruang' => 'required|string|max:10',
            'kapasitas' => 'required|integer',
            'program_studi_kode_prodi' => 'required|string|max:10', // Pastikan program_studi_kode_prodi divalidasi
        ]);

        $user = Auth::user();
        $fakultas = Baka::where('user_id', $user->id)->first()->fakultas_kode_fakultas;
        error_log($fakultas);
    
// Simpan data ke database, akan gagal jika constraint dilanggar
    try {
        Ruang_Kuliah::create([
            'kode_ruang' => $validatedData['kode_ruang'],
            'kapasitas' => $validatedData['kapasitas'],
            'program_studi_kode_prodi' => $validatedData['program_studi_kode_prodi'],
            'fakultas_kode_fakultas' => $fakultas,
            'status' => 'diajukan',
        ]);

        return redirect()->back()->with('success', 'Ruangan berhasil ditambahkan.');

    } catch (\Illuminate\Database\QueryException $e) {
        // Tangani error karena pelanggaran constraint unik
        return redirect()->back()->withErrors([
            'kode_ruang' => 'Ruangan dengan kode ini sudah digunakan oleh prodi lain.',
        ]);
    }
    }
    
    // Menghapus ruangan
    public function destroy($kode_ruang)
    {
        $ruangan = Ruang_Kuliah::findOrFail($kode_ruang);
        $ruangan->delete();

        return redirect()->back()->with('success', 'Ruangan berhasil dihapus.');
    }
}

