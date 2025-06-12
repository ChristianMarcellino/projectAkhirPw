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
        Schema::create('konsumen', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nik_konsumen', 16)->unique();
            $table->string('nama_konsumen', 60);
            $table->string('no_telp', 14);
            $table->string('alamat', 100);
            $table->unsignedInteger('gaji');
            $table->string('Status Pernikahan', 20);
            $table->string('no_shm_rumah', 16);
            $table->foreign('no_shm_rumah')->references('no_shm_rumah')->on('rumah')->onDelete('restrict')->onUpdate('cascade');
            $table->string('nama_bank,60');
            $table->foreign('nama_bank')->references('nama_bank')->on('bank')->onDelete('restrict')->onUpdate('cascade');
            $table->string('nik_marketing', 16);
            $table->foreign('nik_marketing')->references('nik_marketing')->on('marketing')->onDelete('restrict')->onUpdate('cascade');

            $table->timestamps();
            $table->unique(['nik_konsumen', 'no_shm_rumah']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsumen');
    }
};
