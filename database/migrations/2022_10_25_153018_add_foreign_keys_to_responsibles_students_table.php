<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResponsiblesStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responsibles_students', function (Blueprint $table) {
            $table->foreign(['codresponsable'], 'responsibles_students_ibfk_3')->references(['codigo'])->on('responsibles')->onDelete('CASCADE');
            $table->foreign(['codalumno'], 'responsibles_students_ibfk_4')->references(['codigo'])->on('students')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responsibles_students', function (Blueprint $table) {
            $table->dropForeign('responsibles_students_ibfk_3');
            $table->dropForeign('responsibles_students_ibfk_4');
        });
    }
}
