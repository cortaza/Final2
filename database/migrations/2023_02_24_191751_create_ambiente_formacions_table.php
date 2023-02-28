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
        Schema::create('ambiente_formacions', function (Blueprint $table) {
            $table->string('codigo_ambiente')->primary();
            $table->string('nombre');
            $table->string('recursos');
            $table->string('especialidad');
            $table->string('codigo_centro');
            $table->foreign('codigo_centro')->references('codigo_centro')->on('centro_formacions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nr_ficha');
            $table->foreign('nr_ficha')->references('nr_ficha')->on('fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambiente_formacions');
    }
};
