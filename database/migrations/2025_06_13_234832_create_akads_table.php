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
        Schema::create('akads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_akad', 11)->unique();
            $table->string('konsumen_id');
            $table->foreign('konsumen_id')->references('id')->on('konsumen')->onDelete('restrict')->onUpdate('cascade');
            $table->date('tanggal_akad');
            $table->string('tempat_akad',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akads');
    }
};
