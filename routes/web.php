<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthpelangganController;
use App\Http\Controllers\AuthpenggunaController;
use App\Http\Controllers\AuthteknisiController;
use App\Http\Controllers\DashboardadminController;
use App\Http\Controllers\DashboardsupervisorController;
use App\Http\Controllers\DashboardteknisiController;
use App\Http\Controllers\DatabandwidthController;
use App\Http\Controllers\DatabandwidthpelangganController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventpelangganController;
use App\Http\Controllers\JenispengaduanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PelangganpelangganController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduanpelangganController;
use App\Http\Controllers\PengaduansupervisorController;
use App\Http\Controllers\PengaduanteknisiController;
use App\Http\Controllers\PercobaanController;
use App\Http\Controllers\RattingController;
use App\Http\Controllers\RattingteknisiadminController;
use App\Http\Controllers\SupervisiorController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\TeknisiteknisiController;
use App\Http\Controllers\UserController;
use App\Models\Databandwidth;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('pages/dashboard/index');
});
Route::get('/', function () {
    return view('pages/login/index');
});
// Route::get('/suratpengaduan', function () {
//     return view('pages/kopsurat/index');
// });

// Route::get('/pengaduan', function () {
//     return view('pages/pengaduan/form');
// });

Route::get('/login', function () {
    return view('pages/login/index');
});

Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/login', [AuthController::class, 'actionlogin']);
Route::get('/admin/logout', [AuthController::class, 'logout']);


//ROUTE untuk membuat group pada sidebar berdasarkan aktor
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardadminController::class, 'index']);
    // route grafik ratting
    Route::get('/ratting', [RattingteknisiadminController::class, 'index']);
    //DIVISI
    Route::get('/divisi', [DivisiController::class, 'index']);
    Route::get('/divisi/create', [DivisiController::class, 'create']);
    Route::post('/divisi/store', [DivisiController::class, 'store']);
    Route::get('/divisi/{id}/edit', [DivisiController::class, 'edit']);
    Route::put('/divisi/{id}/update', [DivisiController::class, 'update']);
    Route::delete('/divisi/{id}/hapus', [DivisiController::class, 'destroy']);

    //KARYAWAN
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::get('/karyawan/create', [KaryawanController::class, 'create']);
    Route::post('/karyawan/store', [KaryawanController::class, 'store']);
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
    Route::put('/karyawan/{id}/update', [KaryawanController::class, 'update']);
    Route::delete('/karyawan/{id}/hapus', [KaryawanController::class, 'destroy']);

    //PELANGGAN
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan/create', [PelangganController::class, 'create']);
    Route::post('/pelanggan/store', [PelangganController::class, 'store']);
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit']);
    Route::put('/pelanggan/{id}/update', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/{id}/hapus', [PelangganController::class, 'destroy']);

    //USER
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}/update', [UserController::class, 'update']);
    Route::delete('/user/{id}/hapus', [UserController::class, 'destroy']);

    //pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index']);
    Route::get('/pengaduan/create', [PengaduanController::class, 'create']);
    Route::post('/pengaduan/store', [PengaduanController::class, 'store']);
    Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit']);
    Route::put('/pengaduan/{id}/update', [PengaduanController::class, 'update']);
    Route::delete('/pengaduan/{id}/hapus', [PengaduanController::class, 'destroy']);

    //EVENT
    Route::get('/event', [EventController::class, 'index']);
    Route::get('/event/create', [EventController::class, 'create']);
    Route::post('/event/store', [EventController::class, 'store']);
    Route::get('/event/{id}/edit', [EventController::class, 'edit']);
    Route::put('/event/{id}/update', [EventController::class, 'update']);
    Route::delete('/event/{id}/hapus', [EventController::class, 'destroy']);

    // update status gangguan
    Route::get('/pengaduan/{id}/accept', [PengaduanController::class, 'accept']);
    Route::get('/pengaduan/{id}/done', [PengaduanController::class, 'done']);

    //
    Route::put('/pengaduan/{id}/accept', [PengaduanController::class, 'actionaccept']);

    //notifikasi email
    Route::get('/kirimemail', [PengaduanController::class, 'notifemail']);
    //
    Route::get('/
    ', [RattingController::class, 'index']);
    Route::get('/cetakpengaduan', [PengaduanController::class, 'cetakpengaduan']);

    //EVENT
    Route::get('/databandwidth', [DatabandwidthController::class, 'index']);
    Route::get('/databandwidth/create', [DatabandwidthController::class, 'create']);
    Route::post('/databandwidth/store', [DatabandwidthController::class, 'store']);
    Route::get('/databandwidth/{id}/edit', [DatabandwidthController::class, 'edit']);
    Route::put('/databandwidth/{id}/update', [DatabandwidthController::class, 'update']);
    Route::delete('/databandwidth/{id}/hapus', [DatabandwidthController::class, 'destroy']);

    //LEVEL
    Route::get('/level', function () {
        return view('pages/level/index');
    });

    //TEKNISI
    Route::get('/teknisi', [TeknisiController::class, 'index']);
    Route::get('/teknisi/create', [TeknisiController::class, 'create']);
    Route::post('/teknisi/store', [TeknisiController::class, 'store']);
    Route::get('/teknisi/{id}/edit', [TeknisiController::class, 'edit']);
    Route::put('/teknisi/{id}/update', [TeknisiController::class, 'update']);
    Route::delete('/teknisi/{id}/hapus', [TeknisiController::class, 'destroy']);

    // JENIS PENGADUAN
    Route::get('/jenispengaduan', [JenispengaduanController::class, 'index']);
    Route::get('/jenispengaduan/create', [JenispengaduanController::class, 'create']);
    Route::post('/jenispengaduan/store', [JenispengaduanController::class, 'store']);
    Route::get('/jenispengaduan/{id}/edit', [JenispengaduanController::class, 'edit']);
    Route::put('/jenispengaduan/{id}/update', [JenispengaduanController::class, 'update']);
    Route::delete('/jenispengaduan/{id}/hapus', [JenispengaduanController::class, 'destroy']);

    //data umpan balik dari pelanggan
    Route::get('/feedback', [RattingController::class, 'index']);
});

