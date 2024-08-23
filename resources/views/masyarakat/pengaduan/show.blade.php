@extends('masyarakat.layouts.template')

@section('content')
    <main id="main" class="main">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color:green">Data Pengaduan</h5>
                    @foreach ($data as $item)
                        {{--  <h6 class="mt-2" style="font-weight: bold">NIK : {{ $item->nik}}</h6>
        <h6 class="mt-2" style="font-weight: bold">Nama Pelapor : {{ $item->nama}}</h6>
        <h6 style="font-weight: bold">Tanggal : {{ $item->tgl_pengaduan}}</h6>
        <h6 class="mt-2" style="font-weight: bold">Status : {{ $item->status}}</h6>  --}}
                        <h6 class="mt-2" style="font-weight: bold">Nama yang menanggapi :
                            {{ Auth::guard('admin')->user()->nama_petugas }}</h6>
                        {{-- <h6 class="mt-2" style="font-weight: bold">Isi Laporan : {{ $item->isi_laporan }}</h6> --}}
                    @endforeach
                </div>
            </div>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="color:green">Pengaduan</h5>
                        @foreach ($data as $item)
                            {{ $item->isi_laporan }}
                            {{ $item->tgl_laporan }}
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="color:green">Tanggapan</h5>
                        @foreach ($data as $item)
                            {{ $item->tanggapan->tanggapan }}
                        @endforeach
                    </div>
                </div>
            </div>
    </main>
@endsection
