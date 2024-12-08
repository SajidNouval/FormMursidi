<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_Kuliah; // Pastikan Anda menggunakan model yang benar
use App\Models\Mata_Kuliah; // Model untuk mata kuliah
use App\Models\Ruang_Kuliah;
use App\Models\Dosen;

class JadwalController extends Controller
{

//MATKUL------------------------------------------------
    public function buatmatkul()
    {
        
        // Ambil semua mata kuliah dari database
        $mataKuliah = Mata_Kuliah::all();
        $dosen = Dosen::all(); // Assuming you have a Dosen model



        // Tampilkan view dengan data mata kuliah
        return view('AkademikKAPRODI.matkulkaprodi', compact('mataKuliah','dosen'));
    }
    public function storemk(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required|integer',
            'kelas' => 'required',
            'tipe' => 'required',
            'pengajar1' => 'required', // Validasi untuk pengajar1
            'pengajar2' => 'required', // Validasi untuk pengajar2
            'pengajar3' => 'required', // Validasi untuk pengajar3
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
        // Ambil semua mata kuliah dari database
        $mataKuliah = Mata_Kuliah::all();

        // Ambil semua jadwal dari database
        $jadwal = Jadwal_Kuliah::all(); // Fetch the jadwal data

        $ruangKuliah = Ruang_Kuliah::where('status', 'disetujui')->get(); // Ambil ruang kuliah yang disetujui
        // Tampilkan view dengan data mata kuliah
        return view('AkademikKAPRODI.jadwalkaprodi',  compact('mataKuliah', 'jadwal','ruangKuliah'));
    }

    public function storejadwal(Request $request)
    {
        // Validasi input
        $request->validate([
            'mata_kuliah' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'kelas' => 'required', // Validasi kelas
            'ruang_kuliah_kode_ruang' => 'required', // Validasi ruang
        ]);

        // Cek apakah jadwal sudah ada untuk ruang yang sama pada hari dan waktu yang sama
        $jadwal = Jadwal_Kuliah::where('hari', $request->hari)
            ->where('ruang_kuliah_kode_ruang', $request->ruang_kuliah_kode_ruang)
            ->where('jam_mulai', '<=', $request->jam_mulai)
            ->where('jam_selesai', '>=', $request->jam_selesai)
            ->first();

        if ($jadwal) {
            return redirect()->back()->with('error', 'Jadwal sudah ada untuk ruang yang sama pada hari dan waktu yang sama');
        }

        // Cek apakah jadwal sudah ada untuk mata kuliah yang sama pada hari, kelas, dan ruang yang sama
        $jadwal = Jadwal_Kuliah::where('mata_kuliah_kode_mk', $request->mata_kuliah)
            ->where('hari', $request->hari)
            ->where('kelas', $request->kelas)
            ->where('ruang_kuliah_kode_ruang', $request->ruang_kuliah_kode_ruang)
            ->where('jam_mulai', '<=', $request->jam_mulai)
            ->where('jam_selesai', '>=', $request->jam_selesai)
            ->first();

        if ($jadwal) {
            return redirect()->back()->with('error', 'Jadwal sudah ada untuk mata kuliah ini pada hari, kelas, dan ruang yang sama');
        }

        // Simpan data jadwal ke database
        Jadwal_Kuliah::create([
            'mata_kuliah_kode_mk' => $request->mata_kuliah,
            'hari' => $request->hari,
            'ruang_kuliah_kode_ruang' => $request->ruang_kuliah_kode_ruang,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'kelas' => $request->kelas, // Simpan kelas
            'status' => 'diajukan', // Status default
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