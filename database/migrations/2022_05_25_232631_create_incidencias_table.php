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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('participacion_proceso_id')->unsigned();
            $table->text('descripcion');
            $table->tinyInteger('estatus')->unsigned();
            $table->timestamps();

            $table->foreign('participacion_proceso_id')->references('id')->on('participacion_procesos');
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
        Schema::dropIfExists('incidencias');
    }
};
