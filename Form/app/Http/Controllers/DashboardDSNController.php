<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DashboardDSNController extends Controller
{
    public function akademikdsn(){
        $dosen = Dosen::where('user_id', 6)->first();
        return view('AkademikDOSEN.akademikdosen', ['dosen' => $dosen]);
    }

    public function konsultasidsn(){
        return view('DashBDOSEN.konsultasi');
    }

    public function konsulcomposedsn(){
        return view('DashBDOSEN.konsultasicompose');
    }

    public function konsulreaddsn(){
        return view('DashBDOSEN.konsultasiread');
    }

    public function profildsn(){
        $dosen = Dosen::where('user_id', 6)->first();
        return view('');
    }
}
