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
        Schema::create('proyek', function (Blueprint $table) {

            $table->uuid('id')->primary();
            $table->string('no_pbg', length: 19)->unique();
            $table->string('nama_proyek')->unique();
            $table->integer('jumlah_unit');
            $table->integer('harga_rumah');
            $table->integer('luas_tanah');
            $table->integer('harga_kelebihan_tanah');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
