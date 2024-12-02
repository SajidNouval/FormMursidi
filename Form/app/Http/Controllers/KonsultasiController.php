<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi; // Import the Konsultasi model
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        // Fetch all konsultasi records
        $konsultasiData  = Konsultasi::with(['dosen', 'mahasiswa'])->get(); // Assuming you have relationships defined
        dd($konsultasiData);
        // Pass the data to the view
        return view('HerRegMHS.konsultasi', compact('konsultasiData'));
    }
}
