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
        Schema::create('prueba_listas', function (Blueprint $table) {
            $table->string('curp', 18);
            $table->string('rfc', 13);
            $table->string('folio', 20);
            $table->string('nombre', 50);
            $table->string('apellido_paterno', 75);
            $table->string('apellido_materno', 75);
            $table->string('puntaje_global', 20);
            $table->integer('posicion_ordenamiento');
            $table->string('curso_hab_docentes', 20);
            $table->string('mov_academica', 20);
            $table->string('exp_docente', 20);
            $table->string('cenni', 20);
            $table->string('iv_conocimientos_ap', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prueba_listas');
    }
};
