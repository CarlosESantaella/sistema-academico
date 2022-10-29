<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->integer('codigo', true)->comment('Codigo interno de curso');
            $table->string('nivel', 32);
            $table->string('grado', 32);
            $table->string('gnumeral', 12)->nullable();
            $table->string('paralelo', 32);
            $table->string('turno', 32)->nullable();
            $table->integer('responsable')->nullable()->index('responsable')->comment('Codigo de profesor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso');
    }
}
