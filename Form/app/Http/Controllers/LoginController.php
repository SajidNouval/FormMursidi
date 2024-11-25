<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(){
        return view('Login.Login');
    }

    public function postlogin(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ], [
        'email.required' => 'Email Wajib Diisi',
        'password.required' => 'Password Wajib Diisi'
    ]);

    $infologin = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($infologin)) {
        $user = Auth::user();

        // Ambil role pengguna sebagai string
        $role = $user->role;

        // Redirect sesuai dengan role
        if ($role === 'admin') {
            return redirect('admin');
        } elseif ($role === 'mahasiswa') {
            return redirect('sakura/mhsdb');
        } elseif ($role === 'kaprodi') {
            return redirect('sakura/kaprodidb');
        } elseif ($role === 'dekan') {
            return redirect('sakura/dekandb');
        } elseif ($role === 'bakademik') {
            return redirect('sakura/bakmdb');
        } elseif ($role === 'pakademik') {
            return redirect('sakura/pakmdb');
        }
    }

    return redirect('')->withErrors('Username dan Password yang dimasukkan tidak sesuai!')->withInput();
}
    public function logout(){ 
        Auth::logout();
        return redirect('');
    }

    public function register(){ 
        Auth::register();
        return redirect('/register');
    }

    public function simpanregister(Request $request)
{
    // Validasi data input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
        'roles' => 'required|array|min:1', // Setidaknya 1 role harus dipilih
    ]);

    // Menggabungkan role menjadi string
    $roles = implode(',', $request->roles);

    // Simpan data ke dalam tabel `users`
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $roles,
        'remember_token' => Str::random(60),
    ]);

    return redirect('/')->with('success', 'Pendaftaran berhasil, silakan login.');
}

/*public function simpanregister(Request $request){
    // dd($request->all());
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'admin', 'mahasiswa', 'bakademik', 'kaprodi', 'dekan', 'pakademik',
        'remember_token' => Str::random(60),
    ]);
    return redirect('/')->with('success', 'Pendaftaran berhasil, silakan login.');
}
*/

    public function forgotpw(){ 
        Auth::register();
        return redirect('/forgotpw');
    }
}
