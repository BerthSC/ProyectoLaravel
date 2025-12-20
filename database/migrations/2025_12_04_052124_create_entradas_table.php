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
    Schema::create('entradas', function (Blueprint $table) {
        $table->id('id_entrada');
        $table->unsignedBigInteger('id_equipo');
        $table->integer('cantidad');
        $table->date('fecha_entrada');
        $table->string('observaciones');

        $table->foreign('id_equipo')->references('id_equipo')->on('equipos');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
