<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPWController extends Controller
{
    public function halamanforgotpw(){
        return view('Login.ForgotPW');
    }
}
