<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDictaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dicta', function (Blueprint $table) {
            $table->foreign(['idmateria'], 'dicta_ibfk_2')->references(['codigo'])->on('materia');
            $table->foreign(['idusuario'], 'dicta_ibfk_1')->references(['codigo'])->on('usuario');
            $table->foreign(['idcurso'], 'dicta_ibfk_3')->references(['codigo'])->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dicta', function (Blueprint $table) {
            $table->dropForeign('dicta_ibfk_2');
            $table->dropForeign('dicta_ibfk_1');
            $table->dropForeign('dicta_ibfk_3');
        });
    }
}
