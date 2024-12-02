<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal_Kuliah;

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
        $mahasiswa = Mahasiswa::where('user_id',$user->id)->first();
        return view('DashBMHS.DashBMHS', ['mahasiswa' => $mahasiswa]);
    }

    public function dbbakm(){
        return view("DashBBAKA.DashBBAKA");
    }

    public function dbdekan(){
        return view("DashBDEKAN.DashBDEKAN");
    }

    public function dbkaprodi()
    {
        $user = Auth::user();
        // Pastikan role 'kaprodi' di-filter jika ada kemungkinan user lain masuk
        $kaprodi = Dosen::where('user_id', $user->id)
            ->where('user_id', 3)
            ->first();
    
        return view('DashBKAPRODI.DashBKAPRODI', [
            'kaprodi' => $kaprodi
        ]);
    }

    public function dbpakm(){
    
        $user = Auth::user();
        // Pastikan role 'kaprodi' di-filter jika ada kemungkinan user lain masuk
        $kaprodi = Dosen::where('user_id', $user->id)
            ->where('user_id', 2)
            ->first();
    
        return view('DashBPAKA.DashBPAKA', [
            'kaprodi' => $kaprodi
        ]);
    }

    public function dbdosen(){
        $dosen = Dosen::where('user_id', 6)->first();
        return view('DashBDOSEN.DashBDOSEN', ['dosen' => $dosen]); // Kirim data dosen ke view
    }


}
