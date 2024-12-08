<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Irs;

class PakaController extends Controller
{
    public function index()
{
    // Mengambil data IRS dengan kelas dan mata kuliah
    $irs = Irs::with(['kelas.mataKuliah', 'mahasiswa'])->get();

// Hapus duplikasi berdasarkan `kelas_id`
$irs = $irs->unique('kelas_id');


    return view('AkademikPAKA.akademikpaka', compact('irs'));
}


    public function approveIrs($id)
    {
        $irs = Irs::findOrFail($id);

        // Cek apakah kelas_id sudah ada dan is_verified = 1
        if (Irs::where('kelas_id', $irs->kelas_id)->where('is_verified', 1)->exists()) {
            return redirect()->back()->with('error', 'IRS sudah disetujui untuk kelas ini.');
        }

        $irs->is_verified = 1;
        $irs->save();

        return redirect()->back()->with('success', 'IRS berhasil disetujui.');
    }


    public function rejectIrs($id)
    {
        // Temukan IRS berdasarkan ID dan set status menjadi Ditolak
        $irs = Irs::findOrFail($id);
        $irs->is_verified = -1;
        $irs->save();

        return redirect()->back()->with('success', 'IRS berhasil ditolak.');
    }
}
