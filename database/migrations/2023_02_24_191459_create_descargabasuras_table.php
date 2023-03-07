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
        Schema::create('descargabasuras', function (Blueprint $table) {
            $table->id('codigo_desc');
            $table->string('nombre');
            $table->string('codigo_prog');
            $table->foreign('codigo_prog')->references('codigo_prog')->on('programas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descargabasuras');
    }
};
