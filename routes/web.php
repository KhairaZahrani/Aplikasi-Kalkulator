<?php

use App\Http\Controllers\KalkulatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kalkulator', [KalkulatorController::class, 'index']);
Route::post('/kalkulator', [KalkulatorController::class, 'hitung']);