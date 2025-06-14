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
            $table->string('no_telp_konsumen', 13);
            $table->string('alamat_konsumen', 100);
            $table->unsignedInteger('gaji');
            $table->enum('status_pernikahan', ['Menikah', 'Cerai Hidup', 'Cerai Mati', 'Belum Menikah']);
            $table->string('rumah_id');
            $table->foreign('rumah_id')->references('id')->on('rumah')->onDelete('restrict')->onUpdate('cascade');
            $table->string('bank_id');
            $table->foreign('bank_id')->references('id')->on('bank')->onDelete('restrict')->onUpdate('cascade');
            $table->string('marketing_id');
            $table->foreign('marketing_id')->references('id')->on('marketing')->onDelete('restrict')->onUpdate('cascade');

            $table->timestamps();
            $table->unique(['nik_konsumen', 'rumah_id']);
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
