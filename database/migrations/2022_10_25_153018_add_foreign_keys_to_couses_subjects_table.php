<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCousesSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('couses_subjects', function (Blueprint $table) {
            $table->foreign(['codcurso'], 'couses_subjects_ibfk_1')->references(['codigo'])->on('courses')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['codmateria'], 'couses_subjects_ibfk_2')->references(['codigo'])->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('couses_subjects', function (Blueprint $table) {
            $table->dropForeign('couses_subjects_ibfk_1');
            $table->dropForeign('couses_subjects_ibfk_2');
        });
    }
}
