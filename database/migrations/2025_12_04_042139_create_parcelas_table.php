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
    Schema::create('parcelas', function (Blueprint $table) {
        $table->id('idParcela');
        $table->string('noParcela');
        $table->string('superficie');
        $table->string('ubicacion');

        $table->unsignedBigInteger('idEjidatario');
        $table->unsignedBigInteger('idUso');

        $table->foreign('idEjidatario')->references('idEjidatario')->on('ejidatarios');
        $table->foreign('idUso')->references('idUso')->on('usos');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelas');
    }
};
