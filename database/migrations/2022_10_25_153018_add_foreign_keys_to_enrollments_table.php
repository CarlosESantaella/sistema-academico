<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->foreign(['codusuario'], 'enrollments_ibfk_1')->references(['codigo'])->on('users')->onDelete('CASCADE');
            $table->foreign(['codalumno'], 'enrollments_ibfk_3')->references(['codigo'])->on('students')->onDelete('CASCADE');
            $table->foreign(['codcurso'], 'enrollments_ibfk_2')->references(['codigo'])->on('courses')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropForeign('enrollments_ibfk_1');
            $table->dropForeign('enrollments_ibfk_3');
            $table->dropForeign('enrollments_ibfk_2');
        });
    }
}
