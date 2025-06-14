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
            $table->string('no_pbg', 19)->unique();
            $table->string('nama_proyek', 70)->unique();
            $table->integer('jumlah_unit');
            $table->unsignedInteger('harga_rumah');
            $table->integer('luas_tanah');
            $table->unsignedInteger('harga_kelebihan_tanah');
            $table->string('alamat', 100);
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
