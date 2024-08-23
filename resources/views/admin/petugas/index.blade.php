@extends('admin.layouts.main')

@section('content')
<main id="main" class="main">
    <div class="pull-right mb-3">
        <a class="btn btn-success" href="{{ route('petugas.create')}}"> Create</a>
    </div>
  <div class="col-12">
      <div class="card recent-sales overflow-auto">
        <div class="card-body">
          <h5 class="card-title" style="color:goldenrod">Data Petugas</h5>

          <table class="table table-borderless datatable">
            <thead>
              <tr>
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Petugas</th>
                      <th scope="col">Username</th>
                      <th scope="col">Telepon</th>
                      <th scope="col">Level</th>
                      <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $item)
                @if ($item->level == 'petugas')
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $item->nama_petugas }}</td>
                  <td>{{ $item->username }}</td>
                  <td>{{ $item->telp }}</td>
                  <td>{{ $item->level }}</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Action</button>
                  <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                      data-bs-toggle="dropdown" aria-expanded="false">
                  </button>
                  <div class="dropdown-menu" role="menu" style="">
                        {{--  <a href="{{ route('petugas.edit', $item->id)}}" class="dropdown-item">Edit</a>  --}}
                      <form action="{{ route('petugas.destroy', $item->id)}}">
                          @csrf
                          @method('delete')
                          <button class="dropdown-item">Delete</button>
                        </form>
                    </div>
                </div>
            </td>
            @endif
           </tr>
          @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
</main>
@endsection
