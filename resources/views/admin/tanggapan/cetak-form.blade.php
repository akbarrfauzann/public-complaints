@extends('admin.layouts.main')

@section('content')
<main id="main" class="main">

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title" style="color:goldenrod">CETAK PDF</h5>
              <div class="row mb-3">
                <label for="tgl_tanggapan" class="col-sm-2 col-form-label" style="color:green">Dari Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" name="tglawal" id="tglawal" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="tgl_tanggapan" class="col-sm-2 col-form-label"style="color:green">Sampai Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                </div>
              </div>
              <a href="" onclick="this.href='/tanggapan/pdf-pertanggal/'+document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-success col-md-12">Cetak</a>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
