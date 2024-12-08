<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\irs;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class PakaController extends Controller
{
    public function index()
    {
        // Ambil data IRS yang diajukan
        $irs = irs::where('diajukan', 1)->with('kelas.mataKuliah')->get();

        // Kirim data ke view
        return view('AkademikPAKA.akademikpaka', compact('irs'));
    }

    public function setujui($id)
    {
        // Cari IRS berdasarkan ID
        $irs = irs::findOrFail($id);

        // Set status is_verified menjadi 1 (disetujui)
        $irs->is_verified = 1;
        $irs->diajukan = 0; // Set diajukan menjadi 0
        $irs->save();

        return redirect()->back()->with('success', 'IRS berhasil disetujui.');
    }

    public function tolak($id)
    {
        // Cari IRS berdasarkan ID
        $irs = irs::findOrFail($id);

        // Set status is_verified menjadi 0 (ditolak)
        $irs->is_verified = 0;
        $irs->diajukan = 0; // Set diajukan menjadi 0
        $irs->save();

        return redirect()->back()->with('success', 'IRS berhasil ditolak.');
    }
}
