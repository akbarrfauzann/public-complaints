@extends('admin.layouts.main')

@section('content')
<main id="main" class="main">

  <section class="section">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Petugas</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="{{ route('petugas.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nama Petugas</label>
                  <input type="text" class="form-control" name="nama_petugas" class="form-control" placeholder="Edit Nama Petugas">
                </div>

                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" class="form-control" placeholder="Edit Username">
                </div>

                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" class="form-control" placeholder="Edit Password">
                </div>

                <div class="col-12">
                  <label for="inputAddress" class="form-label">No Telepon</label>
                  <input type="number" class="form-control" name="telp" class="form-control" placeholder="Edit No Telepon">
                </div>

                <div class="text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{route('petugas.index')}}" class="btn btn-danger">Kembali</a>
                </div>
              </form><!-- Vertical Form -->
            </div>
          </div>
          </section>
</main>
@endsection
