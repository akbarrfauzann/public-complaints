@extends('admin.layouts.main')

@section('content')
<main id="main" class="main">

<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="color:goldenrod">Data Pengaduan</h5>
@foreach ($data as $item)
    <h6 class="mt-2" style="font-weight: bold">NIK : {{ $item->nik}}</h6>
    <h6 class="mt-2" style="font-weight: bold">Nama Pelapor : {{ $item->nama}}</h6>
    <h6 style="font-weight: bold">Tanggal : {{ $item->tgl_pengaduan}}</h6>
    <h6 class="mt-2" style="font-weight: bold">Status : {{ $item->status}}</h6>
    {{--  <h6 class="mt-2" style="font-weight: bold">Nama yang menanggapi : {{ Auth::guard('admin')->user()->username }}</h6>  --}}
    {{-- <h6 class="mt-2" style="font-weight: bold">Isi Laporan : {{ $item->isi_laporan }}</h6> --}}
@endforeach
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="color: goldenrod">Pengaduan</h5>
          @foreach ($data as $item)
        <h6 style="font-weight: bold">{{ $item->isi_laporan }}</h6>
        @endforeach
      </div>
    </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="color:goldenrod">Tanggapan</h5>
          @foreach ($data as $item)
         <h6 style="font-weight: bold">{{ $item->tanggapan->tanggapan }}</h6>
          @endforeach
          </div>
        </div>
    </div>
</main>

@endsection
