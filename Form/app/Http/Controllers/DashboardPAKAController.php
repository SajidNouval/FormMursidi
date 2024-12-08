<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\irs;

class DashboardPAKAController extends Controller
{
    public function akademikpaka()
    {
        // Ambil data IRS yang diajukan
        $irs = irs::where('diajukan', 1)->with('kelas.mataKuliah')->get();

        // Kirim data ke view
        return view('AkademikPAKA.akademikpaka', compact('irs'));
    }
}
