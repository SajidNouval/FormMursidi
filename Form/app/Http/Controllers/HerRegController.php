<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HerRegController extends Controller
{
    public function konsultasimhs(){
        return view('HerRegMHS.konsultasi');
    }

    public function konsulcompose(){
        return view('HerRegMHS.konsultasicompose');
    }
}
