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
        Schema::create('bi_checking', function (Blueprint $table) {
            $table->uuid('id') ->primary();
            $table->string('id_checking', 16)->unique();
            $table->string('konsumen_id');
            $table->foreign('konsumen_id')->references('id')->on('konsumen')->onDelete('restrict')->onUpdate('cascade');
            $table->enum('hasil_checking', ['kol 1','kol 2','kol 3','kol 4','kol 5']);
            $table->date('tanggal_checking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bi_checking');
    }
};
