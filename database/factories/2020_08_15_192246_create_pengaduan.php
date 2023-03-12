<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik')->unique();
            $table->date('tanggal');
            $table->string('judul');
            $table->string('jenis');
            $table->string('isi_pengaduan');
            $table->string('bukti_pertama');
            $table->string('bukti_kedua');
            $table->string('alasan');
            $table->string('status_pengaduan');
            $table->string('status_bukti');
            $table->string('file_pembuktian');
            $table->string('alasan_pembuktian');
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
        Schema::dropIfExists('pengaduan_tabel');
    }
}
