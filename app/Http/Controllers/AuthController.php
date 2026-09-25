<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectByRole();
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redirectByRole();
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function redirectByRole()
    {
        $user = Auth::user();

        // Bendahara dulu (lebih spesifik)
        if ($user->isBendahara()) {
            return redirect()->route('bendahara.dashboard');
        }

        return match ($user->role) {
            'rw'    => redirect()->route('rw.dashboard'),
            'rt'    => redirect()->route('rt.dashboard'),
            'warga' => redirect()->route('warga.dashboard'),
            default => redirect()->route('login'),
        };
    }
}