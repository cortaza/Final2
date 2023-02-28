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
        Schema::create('subsedes', function (Blueprint $table) {
            $table->id('codigo_sede');
            $table->string('nombre');
            $table->string('codigo_centro');
            $table->foreign('codigo_centro')->references('codigo_centro')->on('centro_formacions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsedes');
    }
};
