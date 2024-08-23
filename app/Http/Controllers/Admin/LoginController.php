<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($login)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Login Gagal, Coba Lagi');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request()->session()->invalidate();
        $request()->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
