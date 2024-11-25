<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function akademikmhs(){
        return view('AkademikMHS.akademikmhs');
    }

    public function kaprodidb(){
        return view('DashBKAPRODI.DashBKAPRODI');
    }
}
