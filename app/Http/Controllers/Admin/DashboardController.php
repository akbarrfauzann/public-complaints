<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,Pengaduan $model)
    {
        $url = $request->fullUrl();
        $status = $request->status;

        if ($request->status && $request->status != 'all') {
            $model = $model->where('status', $request->status);
        }

        $datas = $model->get();
        $all = Pengaduan::count();
        $pending = Pengaduan::where('status', 'Pending')->count();
        $process = Pengaduan::where('status', 'Proses')->count();
        $success = Pengaduan::where('status', 'Selesai')->count();

        if ($request->pdf == true) {
            return $this->pdf($datas);
        }

        return view('admin.dashboard.index', [
            'url' => $url,
            'all' => $all,
            'datas' => $datas,
            'pending' => $pending,
            'proses' => $process,
            'success' => $success
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pdf($datas)
    {
        $pdf = PDF::loadview('masyarakat.pengaduan.alldata',['datas'=>$datas])->setOptions(['enable_php', true, 'dpi' => 150, 'defaultFont' => 'sans-serif']);
    	return $pdf->download('Pengaduan Masyarakat.pdf');
    }
}
