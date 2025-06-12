<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
    Route::resource('/proyek', ProyekController::class);
    Route::resource('/rumah', RumahController::class);
    Route::resource('/marketing', MarketingController::class);
    });



require __DIR__.'/auth.php';
