@extends('admin.layouts.main')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="pagetitle">
                <h1 style="color:green">Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" style="color:goldenrod">Home</a></li>
                        <li class="breadcrumb-item active" style="color:green">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-sm-3 mt-5">
                            <a href="{{ url()->current() . '?status=all' }}">
                                <div class="card info-card sales-card">
                                    <div class="card-body mt-3">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-megaphone" style="color:goldenrod"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h5 class="card-title" style="color:green">Jumlah Pengaduan</h5>
                                                <span class="text-success small pt-1 fw-bold">{{ $all }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-3 mt-5">
                            <a href="{{ url()->current() . '?status=pending' }}">
                                <div class="card info-card sales-card">
                                    <div class="card-body mt-3">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-shield-fill-exclamation" style="color:goldenrod"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h5 class="card-title" style="color:green">Belum Diproses</h5>
                                                <span class="text-success small pt-1 fw-bold">{{ $pending }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-3 mt-5">
                            <a href="{{ url()->current() . '?status=proses' }}">
                                <div class="card info-card sales-card">
                                    <div class="card-body mt-3">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-shuffle" style="color:goldenrod"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h5 class="card-title" style="color:green">Sedang Diproses</h5>
                                                <span class="text-success small pt-1 fw-bold">{{ $proses }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-3 mt-5">
                            <a href="{{ url()->current() . '?status=selesai' }}">
                                <div class="card info-card sales-card">
                                    <div class="card-body mt-3">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-shield-fill-check" style="color:goldenrod"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h5 class="card-title" style="color:green">Selesai</h5>
                                                <span class="text-success small pt-1 fw-bold">{{ $success }}</span>
                                            </div>
                                        </div>
                                    </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>




            {{-- TABLE --}}
            <div class="card">
                @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                @endif

                <div class="card-body m-3">
                    <a href="{{ request()->status ? $url . '&pdf=true' : '?pdf=true' }}" class="btn btn-warning">CETAK
                        PDF</a>
                    <h5 class="card-title" style="color: green">Dumas <span style="color:goldenrod"> Caringin</span></h5>


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
                                {{-- <th scope="col">Action</th> --}}
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
                                            <span
                                                class="badge bg-danger">{{ $item->status == 'pending' ? 'Belum Di Proses' : '' }}</span>
                                        @endif
                                        @if ($item->status == 'proses')
                                            <span
                                                class="badge bg-primary">{{ $item->status == 'proses' ? 'Proses' : '' }}</span>
                                        @endif
                                        @if ($item->status == 'selesai')
                                            <span
                                                class="badge bg-success">{{ $item->status == 'selesai' ? 'Selesai' : '' }}</span>
                                        @endif
                                    </td>

                                    {{-- <td>
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

                        @if ($item->status == 'selesai' && Auth::guard('admin')->user()->level == 'admin')
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
                          <button type="submit" class="dropdown-item">Delete</button>
                      </form>
                  </div>
                </div>
              </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('sweetalert::alert')
        </section>
    </main>
@endsection
