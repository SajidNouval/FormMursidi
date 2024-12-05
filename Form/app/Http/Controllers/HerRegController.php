<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;


class HerRegController extends Controller
{
    public function konsultasimhs(){
        return view('HerRegMHS.konsultasi');
    }

    public function konsulcompose(){
        return view('HerRegMHS.konsultasicompose');
    }

    public function konsulread(){
        return view('HerRegMHS.konsultasiread');
    }

    public function updateStatus(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:aktif,cuti',
        ]);

        // Retrieve the mahasiswa record that matches the logged-in user's ID
        $mahasiswa = Mahasiswa::where('user_id', auth()->id())->first();

        if ($mahasiswa) {
            // Update the role of the mahasiswa
            $mahasiswa->role = $request->status; 
            $mahasiswa->save(); // Save the changes to the database

            // Redirect to the herregmhs route with a success message
            return redirect()->route('herregmhs')->with('success', 'Status berhasil diperbarui menjadi ' . $request->status);
        }

        // If the mahasiswa record is not found, redirect with an error message
        return redirect()->route('herregmhs')->with('error', 'Mahasiswa tidak ditemukan.');
    }
}
