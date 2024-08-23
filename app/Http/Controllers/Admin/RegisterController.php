<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.auth.register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required|unique:petugas',
            'password' => 'required',
            'telp' => 'required',
        ]);

        $validate['password']= Hash::make($request['password']);
        $validate['level'] = 'admin';
        Petugas::create($validate);
        return redirect()->route('admin.login');
    }
}
