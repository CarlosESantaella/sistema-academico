<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->foreign(['codlibreta'], 'notes_ibfk_1')->references(['codigo'])->on('logbook')->onDelete('CASCADE');
            $table->foreign(['codmateria'], 'notes_ibfk_2')->references(['codigo'])->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign('notes_ibfk_1');
            $table->dropForeign('notes_ibfk_2');
        });
    }
}
