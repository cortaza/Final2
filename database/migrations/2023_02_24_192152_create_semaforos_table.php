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
        Schema::create('semaforos', function (Blueprint $table) {
            $table->id('id_semaforo');
            $table->string('dia_semana');
            $table->string('trimestre');
            $table->string('codigo_comp');
            $table->foreign('codigo_comp')->references('codigo_comp')->on('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('codigo_prog');
            $table->foreign('codigo_prog')->references('codigo_prog')->on('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semaforos');
    }
};
