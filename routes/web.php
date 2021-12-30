<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanPendaftaranController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\RuangController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//hanya untuk role admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return 'halaman admin';
    });

    route::get('profile', function () {
        return 'halaman profile admin';
    });
});

//hanya untuk role member
Route::group(['prefix' => 'member', 'middleware' => ['auth', 'role:member']], function () {
    Route::get('/', function () {
        return 'halaman member';
    });

    route::get('profile', function () {
        return 'halaman profile member';
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {


    Route::get('keluhan', function () {
        return view('keluhan.index');
    })->middleware(['role:admin']);

    Route::get('laporan', function () {
        return view('laporan.index');
    })->middleware(['role:admin']);

     Route::get('pendaftaran', function () {
         return view('pendaftaran.index');
     })->middleware(['role:admin']);

    Route::get('ruang', function () {
        return view('ruang.index');
    })->middleware(['role:admin']);
    Route::resource('laporan_pendaftaran', LaporanPendaftaranController::class);
    Route::resource('jadwal_dokter', JadwalDokterController::class);
    Route::resource('Keluhan', KeluhanController::class);
    Route::resource('pendaftaran', PendaftaranController::class);
    Route::resource('ruang', RuangController::class);
});

Route::group(['prefix' => 'member', 'middleware' => ['auth']], function () {
    Route::get('jadwal_dokter', function () {
        return view('jadwal_dokter.index');
    })->middleware(['role:member|admin']);

    Route::get('keluhan', function () {
        return view('keluhan.index');
    })->middleware(['role:member|admin']);

    Route::get('pendaftaran', function () {
        return view('pendaftaran.index');
    })->middleware(['role:member|admin']);

    Route::get('ruang', function () {
        return view('ruang.index');
    })->middleware(['role:member|admin']);





});

