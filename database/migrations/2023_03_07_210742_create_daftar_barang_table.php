<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('merk');
            $table->string('kode_barang');
            $table->date('tahun_perolehan');
            $table->string('jumlah');
            $table->string('penguasaan');
            $table->string('keterangan');
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
        Schema::dropIfExists('daftar_barang');
    }
}
