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
            $table->uuid('id');
            $table->primary('id');
            $table->string("no_pbg", 17);
            $table->string('nama_proyek', 50);
            $table->integer("jumlah_unit");
            $table->integer("harga_rumah");
            $table->integer("luas_tanah");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
