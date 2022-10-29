<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ra', function (Blueprint $table) {
            $table->foreign(['codalumno'], 'ra_ibfk_4')->references(['codigo'])->on('alumno')->onDelete('CASCADE');
            $table->foreign(['codresponsable'], 'ra_ibfk_3')->references(['codigo'])->on('responsable')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ra', function (Blueprint $table) {
            $table->dropForeign('ra_ibfk_4');
            $table->dropForeign('ra_ibfk_3');
        });
    }
}
