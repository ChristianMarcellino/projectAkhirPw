<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('jenis_transaksi',60);
            $table->date('tanggal_transaksi');
            $table->integer('jumlah_pembayaran');
            $table->enum('jenis_pembayaran', ['tunai', 'transfer',]);
            $table->string('id_konsumen');
            $table->foreign('id_konsumen')->references('id')->on('konsumen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
