<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCuMaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cu_ma', function (Blueprint $table) {
            $table->foreign(['codcurso'], 'cu_ma_ibfk_1')->references(['codigo'])->on('curso')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['codmateria'], 'cu_ma_ibfk_2')->references(['codigo'])->on('materia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cu_ma', function (Blueprint $table) {
            $table->dropForeign('cu_ma_ibfk_1');
            $table->dropForeign('cu_ma_ibfk_2');
        });
    }
}
