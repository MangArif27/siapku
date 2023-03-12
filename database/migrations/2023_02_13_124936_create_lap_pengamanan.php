<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapPengamanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lap_pengamanan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('jenis_laporan');
            $table->text('isi_laporan');
            $table->text('pos_pengamanan');     
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
        Schema::dropIfExists('lap_pengamanan');
    }
}