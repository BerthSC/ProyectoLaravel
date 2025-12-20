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
    Schema::create('colindancias', function (Blueprint $table) {
        $table->id('idColindancia');
        $table->string('norte');
        $table->string('sur');
        $table->string('este');
        $table->string('oeste');
        $table->string('noreste');
        $table->string('noroeste');
        $table->string('sureste');
        $table->string('suroeste');

        $table->unsignedBigInteger('idParcela');
        $table->foreign('idParcela')->references('idParcela')->on('parcelas');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colindancias');
    }
};
