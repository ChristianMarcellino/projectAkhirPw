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
        Schema::create('berkas_konsumen', function (Blueprint $table) {
            $table->uuid('id') ->primary();
            $table->string('konsumen_id');
            $table->foreign('konsumen_id')->references('id')->on('konsumen')->onDelete('restrict')->onUpdate('cascade');
            $table->enum('ketersediaan_berkas', ['Tersedia','Belum Tersedia']);
            $table->string('keterangan_berkas',100);
            $table->string('berkas_id');
            $table->foreign('berkas_id')->references('id')->on('jenis_berkas')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_konsumen');
    }
};
