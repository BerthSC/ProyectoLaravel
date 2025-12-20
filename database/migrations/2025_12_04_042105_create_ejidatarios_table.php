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
    Schema::create('ejidatarios', function (Blueprint $table) {
        $table->id('idEjidatario');
        $table->string('nombre', 20);
        $table->string('apellidoPaterno', 20);
        $table->string('apellidoMaterno', 20);
        $table->date('fechaNacimiento');
        $table->string('curp', 20);
        $table->string('rfc', 15);
        $table->string('claveElector', 20);
        $table->string('direccion', 50);
        $table->integer('telefono');
        $table->string('email', 30);
        $table->date('fechaIngreso');
        $table->integer('numeroEjidatario');
        
        $table->unsignedBigInteger('idEstatus');
        $table->foreign('idEstatus')->references('idEstatus')->on('estatus');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejidatarios');
    }
};