//////////
Route::get('/loginteknisi/login', [AuthteknisiController::class, 'login'])->name('login');
Route::post('/loginteknisi/login', [AuthteknisiController::class, 'actionlogin']);
Route::get('/loginteknisi/logout', [AuthteknisiController::class, 'logout']);
//////////
//ROUTE untuk membuat group pada sidebar berdasarkan aktor

Route::get('/supervisor/login', [SupervisiorController::class, 'login'])->name('login');
Route::post('/supervisor/login', [SupervisiorController::class, 'actionlogin']);
Route::get('/supervisor/logout', [SupervisiorController::class, 'logout']);

//ROUTE untuk membuat group pada sidebar berdasarkan aktor (supervisior)
Route::middleware('supervisor')->prefix('supervisor')->group(function () {
    Route::get('/dashboard', [DashboardsupervisorController::class, 'index']);
    Route::get('/ratting', [RattingteknisiadminController::class, 'indexsupervisor']);
    //TEKNISI
    Route::get('/teknisi', [TeknisiController::class, 'index']);
    Route::get('/teknisi/create', [TeknisiController::class, 'create']);
    Route::post('/teknisi/store', [TeknisiController::class, 'store']);
    Route::get('/teknisi/{id}/edit', [TeknisiController::class, 'edit']);
    Route::put('/teknisi/{id}/update', [TeknisiController::class, 'update']);
    Route::delete('/teknisi/{id}/hapus', [TeknisiController::class, 'destroy']);

    Route::get('/pengaduan', [PengaduansupervisorController::class, 'index']);

    //umpan baliak di halaman admin

    Route::get('/cetakpengaduan', [PengaduansupervisorController::class, 'cetakpengaduan']);

    Route::get('/pelanggan', [PelangganController::class, 'indexsupervisor']);

    // Route::get('suratpengaduan',[])
});



