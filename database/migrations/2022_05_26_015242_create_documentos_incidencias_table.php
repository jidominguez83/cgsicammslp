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
        Schema::create('documentos_incidencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('incidencia_id')->unsigned();
            $table->string('path', 50);
            $table->tinyInteger('requiere_respuesta')->unsigned();
            $table->timestamps();

            $table->foreign('incidencia_id')->references('id')->on('incidencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos_incidencias');
    }
};
