<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('masyarakat.auth.login');
    }

     public function store(Request $request)
    {
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            return redirect()->route('pengaduan');
        } else {
            return back()->with('alert', 'Login Gagal, Coba Lagi');
        }
    }

       public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pengaduan.panduan');
    }
}
