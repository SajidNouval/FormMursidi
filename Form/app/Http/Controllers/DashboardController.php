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


    public function herregmhs(){
        return view('HerRegMHS.herregmhs');
    }

    public function kaprodidb(){
        return view('DashBKAPRODI.DashBKAPRODI');
    }
}
