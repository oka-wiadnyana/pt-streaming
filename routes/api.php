<?php

use App\Http\Controllers\StreamingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/all/{query}/{page}',[StreamingController::class,'getAllData']);
Route::get('/get_page/{per_page}/{query?}',[StreamingController::class,'getPage']);
Route::get('/all_data',[StreamingController::class,'getAllRawData']);
Route::get('/detail_perkara/{id}',[StreamingController::class,'getDataById']);