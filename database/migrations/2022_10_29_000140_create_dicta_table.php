<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dicta', function (Blueprint $table) {
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
        Schema::dropIfExists('dicta');
    }
}
