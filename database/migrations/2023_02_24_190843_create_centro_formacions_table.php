<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('centro_formacions', function (Blueprint $table) {
            $table->string('codigo_centro')->primary();
            $table->string('nombre_centro');
            $table->integer('nr_ambientes');
            $table->string('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('administracions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_formacions');
    }

};
