<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenispengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenispengaduans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_divisi');
            $table->bigInteger('id_jenispengaduan');
            $table->string('nama_pengaduan',50);
            $table->string('jenis_pengaduan',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenispengaduans');
    }
}
