<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->foreign(['responsable'], 'curso_ibfk_1')->references(['codigo'])->on('usuario')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->dropForeign('curso_ibfk_1');
        });
    }
}
