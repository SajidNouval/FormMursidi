<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Irs;

class PakaController extends Controller
{
    public function index()
{
    $irs = Irs::with(['kelas.mataKuliah', 'mahasiswa'])
        ->get()
        ->groupBy('mahasiswa_nim'); // Mengelompokkan berdasarkan NIM mahasiswa
    

    return view('AkademikPAKA.akademikpaka', compact('irs'));
}
public function approveIrs($id)
{
    $irs = Irs::findOrFail($id);
    Irs::where('mahasiswa_nim', $irs->mahasiswa_nim)
        ->update(['is_verified' => 1]);

    return redirect()->back()->with('success', 'IRS mahasiswa berhasil disetujui.');
}

public function rejectIrs($id)
{
    $irs = Irs::findOrFail($id);
    Irs::where('mahasiswa_nim', $irs->mahasiswa_nim)
        ->update(['is_verified' => -1]);

    return redirect()->back()->with('success', 'IRS mahasiswa berhasil ditolak.');
}

}
