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
    Schema::create('infoadministrativa', function (Blueprint $table) {
        $table->id('id_InfAdmin');
        $table->string('num_inscripcionRAN');
        $table->string('claveNucleoAgrario');
        $table->string('comunidad');
        $table->date('fechaExpedicion');

        $table->unsignedBigInteger('idParcela');
        $table->foreign('idParcela')->references('idParcela')->on('parcelas');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infoadministrativa');
    }
};
