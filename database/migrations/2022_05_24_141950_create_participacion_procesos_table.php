<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participacion_procesos', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('participante_id');
            $table->unsignedTinyInteger('valoracion_nivel_sostenimiento_id');
            $table->string('ciclo', 10);
            $table->string('folio_federal', 20)->nullable();
            $table->string('p_global', 30)->nullable();
            $table->smallInteger('posicion')->nullable()->unsigned();
            $table->tinyInteger('estatus')->unsigned();
            $table->string('motivo_baja', 150)->nullable();

            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->foreign('valoracion_nivel_sostenimiento_id')->references('id')->on('valoracion_nivel_sostenimiento');
            $table->foreign('estatus')->references('id')->on('estatuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participacion_procesos');
    }
};
