@extends('masyarakat.layouts.template')

@section('content')
    <main id="main" class="main">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: green">Panduan Pengaduan</h5>
                    <div class="card">
                        <div class="card-header" style="color: goldenrod">
                            Petunjuk Laporan Pengaduan Masyakarat Caringin
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <h5 style="font-weight: bold; padding-top: 10px">Anda harus melakukan
                                    registrasi
                                    terlebih dahulu
                                    untuk dabat
                                    melakukan pengaduan.</h5>
                                <ol style="font-size: 15px">
                                    <li>Daftar terlebih daholu dengan mengisi data diri anda <b>pastikan isi NIK dengan
                                            benar.</b></li>
                                    <li>Jika sudah berhasil registrasi, maka anda bisa login ke halaman pengaduan.</li>
                                    <li>Silahkan laporkan pengaduan yang ingin di laporkan.</li>
                                    <li>Anda bisa melakukan pengaduan ketika belum login dengan syarat pernah melakukan
                                        registrasi sebelumnya.</li>
                                </ol>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            @include('sweetalert::alert')
        </section>
    </main>
