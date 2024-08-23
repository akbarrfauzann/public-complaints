<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function index()
    {
        $datas = Pengaduan::get();
        return view('admin.tanggapan.index', compact('datas'));
    }

    public function create($id_pengaduan)
    {
        $item = Pengaduan::findOrFail($id_pengaduan);
        return view('admin.tanggapan.tanggapi', compact('item'));
    }

    public function store(Request $request, $id_pengaduan)
    {
        $validate = $request->all();
        $validate = $request->validate([
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
        ]);

        $validate['id_petugas'] = Auth::guard('admin')->user()->id;
        $validate['id_pengaduan'] = $request->id_pengaduan;
        Tanggapan::create($validate);

        $data = Pengaduan::findOrFail($id_pengaduan);
        $pengaduan['status'] = 'selesai';
        $data->update($pengaduan);

        return redirect()->route('tanggapan')->with('success', 'Berhasil Menanggapi');
    }

    public function show($id_pengaduan)
    {
        $data = Pengaduan::with('tanggapan')->where('id_pengaduan', $id_pengaduan)->get();
        return view('admin.tanggapan.show', compact('data'));
    }

    public function update($id)
    {
        $data = Pengaduan::findOrFail($id);
        if ($data->status == 'pending') {
            $status = 'proses';
        } else {
            $status = 'proses';
        }

        $data = Pengaduan::where('id_pengaduan', $id)->update(['status' => $status]);
        return redirect()->route('tanggapan');
    }

    public function destroy($id)
{
    Pengaduan::find($id)->delete();
    return redirect()->route('tanggapan')
                    ->with('success','Tanggapan deleted successfully');
}

    public function cetak_pdf($id_pengaduan)
    {
    	$data = Pengaduan::with('tanggapan')->where('id_pengaduan', $id_pengaduan)->get();
    	$pdf = PDF::loadview('admin.tanggapan.cetak-pdf', compact('data'))->setOptions(['enable_php', true, 'dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->download('Pengaduan Masyarakat.pdf');
    }

     public function cetakForm()
     {
        return view('admin.tanggapan.cetak-form');
     }

       public function cetakPDFPertanggal($tglawal, $tglakhir)
     {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakPertanggal = Pengaduan::with('tanggapan')->whereBetween('tgl_pengaduan', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadview('admin.tanggapan.cetak-pertanggal', compact('cetakPertanggal'))->setOptions(['enable_php', true, 'dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->download('Pengaduan Masyarakat.pdf');
     }
}
