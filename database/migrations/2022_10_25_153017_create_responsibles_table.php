<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsibles', function (Blueprint $table) {
            $table->integer('codigo', true);
            $table->string('ci', 12)->nullable()->comment('Cedula de Identidad');
            $table->string('nombres', 32);
            $table->string('appaterno', 32);
            $table->string('apmaterno', 32);
            $table->string('idioma', 32)->nullable();
            $table->string('ocupacion', 32)->nullable();
            $table->string('ginstruccion', 32)->nullable()->comment('Grado de instruccion');
            $table->string('celular', 12)->nullable()->comment('Telefono movil');
            $table->string('telefono', 20)->nullable()->comment('Telefono fijo');
            $table->string('mail', 64)->nullable()->comment('Correo Electronico');
            $table->string('relacion', 32)->nullable()->comment('Parentesco con el estudiante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsibles');
    }
}
