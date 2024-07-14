<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OtentifikasiController;
use App\Http\Controllers\ReferensiController;
use App\Http\Controllers\StreamingController;
use App\Models\Accessed;
use Illuminate\Support\Facades\Route;

Route::controller(StreamingController::class)->group(function () {
    Route::get('/home/{jenis_perkara?}', 'index');
    Route::get('/get_data_datatables/{jenis_perkara?}', 'getDataDatatables');
    Route::get('/detail/{id}', 'detailPerkara');
    Route::get('/is_download', 'isDownloadIncrement');
});
Route::controller(StreamingController::class)->prefix('admin')->group(function () {
    Route::get('/home/{jenis_perkara?}', 'index');
    Route::get('/get_data_datatables/{jenis_perkara?}', 'getDataDatatables');
    Route::get('/detail/{id}', 'detailPerkara');
    Route::get('/add', 'addPerkara');
    Route::get('/get_klasifikasi/{jenis_perkara}', 'getKlasifikasi');
    Route::post('/insert', 'insertPerkara');
    Route::get('/edit/{id}', 'editPerkara');
    Route::post('/update', 'updatePerkara');
    Route::get('/delete/{id}', 'deletePerkara');
    Route::get('/account', 'users');
    Route::get('/add_user', 'addUser');
    Route::post('/insert_user', 'insertUser');
    Route::get('/delete_user/{id}', 'deleteDataUser');
});

Route::controller(ReferensiController::class)->prefix('admin')->group(function () {
    Route::get('klasifikasi_perkara', 'klasifikasiPerkara');
    Route::get('get_klasifikasi_datatables', 'getKlasifikasiDatatables');
    Route::get('add_klasifikasi', 'addKlasifikasi');
    Route::post('insert_klasifikasi', 'insertKlasifikasi');
    Route::get('edit_klasifikasi/{id}', 'editKlasifikasi');
    Route::post('update_klasifikasi', 'updateKlasifikasi');
    Route::get('delete_klasifikasi/{id}', 'deleteKlasifikasi');
    Route::get('hakim', 'hakim');
    Route::get('get_hakim_datatables', 'getHakimDatatables');
    Route::get('add_hakim', 'addHakim');
    Route::post('insert_hakim', 'insertHakim');
    Route::get('edit_hakim/{id}', 'editHakim');
    Route::post('update_hakim', 'updateHakim');
    Route::get('delete_hakim/{id}', 'deleteHakim');
    Route::get('pp', 'pp');
    Route::get('get_pp_datatables', 'getPpDatatables');
    Route::get('add_pp', 'addPp');
    Route::post('insert_pp', 'insertPp');
    Route::get('edit_pp/{id}', 'editPp');
    Route::post('update_pp', 'updatePp');
    Route::get('delete_pp/{id}', 'deletePp');
});

Route::controller(LaporanController::class)->prefix('admin')->group(function () {
    Route::get('laporan', 'index');
    Route::post('cetak_laporan', 'cetakLaporan');
});
Route::get('/', function () {
    $statistics = Accessed::first();
    // dd($statistics);
    return view('user.landing_page', ['statistics' => $statistics]);
});
Route::controller(OtentifikasiController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/attempt_login', 'attemptLogin');
    Route::middleware('auth')->group(function () {

        Route::get('/logout', 'logout');
    });
});
