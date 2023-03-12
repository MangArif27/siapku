<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTunkir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_tunkir', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nip')->unique();
            $table->integer('rekening_tunkir');
            $table->string('penerimaan_bulan');
            $table->integer('potongan_bank');
            $table->integer('potongan_koperasi');
            $table->integer('reject_gaji');
            $table->integer('potongan_absen');
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
        Schema::dropIfExists('data_tunkir');
    }
}
