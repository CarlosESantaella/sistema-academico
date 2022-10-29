<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control', function (Blueprint $table) {
            $table->integer('codigo', true);
            $table->integer('neval')->default(0)->comment('Numero de evaluacion');
            $table->integer('indice1')->default(0);
            $table->integer('indice2')->default(0);
            $table->integer('indice3')->default(0);
            $table->integer('indice4')->default(0);
            $table->integer('indice5')->default(0);
            $table->integer('aus')->default(0)->comment('ausencias');
            $table->integer('atr')->default(0)->comment('atrazos');
            $table->integer('con')->default(0)->comment('conducta');
            $table->integer('codlibreta')->index('codlibreta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control');
    }
}
