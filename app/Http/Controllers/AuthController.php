<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Cek jika user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Login berhasil
            Auth::login($user);

            // Redirect ke dashboard
            return redirect()->route('dashboard.index');
        }

        // Jika gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout()
{
    // Menghapus semua sesi
    Session::flush();

    // Logout pengguna
    Auth::logout();

    // Redirect ke halaman utama atau halaman login
    return redirect('/login');
}
}