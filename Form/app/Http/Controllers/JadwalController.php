<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_Kuliah; // Pastikan Anda menggunakan model yang benar
use App\Models\Kelas; // Pastikan Anda menggunakan model yang benar
use App\Models\Mata_Kuliah; // Model untuk mata kuliah
use App\Models\Ruang_Kuliah;
use App\Models\Dosen;

class JadwalController extends Controller
{

//MATKUL------------------------------------------------
    // public function buatmatkul()
    // {
        
    //     // Ambil semua mata kuliah dari database
    //     $mataKuliah = Mata_Kuliah::all();
    //     $dosen = Dosen::all(); // Assuming you have a Dosen model



    //     // Tampilkan view dengan data mata kuliah
    //     return view('AkademikKAPRODI.matkulkaprodi', compact('mataKuliah','dosen'));
    // }
    public function storemk(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'kelas' => 'required',
            'tipe' => 'required',
            'pengampu1' => 'required', // Validasi untuk pengajar1
            'pengampu2' => 'nullable', // Validasi untuk pengajar2
            'pengampu3' => 'nullable', // Validasi untuk pengajar3
            'tahun_akademik' => 'required', // Validasi untuk tahun akademik
        ]);


        Mata_Kuliah::createmk($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    public function destroymk($id)
    {
        Mata_Kuliah::findOrFail($id)->delete();
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus');
    }

//JADWAL------------------------------------------------------
    public function buatjadwal()
    {
        // Ambil data mata kuliah dengan kode program studi '01'
    $mataKuliah = Mata_Kuliah::where('program_studi_kode_prodi', '01')->get();

    // Ambil semua jadwal dari database
    $jadwal = Jadwal_Kuliah::all();

    $ruangKuliah = Ruang_Kuliah::where('status', 'disetujui')
    ->where('program_studi_kode_prodi', '01')
    ->get();

    // Tampilkan view dengan data yang sudah difilter
    return view('AkademikKAPRODI.jadwalkaprodi', compact('mataKuliah', 'jadwal', 'ruangKuliah'));
    }

    public function storejadwal(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'mata_kuliah' => 'required',
        'hari' => 'required',
        'jam_mulai' => 'required|in:07:00,08:00,09:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,kosong',
        'jam_selesai' => 'required|in:08:00,09:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,kosong',
        'kelas' => 'required',
        'ruang_kuliah_kode_ruang' => 'required|exists:ruang_kuliah,kode_ruang',
    ]);

    //dd($request->all());

    // Cek apakah jadwal sudah ada untuk ruang yang sama pada hari dan waktu yang sama
    $jadwal = Jadwal_Kuliah::where('hari', $request->hari)
        ->where('ruang_kuliah_kode_ruang', $request->ruang_kuliah_kode_ruang)
        ->where(function ($query) use ($request) {
            $query->where('jam_mulai', '<', $request->jam_selesai) // Jadwal baru mulai sebelum jadwal yang ada selesai
                ->where('jam_selesai', '>', $request->jam_mulai); // Jadwal baru selesai setelah jadwal yang ada mulai
        })
        ->first();

    if ($jadwal) {
        return redirect()->back()->withErrors(['jadwal' => 'Jadwal sudah ada untuk ruang yang sama pada hari dan waktu yang sama.'])
                                 ->withInput();
    }

    // Simpan data jadwal ke database
    Jadwal_Kuliah::create([
        'mata_kuliah_kode_mk' => $request->mata_kuliah,
        'hari' => $request->hari,
        'ruang_kuliah_kode_ruang' => $request->ruang_kuliah_kode_ruang,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'kelas' => $request->kelas,
        'status' => 'diajukan', // Status default
    ]);

    Kelas::create([
        'kode_kelas' => $request->kelas,
        'mata_kuliah_kode_mk' => $request->mata_kuliah,
        'tahun_akademik' => $request->tahun_akademik,
        'kuota' => $request->kuota

    ]);

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Jadwal berhasil dibuat!');
}

    public function destroyjadwal($id)
    {
        // Find the jadwal by ID and delete it
        $jadwal = Jadwal_Kuliah::findOrFail($id);
        $jadwal->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Jadwal berhasil dihapus.');
    }
}