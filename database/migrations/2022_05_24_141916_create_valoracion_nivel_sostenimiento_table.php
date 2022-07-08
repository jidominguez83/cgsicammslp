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
        Schema::create('valoracion_nivel_sostenimiento', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('tipo_valoracion_id')->unsigned();
            $table->tinyInteger('nivel_educativo_id')->unsigned();
            $table->tinyInteger('sostenimiento_id')->unsigned()->nullable();

            $table->foreign('tipo_valoracion_id')->references('id')->on('tipo_valoraciones');
            $table->foreign('nivel_educativo_id')->references('id')->on('niveles_educativos');
            $table->foreign('sostenimiento_id')->references('id')->on('sostenimientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valoracion_nivel_sostenimiento');
    }
};
