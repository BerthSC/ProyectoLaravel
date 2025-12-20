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
    Schema::create('salidas', function (Blueprint $table) {
        $table->id('id_salida');
        $table->unsignedBigInteger('id_equipo');
        $table->integer('cantidad');
        $table->date('fecha_salida');
        $table->string('tipo_salida');
        $table->string('observaciones');
        $table->string('responsable');

        $table->foreign('id_equipo')->references('id_equipo')->on('equipos');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salidas');
    }
};
