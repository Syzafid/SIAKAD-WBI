<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('login'); // pastikan file login.blade.php ada
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            $user = Auth::user();
            if ($user->role === 'mahasiswa') {
                return redirect()->route('dashboard.index');
            } elseif ($user->role === 'dosen') {
                return redirect()->route('dosen.dashboard'); // nanti bikin juga
            } else {
                Auth::logout();
                return redirect('/')->withErrors('Role tidak dikenali!');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
