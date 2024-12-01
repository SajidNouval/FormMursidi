<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function akademikmhs(){
            $user = Auth::user();
            $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
            return view('AkademikMHS.akademikmhs', ['mahasiswa' => $mahasiswa]);
    }

    public function herregmhs()
    {
        $user = Auth::user();
        // Mengambil data mahasiswa yang sedang login
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        return view('HerRegMHS.herregmhs',  ['mahasiswa' => $mahasiswa]); // Mengirim data mahasiswa ke view
    }

    public function kaprodidb(){
        return view('DashBKAPRODI.DashBKAPRODI');
    }

    public function profilmhs(){
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        return view('DashBMHS.profil', ['mahasiswa' => $mahasiswa]);
    }

}
