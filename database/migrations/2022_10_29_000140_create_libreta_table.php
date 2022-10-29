<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibretaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libreta', function (Blueprint $table) {
            $table->integer('codigo')->primary();
            $table->integer('aus')->default(0)->comment('total ausencias');
            $table->integer('atr')->default(0)->comment('total atrazos');
            $table->integer('con')->default(0)->comment('conducta');
            $table->integer('aplz')->default(0)->comment('total aplazos');
            $table->double('prom', 10, 2)->comment('promedio general');
            $table->decimal('promeval1', 10)->default(0)->comment('Promedio Eval 1');
            $table->decimal('promeval2', 10)->default(0)->comment('Promedio Eval 2');
            $table->decimal('prombim1', 10)->default(0)->comment('Promedio Bimestre 1');
            $table->decimal('promeval3', 10)->default(0)->comment('Promedio Eval 3');
            $table->decimal('promeval4', 10)->default(0)->comment('Promedio Eval 4');
            $table->decimal('prombim2', 10)->default(0)->comment('Promedio Bimestre 2');
            $table->decimal('promeval5', 10)->default(0)->comment('Promedio Eval 5');
            $table->decimal('promeval6', 10)->default(0)->comment('Promedio Eval 6');
            $table->decimal('prombim3', 10)->default(0)->comment('Promedio Bimestre 3');
            $table->decimal('promeval7', 10)->default(0)->comment('Promedio Eval 7');
            $table->decimal('promeval8', 10)->default(0)->comment('Promedio Eval 8');
            $table->decimal('prombim4', 10)->default(0)->comment('Promedio Bimestre 4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libreta');
    }
}
