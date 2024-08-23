@extends('masyarakat.layouts.template')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: green">Pengaduan Masyarakat</h5>

                    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ Auth::user()->nik ?? '' }}" name="nik"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" value="{{ Auth::user()->nama ?? '' }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Isi Laporan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="isi_laporan" style="height: 100px"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Laporan</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_pengaduan" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">File Foto</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="foto" id="foto" type="file" id="formFile">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Kirim</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('sweetalert::alert')
        </section>
    </main>
