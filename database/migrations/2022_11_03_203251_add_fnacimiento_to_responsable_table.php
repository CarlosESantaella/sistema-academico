<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responsable', function (Blueprint $table) {
            $table->timestamp('fnacimiento')->nullable()->after('ci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responsable', function (Blueprint $table) {
            $table->dropColumn('fnacimiento');
        });
    }
};
