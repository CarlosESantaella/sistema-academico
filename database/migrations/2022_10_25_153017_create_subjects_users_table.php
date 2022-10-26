<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects_users', function (Blueprint $table) {
            $table->integer('idusuario')->index('idusuario');
            $table->integer('idmateria')->index('idmateria');
            $table->integer('idcurso')->index('idcurso');
            $table->integer('periodo')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects_users');
    }
}
