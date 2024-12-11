<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Mata_Kuliah;
use Illuminate\Http\Request;
use App\Models\Program_Studi;


class MataKuliahController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|string|unique:mata_kuliah',
            'nama_mk' => 'required|string',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'jenis' => 'required|string',
            'program_studi_kode_prodi' => 'required|string',
            'fakultas_kode_fakultas' => 'required|string',
            'dosen_nip' => 'nullable|string',
        ]);

        Mata_Kuliah::create($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    // Prodi
    // public function prodi()
    // {
    //      // Mengambil semua data dari tabel program_studi
    //      $programStudis = Program_Studi::all();
    //      $dosens = Dosen::all();
    //      $mataKuliah = Mata_Kuliah::all();
    //      $fakultas = Fakultas::all();
         
    
    //      // Mengirimkan data ke view
    //      return view('AkademikKAPRODI.matkulkaprodi', compact('programStudis','dosens','mataKuliah','fakultas'));
    // }

    public function index(){
         $programStudis = Program_Studi::all();
         $dosens = Dosen::all();
         $mataKuliah = Mata_Kuliah::all();
         $fakultas = Fakultas::all();
         
    
         // Mengirimkan data ke view
         return view('AkademikKAPRODI.matkulkaprodi', compact('programStudis','dosens','mataKuliah','fakultas'));
    }
    

    public function destroy($kode_mk)
    {
        // Temukan mata kuliah berdasarkan kode_mk
        $mataKuliah = Mata_Kuliah::where('kode_mk', $kode_mk)->first();

        // Jika mata kuliah tidak ditemukan, kembalikan error atau redirect
        if (!$mataKuliah) {
            return redirect()->route('mata_kuliah.index')->with('error', 'Mata Kuliah tidak ditemukan.');
        }

        // Hapus mata kuliah
        $mataKuliah->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }


    
    
}
