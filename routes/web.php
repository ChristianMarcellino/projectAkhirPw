<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\NotarisController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BerkasKonsumenController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\BiCheckingController;
use App\Http\Controllers\JenisBerkasController;
use App\Http\Controllers\PengirimanBerkasController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
    Route::resource('/proyek', ProyekController::class);
    Route::resource('/rumah', RumahController::class);
    Route::resource('/marketing', MarketingController::class);
    Route::resource('notaris', NotarisController::class)->parameters([
        'notaris' => 'notaris'
    ]);
    Route::resource('/bank', BankController::class);
    Route::resource('/konsumen', KonsumenController::class)->parameters([
        'konsumen' => 'konsumen'
    ]);
    Route::resource('/bi_checking', BiCheckingController::class);
    Route::resource('pengirimanberkas', PengirimanBerkasController::class)->parameters([
        'pengirimanberkas' => 'pengirimanberkas'
    ]);
    Route::resource('/transaksi', TransaksiController::class);
    
    Route::resource('/akad', AkadController::class);
    Route::resource('/jenis_berkas', JenisBerkasController::class)->parameters([
        'jenis_berkas' => 'jenis_berkas'
    ]);
    Route::resource('/berkas_konsumen', BerkasKonsumenController::class)->parameters([
        'berkas_konsumen' => 'berkas_konsumen'
    ]);
});


require __DIR__.'/auth.php';
