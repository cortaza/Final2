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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('codigo_h');
            $table->string('codigo_prog');
            $table->foreign('codigo_prog')->references('codigo_prog')->on('programas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nr_ficha');
            $table->foreign('nr_ficha')->references('nr_ficha')->on('fichas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codigo_ambiente');
            $table->foreign('codigo_ambiente')->references('codigo_ambiente')->on('ambiente_formacions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('dni');
            $table->foreign('dni')->references('dni')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_semaforo');
            $table->foreign('id_semaforo')->references('id_semaforo')->on('semaforos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('cod_se');
            $table->foreign('cod_se')->references('cod_se')->on('semanas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
