<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\NotarisController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\BiCheckingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/proyek', ProyekController::class);
Route::resource('/rumah', RumahController::class);
Route::resource('/marketing', MarketingController::class);
Route::resource('/notaris', NotarisController::class);
Route::resource('/bank', BankController::class);
Route::resource('/konsumen', KonsumenController::class);
Route::resource('/bi_checking', BiCheckingController::class);

require __DIR__.'/auth.php';
