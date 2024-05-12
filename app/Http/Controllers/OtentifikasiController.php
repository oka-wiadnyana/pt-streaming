<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtentifikasiController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function attemptLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember_me)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/home');
        }

        return back()->withErrors([
            'username' => 'Akun tidak sesuai.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
