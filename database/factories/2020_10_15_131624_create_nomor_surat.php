<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomorSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomor_surat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_identitas');
            $table->date('tgl_surat');
            $table->string('no_surat');
            $table->string('perihal');
            $table->string('surat_kpd');
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
        Schema::dropIfExists('nomor_surat');
    }
}
