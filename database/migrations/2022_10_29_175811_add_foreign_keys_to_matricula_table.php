<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matricula', function (Blueprint $table) {
            $table->foreign(['codusuario'], 'matricula_ibfk_1')->references(['codigo'])->on('usuario')->onDelete('CASCADE');
            $table->foreign(['codalumno'], 'matricula_ibfk_3')->references(['codigo'])->on('alumno')->onDelete('CASCADE');
            $table->foreign(['codcurso'], 'matricula_ibfk_2')->references(['codigo'])->on('curso')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matricula', function (Blueprint $table) {
            $table->dropForeign('matricula_ibfk_1');
            $table->dropForeign('matricula_ibfk_3');
            $table->dropForeign('matricula_ibfk_2');
        });
    }
}
