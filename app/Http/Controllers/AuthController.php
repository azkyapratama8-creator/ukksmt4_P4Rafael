<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 🔐 validasi input dulu (biar lebih aman & cepat error detect)
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 🔑 proses login
        if (Auth::attempt($credentials)) {

            // 🔄 regenerate session (security)
            $request->session()->regenerate();

            $user = Auth::user();

            // 🚦 redirect berdasarkan role
            return match ($user->role) {
                'admin'   => redirect('/admin/dashboard'),
                'petugas' => redirect('/petugas/dashboard'),
                default   => redirect('/anggota/dashboard'),
            };
        }

        // ❌ login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // 🧹 bersihkan session biar aman
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}