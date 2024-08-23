@extends('admin.layouts.main')

@section('content')
<main id="main" class="main">
  <div class="col-12">
      <div class="card recent-sales overflow-auto">
        <div class="card-body mt-3">
            {{--  @if(Auth::guard('admin')->user()->level == 'admin')
          <a href="{{ route('tanggapan.cetakpdf') }}" class="btn btn-warning" target="_blank">CETAK PDF</a>
          <a href="{{ route('tanggapan.cetak') }}" class="btn btn-info" target="_blank">CETAK PDF TANGGAL</a>
          @endif  --}}
          <h5 class="card-title" style="color:green">Pengaduan <span style="color:goldenrod">Masyarakat</span></h5>

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                  <tr>
                      <th scope="col">No</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama Pelapor</th>
                <th scope="col">Isi Laporan</th>
                <th scope="col">Tanggal Pengaduan</th>
                <th scope="col">Foto</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $item)

              <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $item->nik }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->isi_laporan }}</td>
                  <td>{{ $item->tgl_pengaduan }}</td>

                  <td>
                    @if ($item->foto)
                    <img style="width:150px; height:100px; ofervlow:hidden;"
                        src="{{ asset('storage/' . $item->foto) }}" alt=" ">
                    @else
                    <img style="width:50px; height:50px; ofervlow:hidden;"
                    src="{{ asset('img/ppnull.jpg') }}" alt="">
                    @endif
                 </td>

                  <td>
                    @if ($item->status == 'pending')
                    <span class="badge bg-danger">{{ ($item->status == 'pending') ? 'Belum Di Proses' : ''  }}</span>
                    @endif
                    @if ($item->status == 'proses')
                    <span class="badge bg-primary">{{ ($item->status == 'proses') ? 'Proses' : ''  }}</span>
                    @endif
                    @if ($item->status == 'selesai')
                    <span class="badge bg-success">{{ ($item->status == 'selesai') ? 'Selesai' : ''  }}</span>
                    @endif
                  </td>

                 <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Action</button>
                  <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                      data-bs-toggle="dropdown" aria-expanded="false">
                  </button>
                  <div class="dropdown-menu" role="menu" style="">

                        @if ($item->status == 'proses')
                          <a class="dropdown-item" href="{{ route('tanggapan.create', $item->id_pengaduan) }}">Tanggapi</a>
                        @endif

                        @if ($item->status == 'selesai')
                        <a class="dropdown-item" href="{{ route('tanggapan.show', $item->id_pengaduan) }}">Show</a>
                        @endif

                        @if ($item->status == 'selesai'  && Auth::guard('admin')->user()->level == 'admin')
                        <a class="dropdown-item" href="{{ route('tanggapan.pdf', $item->id_pengaduan) }}">Cetak Pdf</a>
                        @endif

                        @if ($item->status == 'pending')
                          <form action="{{ route('pengaduan.status', $item->id_pengaduan) }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Verifikasi</button>
                          </form>
                        @endif

                      <form action="{{ route('pengaduan.destroy', $item->id_pengaduan) }}">
                          @csrf
                          @method('delete')
                          <button type="submit" onclick="return confirm('Apakah Anda Yakin?')" class="dropdown-item">Delete</button>
                      </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table></div>
</div>
</div>
@include('sweetalert::alert')
</main>
@endsection
