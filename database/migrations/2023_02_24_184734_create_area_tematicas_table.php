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
        Schema::create('area_tematicas', function (Blueprint $table) {
            $table->string('codigo_area',10)->primary();
            $table->string('nombre');
            $table->unsignedBigInteger('codigo_red');
            $table->foreign('codigo_red')->references('codigo_red')->on('red_tematicas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_tematicas');
    }
};
