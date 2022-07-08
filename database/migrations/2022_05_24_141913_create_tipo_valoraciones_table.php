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
        Schema::create('tipo_valoraciones', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nombre', 150);
            $table->unsignedTinyInteger('lengua_id')->nullable();
            $table->tinyInteger('funcion_id')->unsigned();
            $table->unsignedTinyInteger('proceso_id');

            $table->foreign('lengua_id')->references('id')->on('lenguas');
            $table->foreign('funcion_id')->references('id')->on('tipo_funciones');
            $table->foreign('proceso_id')->references('id')->on('procesos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_valoraciones');
    }
};
