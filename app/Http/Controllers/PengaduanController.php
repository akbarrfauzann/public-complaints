<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index(Request $request, Pengaduan $model)
    {
        $url = $request->fullUrl();
        $status = $request->status;

        if ($request->status && $request->status != 'all') {
            $model = $model->where('status', $request->status);
        }

        $datas = $model->get();
        $pending = Pengaduan::where('status', 'Pending')->count();
        $process = Pengaduan::where('status', 'Proses')->count();
        $success = Pengaduan::where('status', 'Selesai')->count();

        if ($request->pdf == true) {
            return $this->pdf($datas);
        }

        return view('masyarakat.pengaduan.index', [
            'url' => $url,
            'datas' => $datas,
            'pending' => $pending,
            'proses' => $process,
            'success' => $success
        ]);
    }

    public function list()
    {
        $datas = Pengaduan::get();
        return view('masyarakat.pengaduan.list', compact('datas'));
    }

    public function store(Request $request)
    {
        // return $request->file('foto')->store('images');
        $validate = $request->all();
        $validate = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required',
        ]);
          if ($request->file('foto')) {
            $validate['foto'] = $request->file('foto')->store('images');
          }
        Pengaduan::create($validate);
        return redirect()->route('pengaduan')->with('success', 'Pengaduan Berhasil!');
    }

     public function show($id_pengaduan)
    {
        $data = Pengaduan::where('id_pengaduan', $id_pengaduan)->get();
        return view('masyarakat.pengaduan.show', compact('data'));
    }

      public function destroy($id_pengaduan)
    {
        $datas = Pengaduan::findOrfail($id_pengaduan);
        if ($datas->foto) {
            Storage::delete($datas->foto);
        }
        $datas->delete();
        return redirect()->route('tanggapan');
    }

     public function cetak()
    {
        $data = Pengaduan::all();
    	$pdf = PDF::loadview('admin.tanggapan.cetak-pdf', compact('data'))->setOptions(['enable_php', true, 'dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->download('Pengaduan Masyarakat.pdf');
    }

    public function pdf($datas){
        $pdf = PDF::loadview('masyarakat.pengaduan.alldata',['datas'=>$datas])->setOptions(['enable_php', true, 'dpi' => 150, 'defaultFont' => 'sans-serif']);
    	return $pdf->download('Pengaduan Masyarakat.pdf');
    }

    public function panduan()
    {
        return view('masyarakat.pengaduan.panduan');
    }
}
