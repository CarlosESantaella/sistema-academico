<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->foreign(['codmateria'], 'notas_ibfk_2')->references(['codigo'])->on('materia');
            $table->foreign(['codlibreta'], 'notas_ibfk_1')->references(['codigo'])->on('libreta')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->dropForeign('notas_ibfk_2');
            $table->dropForeign('notas_ibfk_1');
        });
    }
}
