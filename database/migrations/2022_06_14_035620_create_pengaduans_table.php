<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_instansi',100);
            $table->text('keterangan');
            $table->string('foto',100);
            $table->bigInteger('id_teknisi');
            $table->dateTime('timestart');
            $table->dateTime('timesend');
            $table->enum('status',['waiting','doing','done']);
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
        Schema::dropIfExists('pengaduans');
    }
}