//ROUTE untuk membuat group pada sidebar berdasarkan aktor (pelanggan)
Route::middleware('pelanggan')->prefix('pelanggan')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages/dashboard/indexpelanggan');
    });
    //PELANGGAN
    Route::get('/pelanggan', [PelangganpelangganController::class, 'index']);
    Route::get('/pelanggan/create', [PelangganpelangganController::class, 'create']);
    Route::post('/pelanggan/store', [PelangganpelangganController::class, 'store']);
    Route::get('/pelanggan/{id}/edit', [PelangganpelangganController::class, 'edit']);
    Route::put('/pelanggan/{id}/update', [PelangganpelangganController::class, 'update']);
    Route::delete('/pelanggan/{id}/hapus', [PelangganpelangganController::class, 'destroy']);

    //PELANGGAN
    Route::get('/pengaduan', [PengaduanpelangganController::class, 'index']);
    Route::get('/pengaduan/create', [PengaduanpelangganController::class, 'create']);
    Route::post('/pengaduan/store', [PengaduanpelangganController::class, 'store']);
    Route::get('/pengaduan/{id}/edit', [PengaduanpelangganController::class, 'edit']);
    Route::put('/pengaduan/{id}/update', [PengaduanpelangganController::class, 'update']);
    Route::delete('/pengaduan/{id}/hapus', [PengaduanpelangganController::class, 'destroy']);

    Route::get('/databandwidth', [DatabandwidthpelangganController::class, 'index']);
    Route::get('/event', [EventController::class, 'indexpelanggan']);

    Route::get('/penilaian', [RattingController::class, 'rattingpelanggan']);
    Route::get('/penilaian/{id}/ratting', [RattingController::class, 'datapenilaian']);
    //data untuk menyimpan ratting pengaduan dari pelanggan
    Route::post('/penilaian/store', [RattingController::class, 'datapenilianstore']);
});

// Route::get('/pelanggan/register', [AuthpelangganController::class, 'register']);
// Route::post('/pelanggan/register', [AuthpelangganController::class, 'actionRegister']);
// Route::get('/pelanggan/loginpelanggan', [AuthpelangganController::class, 'login'])->name('login');
// Route::post('/pelanggan/loginpelanggan', [AuthpelangganController::class, 'actionlogin']);
// Route::get('/pelanggan/logout', [AuthpelangganController::class, 'logout']);



Route::get('/teknisi/loginteknisi', [AuthteknisiController::class, 'login'])->name('login');
Route::post('/teknisi/loginteknisi', [AuthteknisiController::class, 'actionlogin']);
Route::get('/teknisi/logout', [AuthteknisiController::class, 'logout']);

//ROUTE untuk membuat group pada sidebar berdasarkan aktor (pelanggan)
Route::middleware('teknisi')->prefix('teknisi')->group(function () {
    //route mengarahkan ke halaman dashboard teknisi
    Route::get('/dashboard', [DashboardteknisiController::class, 'index']);
    //PELANGGAN
    Route::get('/teknisi', [TeknisiteknisiController::class, 'index']);
    Route::get('/teknisi/create', [TeknisiteknisiController::class, 'create']);
    Route::post('/teknisi/store', [TeknisiteknisiController::class, 'store']);
    Route::get('/teknisi/{id}/edit', [TeknisiteknisiController::class, 'edit']);
    Route::put('/teknisi/{id}/update', [TeknisiteknisiController::class, 'update']);
    Route::delete('/teknisi/{id}/hapus', [TeknisiteknisiController::class, 'destroy']);

    //pengaduan
    Route::get('/pengaduan', [PengaduanteknisiController::class, 'index']);
    Route::get('/pengaduan/create', [PengaduanteknisiController::class, 'create']);
    Route::post('/pengaduan/store', [PengaduanteknisiController::class, 'store']);
    Route::get('/pengaduan/{id}/edit', [PengaduanteknisiController::class, 'edit']);
    Route::put('/pengaduan/{id}/update', [PengaduanteknisiController::class, 'update']);


    Route::delete('/pengaduan/{id}/hapus', [TeknisiPengaduanteknisiControllereknisiController::class, 'destroy']);
    //halaman pelapor
    Route::get('/pelapor/', [PengaduanteknisiController::class, 'indexpelapor']);
    Route::get('/pengaduan/{id}/accept', [PengaduanteknisiController::class, 'accept']);
    Route::get('/pengaduan/{id}/done', [PengaduanteknisiController::class, 'done']);

    Route::get('/doing', [PengaduanteknisiController::class, 'doing']);
    Route::get('/selesai', [PengaduanteknisiController::class, 'selesai']);

    Route::get('/feedback', [RattingController::class, 'indexteknisi']);
});



Route::get('/pengaduan/feedback', [RattingController::class, 'ratting']);
Route::get('/pengaduan/create', [RattingController::class, 'create']);
Route::post('/pengaduan/feedback/store', [RattingController::class, 'store']);
