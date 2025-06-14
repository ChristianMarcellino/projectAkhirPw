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
        Schema::create('pengiriman_berkas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_konsumen');
            $table->foreign('id_konsumen')->references('id')->on('konsumen')->onDelete('cascade');
            $table->string('id_bank');
            $table->foreign('id_bank')->references('id')->on('bank')->onDelete('cascade');
            $table->string('id_marketing');
            $table->foreign('id_marketing')->references('id')->on('marketing')->onDelete('cascade');
            $table->date('tanggal_kirim');
            $table->enum('status', ['diterima', 'diproses', 'ditolak'])->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimanberkas');
    }
};