<?php

namespace App\Http\Controllers;


use App\Models\Jadwal_Kuliah;

use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class AdminController extends Controller
{
    public function halamandashboardadmin(){
        return view('Dashboard.Dashboard');
    }

    public function dbmhs(){
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id',$user->id)->first();


        return view('DashBMHS.DashBMHS', [
            'mahasiswa' => $mahasiswa,

        ]);
    }

    public function dbbakm(){
        return view("DashBBAKA.DashBBAKA");
    }

    public function dbdekan(){
        return view("DashBDEKAN.DashBDEKAN");
    }

    public function dbkaprodi(){
        return view('DashBKAPRODI.DashBKAPRODI');
    }

    public function dbpakm(){
        return view('DashBPAKA.DashBPAKA');
    }

    public function dbdosen(){
        return view('DashBDOSEN.DashBDOSEN');
    }


}
