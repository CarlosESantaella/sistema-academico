<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('codigo', true);
            $table->string('appaterno', 22)->nullable();
            $table->string('apmaterno', 22)->nullable();
            $table->string('nombres', 22);
            $table->string('clave');
            $table->string('direccion', 108)->nullable()->comment('domicilio');
            $table->string('telefono', 12)->nullable()->comment('fijo o celular');
            $table->date('fnacimiento')->comment('Fecha de nacimiento');
            $table->string('especialidad', 64)->nullable()->comment('Solo profesores');
            $table->integer('tipo')->default(1)->comment('0: admin 1: profesor 2:secretaria');
            $table->string('mail', 32)->nullable()->comment('Correo Electronico');
            $table->string('foto', 220)->nullable();
            $table->string('ci', 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
