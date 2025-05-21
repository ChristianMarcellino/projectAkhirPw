<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\RumahController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/proyek', ProyekController::class);
Route::resource('/rumah', RumahController::class);
