<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->integer('no_identitas')->unique();
            $table->integer('home');
            $table->integer('data');
            $table->integer('informasi');
            $table->integer('layanan_kunjungan');
            $table->integer('layanan_pengaduan');
            $table->integer('slide');
            $table->integer('backup_restore');
            $table->integer('gaji_tunkin');
            $table->integer('management_user');
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
        Schema::dropIfExists('menu');
    }
}
