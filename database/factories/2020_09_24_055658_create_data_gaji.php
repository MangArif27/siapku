<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataGaji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_gaji', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nip')->unique();
            $table->integer('rekening_gaji');
            $table->integer('gaji_pokok');
            $table->string('penerimaan_bulan');
            $table->integer('potongan_bank');
            $table->integer('potongan_koperasi');
            $table->integer('potongan_dw');
            $table->integer('arisan_dw');
            $table->integer('simpanan_koperasi');
            $table->integer('porpasos');
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
        Schema::dropIfExists('data_gaji');
    }
}
