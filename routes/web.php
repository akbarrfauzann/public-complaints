<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\RegisterController as AdminRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    // Dashboard
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

    // Login
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    // Register
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');

    // Pengaduan
    Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
    Route::get('/panduan', [PengaduanController::class, 'panduan'])->name('panduan');
    Route::post('pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('pengaduan/status/{id_pengaduan}', [TanggapanController::class, 'update'])->name('pengaduan.status');
    Route::get('pengaduan/destroy{id_pengaduan}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');


    // List Pengaduan
    Route::get('list_pengaduan', [PengaduanController::class, 'list'])->name('list-pengaduan');
    Route::post('list_pengaduan/store', [PengaduanController::class, 'store'])->name('list-pengaduan.store');
    Route::get('list_pengaduan/show{id_pengaduan}', [PengaduanController::class, 'show'])->name('list-pengaduan.show');

    // Admin Dashboard
    // Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Admin Login
    Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('admin/login/store', [AdminLoginController::class, 'store'])->name('admin.login.store');
    Route::post('admin/login', [AdminLoginController::class, 'logout'])->name('admin.logout');

    // Admin Register
    Route::get('admin/register', [AdminRegisterController::class, 'index'])->name('admin.register');
    Route::post('admin/register', [AdminRegisterController::class, 'store'])->name('admin.register.store');

    // Admin Petugas
    Route::get('petugas', [PetugasController::class, 'index'])->name('petugas.index');
    Route::get('petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
    Route::get('petugas/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::get('petugas/update', [PetugasController::class, 'update'])->name('petugas.update');
    Route::post('petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('petugas/destroy', [PetugasController::class, 'destroy'])->name('petugas.destroy');

    // Admin Tanggapan
    Route::get('tanggapan', [TanggapanController::class, 'index'])->name('tanggapan');
    Route::get('tanggapan/create/{id_pengaduan}', [TanggapanController::class, 'create'])->name('tanggapan.create');
    Route::post('tanggapan/store/{id_pengaduan}', [TanggapanController::class, 'store'])->name('tanggapan.store');
    Route::get('tanggapan/show/{id_pengaduan}', [TanggapanController::class, 'show'])->name('tanggapan.show');
    Route::get('tanggapan/pdf/{id_pengaduan}', [TanggapanController::class, 'cetak_pdf'])->name('tanggapan.pdf');
    Route::get('tanggapan/cetak-pdf', [PengaduanController::class, 'cetak'])->name('tanggapan.cetakpdf');
    Route::get('tanggapan/cetak-form', [TanggapanController::class, 'cetakForm'])->name('tanggapan.cetak');
    Route::get('tanggapan/pdf-pertanggal/{tglawal}/{tglakhir}', [TanggapanController::class, 'cetakPDFPertanggal'])->name('tanggapan.pdftanggal');
    Route::get('pengaduan/pdf', [PengaduanController::class, 'pdf'])->name('pengaduan.pdf');
