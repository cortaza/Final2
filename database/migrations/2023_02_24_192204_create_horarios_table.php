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
            $table->string('lunes');
            $table->foreign('lunes')->references('codigo_comp')->on('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('lunesi');
            $table->foreign('lunesi')->references('dni')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('martes');
            $table->foreign('martes')->references('codigo_comp')->on('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('martesi');
            $table->foreign('martesi')->references('dni')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('miercoles');
            $table->foreign('miercoles')->references('codigo_comp')->on('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('miercolesi');
            $table->foreign('miercolesi')->references('dni')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jueves');
            $table->foreign('jueves')->references('codigo_comp')->on('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('juevesi');
            $table->foreign('juevesi')->references('dni')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('viernes');
            $table->foreign('viernes')->references('codigo_comp')->on('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('viernesi');
            $table->foreign('viernesi')->references('dni')->on('instructors')->onDelete('cascade')->onUpdate('cascade');
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
