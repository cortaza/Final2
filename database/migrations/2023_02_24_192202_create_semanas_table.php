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
        Schema::create('semanas', function (Blueprint $table){
            $table->id('cod_se');
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
        Schema::dropIfExists('semanas');
    }
};
