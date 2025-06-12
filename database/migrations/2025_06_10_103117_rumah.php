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
        Schema::create('rumah', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_shm_rumah', 16)->unique();
            $table->string('blok_rumah', 5);
            $table->integer('luas_tanah_rumah');
            $table->integer('harga_dp');
            $table->string('proyek_id');
            $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('restrict')->onUpdate('cascade');
            $table->enum('status_penjualan', ['Tersedia','Terjual','Booking']);
            $table->timestamps();
            $table->unique(['proyek_id', 'blok_rumah']);
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
