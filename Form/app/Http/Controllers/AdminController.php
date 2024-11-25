<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class AdminController extends Controller
{
    public function halamandashboardadmin(){
        return view('Dashboard.Dashboard');
    }

    public function dbmhs(){
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        return view('DashBMHS.DashBMHS', ['mahasiswa' => $mahasiswa]);
    }

    public function dbbakm(){
        return view('Dashboard.Dashboard');
    }

    public function dbdekan(){
        return view('Dashboard.Dashboard');
    }

    public function dbkaprodi(){
        return view('DashBKAPRODI.DashBKAPRODI');
    }

    public function dbpakm(){
        return view('Dashboard.Dashboard');
    }
}
