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
            $table->uuid('id');
            $table->primary('id');
            $table->string("no_shm_rumah", 18);
            $table->string("blok_rumah", 5);
            $table->integer('harga_dp');
            $table->uuid('proyek_id');
            $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('cascade')->onUpdate('cascade');
            $table->integer("kelebihan_tanah");
            $table->enum('status_rumah', ['Tersedia', 'Booking', 'Terjual']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumahs');
    }
};
