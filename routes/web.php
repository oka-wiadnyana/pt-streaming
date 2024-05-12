<?php

use App\Http\Controllers\OtentifikasiController;
use App\Http\Controllers\StreamingController;
use Illuminate\Support\Facades\Route;

Route::controller(StreamingController::class)->group(function () {
    Route::get('/home/{jenis_perkara?}', 'index');
    Route::get('/get_data_datatables/{jenis_perkara?}', 'getDataDatatables');
    Route::get('/detail/{id}', 'detailPerkara');
});
Route::controller(StreamingController::class)->prefix('admin')->group(function () {
    Route::get('/home/{jenis_perkara?}', 'index');
    Route::get('/get_data_datatables/{jenis_perkara?}', 'getDataDatatables');
    Route::get('/detail/{id}', 'detailPerkara');
    Route::get('/add', 'addPerkara');
    Route::post('/insert', 'insertPerkara');
    Route::get('/edit/{id}', 'editPerkara');
    Route::post('/update', 'updatePerkara');
    Route::get('/delete/{id}', 'deletePerkara');
    Route::get('/account', 'users');
    Route::get('/add_user', 'addUser');
    Route::post('/insert_user', 'insertUser');
    Route::get('/delete_user/{id}', 'deleteDataUser');
});
Route::get('/', function () {
    return view('user.landing_page');
});
Route::controller(OtentifikasiController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/attempt_login', 'attemptLogin');
    Route::middleware('auth')->group(function () {

        Route::get('/logout', 'logout');
    });
});
