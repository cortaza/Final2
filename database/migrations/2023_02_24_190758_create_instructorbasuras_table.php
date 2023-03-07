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
        Schema::create('instructorbasuras', function (Blueprint $table) {
            $table->string('dni',10)->primary();
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('telefono');
            $table->text('correo');
            $table->boolean('estado');
            $table->string('tipo_contrato');
            $table->unsignedBigInteger('codigo_red');
            $table->foreign('codigo_red')->references('codigo_red')->on('red_tematicas')->onDelete('cascade')->onUpdate('cascade');  
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
        Schema::dropIfExists('instructorbasuras');
    }
};
