<?php

namespace App\Http\Controllers\Admin;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $datas = Petugas::get();
        return view('admin.petugas.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            // 'id_petugas' => 'required',
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);

        $validate['password']= Hash::make($request['password']);
        $validate['level'] = 'petugas';
        Petugas::create($validate);
        return redirect()->route('petugas.index')->with('success', 'Pengaduan Berhasil!');
    }

    public function edit()
    {
        $datas = Petugas::get();
        return view('admin.petugas.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validate = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);

        $validate = Petugas::findOrFail($id);
        $validate->update($input);
        return redirect()->route('petugas');
    }


    public function destroy($id)
    {
        $datas = Petugas::findOrFail($id);
        $datas->delete();
        return redirect('petugas');
    }
}
