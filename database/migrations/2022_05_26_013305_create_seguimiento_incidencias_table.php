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
        Schema::create('seguimiento_incidencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('incidencia_id')->unsigned();
            $table->text('respuesta');
            $table->bigInteger('atendido_por')->unsigned();
            $table->timestamp('added_at');

            $table->foreign('incidencia_id')->references('id')->on('incidencias');
            $table->foreign('atendido_por')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimiento_incidencias');
    }
};
