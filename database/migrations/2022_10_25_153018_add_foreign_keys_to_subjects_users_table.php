<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSubjectsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects_users', function (Blueprint $table) {
            $table->foreign(['idusuario'], 'subjects_users_ibfk_1')->references(['codigo'])->on('users');
            $table->foreign(['idcurso'], 'subjects_users_ibfk_3')->references(['codigo'])->on('courses');
            $table->foreign(['idmateria'], 'subjects_users_ibfk_2')->references(['codigo'])->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects_users', function (Blueprint $table) {
            $table->dropForeign('subjects_users_ibfk_1');
            $table->dropForeign('subjects_users_ibfk_3');
            $table->dropForeign('subjects_users_ibfk_2');
        });
    }
}
