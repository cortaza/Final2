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
        Schema::create('resultadobasuras', function (Blueprint $table) {
            $table->id('id_resultado');
            $table->string('resultado',1000);
            $table->boolean('estado');
            $table->string('codigo_comp');
            $table->foreign('codigo_comp')->references('codigo_comp')->on('competencias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultadobasuras');
    }
};
