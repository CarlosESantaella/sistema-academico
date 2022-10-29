<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->integer('codigo')->primary();
            $table->string('rude', 32)->comment('Codigo Estudiantil');
            $table->string('ci', 12)->nullable();
            $table->string('pasaporte', 32)->nullable();
            $table->string('nombres', 32);
            $table->string('appaterno', 32)->nullable();
            $table->string('apmaterno', 32)->nullable();
            $table->string('sexo', 1)->default('M')->comment('M: Masculino F: Femenino');
            $table->string('foto', 120)->nullable()->comment('URL de foto');
            $table->string('paisnac', 32)->nullable()->comment('Pais de Nac');
            $table->string('depnac', 32)->nullable()->comment('Departamento de Nac');
            $table->string('provnac', 32)->nullable()->comment('Provincia de Nac');
            $table->string('locnac', 32)->nullable()->comment('Localidad de Nac');
            $table->date('fnacimiento');
            $table->string('oficialia', 12)->nullable();
            $table->string('libro', 12)->nullable();
            $table->string('partida', 12)->nullable();
            $table->string('folio', 12)->nullable();
            $table->string('provincia', 32)->nullable();
            $table->string('seccion', 32)->nullable();
            $table->string('localidad', 32)->nullable();
            $table->string('zona', 42)->nullable();
            $table->string('calle', 64)->nullable();
            $table->string('numero', 12)->nullable();
            $table->string('telefono', 12)->nullable();
            $table->string('pertenece', 32)->nullable()->comment('nacion pueblo');
            $table->string('nsalud', 32)->nullable()->comment('Centro Salud');
            $table->string('transporte', 32)->nullable();
            $table->string('tiempo', 32)->nullable()->comment('Tiempo max desplazamiento');
            $table->integer('estado')->default(1)->comment('1: activo 2: inactivo');
            $table->string('sie', 32)->nullable();
            $table->string('fnombre', 64);
            $table->string('nit', 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
