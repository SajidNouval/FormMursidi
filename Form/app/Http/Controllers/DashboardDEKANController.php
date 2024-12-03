<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardDEKANController extends Controller
{
    public function akademikdekan(){
        return view('AkademikDekan.akademikdekan');
    }
}
