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
    Schema::create('gastos', function (Blueprint $table) {
        $table->id('idGasto');
        $table->string('responsable');
        $table->date('fecha');
        $table->integer('monto');
        $table->string('concepto');
        $table->string('medida');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
