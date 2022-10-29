<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLibretaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('libreta', function (Blueprint $table) {
            $table->foreign(['codigo'], 'libreta_ibfk_1')->references(['codigo'])->on('matricula')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('libreta', function (Blueprint $table) {
            $table->dropForeign('libreta_ibfk_1');
        });
    }
}
