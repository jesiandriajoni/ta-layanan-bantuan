<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldIdDivisiToTeknisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teknisis', function (Blueprint $table) {
            //
            $table->bigInteger('id_divisi')->unsigned()->index()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teknisis', function (Blueprint $table) {
            //
            $table->dropColumn('id_divisi');
        });
    }
}
