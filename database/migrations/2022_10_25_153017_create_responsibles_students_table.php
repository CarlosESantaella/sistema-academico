<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsiblesStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsibles_students', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('codalumno')->nullable()->index('codalumno')->comment('Codigo Alumno');
            $table->integer('codresponsable')->nullable()->index('codresponsable')->comment('Codigo Responsable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsibles_students');
    }
}
