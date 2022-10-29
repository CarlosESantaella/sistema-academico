<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->integer('codlibreta')->index('codlibreta');
            $table->integer('codmateria')->index('codmateria');
            $table->double('eval1', 10, 2)->default(0)->comment('evaluacion');
            $table->double('eval2', 10, 2)->default(0)->comment('evaluacion');
            $table->double('bim1', 10, 2)->default(0)->comment('nota bimestral 1');
            $table->double('eval3', 10, 2)->default(0)->comment('evaluacion');
            $table->double('eval4', 10, 2)->default(0)->comment('evaluacion');
            $table->double('bim2', 10, 2)->default(0)->comment('nota bimestral 2');
            $table->double('eval5', 10, 2)->default(0)->comment('evaluacion');
            $table->double('eval6', 10, 2)->default(0)->comment('evaluacion');
            $table->double('bim3', 10, 2)->default(0)->comment('nota bimestral 3');
            $table->double('eval7', 10, 2)->default(0)->comment('evaluacion');
            $table->double('eval8', 10, 2)->default(0)->comment('evaluacion');
            $table->double('bim4', 10, 2)->default(0)->comment('nota bimestral 4');
            $table->double('pa', 10, 2)->default(0)->comment('promedio anual');
            $table->double('pr', 10, 2)->default(0)->comment('promedio reforzamiento');
            $table->double('pf', 10, 2)->default(0)->comment('promedio final');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
