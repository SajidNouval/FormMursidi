<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mata_Kuliah;
use Illuminate\Support\Facades\Auth;

class DashboardKPRController extends Controller
{
    public function akademikkpr(){
        $user = Auth::user();
        $mataKuliah = Mata_Kuliah::where('kode_mk', $user->id)->get();
        return view('AkademikKAPRODI.akademikkaprodi', compact('mataKuliah'));
        
    }


    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'kelas' => 'required',
            'tipe' => 'required',
            'dosen_pengampu' => 'required',
        ]);

        Mata_Kuliah::create($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Mata_Kuliah::findOrFail($id)->delete();
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus');
    }
}
