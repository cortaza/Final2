<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():    void
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->string('codigo_prog')->primary();
            $table->string('nombre');
            $table->boolean('estado');
            $table->string('nivel_formacion');
            $table->string('duracion');
            $table->integer('version');
            $table->string('codigo_centro');
            $table->foreign('codigo_centro')->references('codigo_centro')->on('centro_formacions')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codigo_area');
            $table->foreign('codigo_area')->references('codigo_area')->on('area_tematicas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas');
    }
};
