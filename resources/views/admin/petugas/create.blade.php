@extends('admin.layouts.main')

@section('content')
<main id="main" class="main">
  <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color:green">Tambah Petugas</h5>

              <form class="row g-3" action="{{ route('petugas.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="col-12">
                  <label for="nama_petugas" class="form-label">Nama Petugas</label>
                  <input type="text" class="form-control" name="nama_petugas" class="form-control" placeholder="Masukan Nama Petugas">
                </div>

                <div class="col-12">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" class="form-control" placeholder="Masukan Username">
                </div>

                <div class="col-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" class="form-control" placeholder="Masukan Password">
                </div>

                <div class="col-12">
                  <label for="telp" class="form-label">No Telepon</label>
                  <input type="number" class="form-control" name="telp" class="form-control" placeholder="Masukan No Telepon">
                </div>

                <div class="col-12">
                <button type="submit" class="btn btn-success">Kirim</button>
                <a href="{{route('petugas.index')}}" class="btn btn-danger">Kembali</a>
                </div>
              </form>
            </div>
          </div>
          @include('sweetalert::alert')
          </section>
</main>
@endsection
