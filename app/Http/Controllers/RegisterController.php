<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('masyarakat.auth.register');
    }

     public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required|unique:masyarakats',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);
        // if ($request->file('image')) {
        //     $validate['image'] = $request->file('image')->store('customer-img');
        // }
        $validate['password']= Hash::make($request['password']);
        Masyarakat::create($validate);
        return redirect()->route('login');
    }
}
