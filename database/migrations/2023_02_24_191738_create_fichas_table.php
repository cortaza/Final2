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
        Schema::create('fichas', function (Blueprint $table) {
            $table->string('nr_ficha')->primary();
            $table->string('jornada');
            $table->string('modalidad');
            $table->integer('nr_aprendices');
            $table->string('codigo_prog');
            $table->foreign('codigo_prog')->references('codigo_prog')->on('programas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('codigo_for');
            $table->foreign('codigo_for')->references('codigo_for')->on('tipo_formacions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas');
    }
};
