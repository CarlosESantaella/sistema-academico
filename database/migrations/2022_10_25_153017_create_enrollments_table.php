<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->integer('codigo', true);
            $table->dateTime('finscripcion');
            $table->integer('gestion');
            $table->integer('codalumno')->nullable()->index('codalumno');
            $table->integer('codcurso')->nullable()->index('codcurso');
            $table->integer('codusuario')->nullable()->index('codusuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
}
