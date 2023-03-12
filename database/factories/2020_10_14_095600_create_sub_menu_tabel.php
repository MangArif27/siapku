<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenuTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menu', function (Blueprint $table) {
            $table->id();
            $table->integer('no_identitas')->unique();
            $table->integer('user');
            $table->integer('wbp');
            $table->integer('keluarga');
            $table->integer('kunjungan');
            $table->integer('integrasi');
            $table->integer('remisi');
            $table->integer('about');
            $table->integer('surat');
            $table->integer('print_surat');
            $table->integer('form_pengaduan');
            $table->integer('list_pengaduan');
            $table->integer('r_gaji');
            $table->integer('r_tunkin');
            $table->integer('print_slip');
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
        Schema::dropIfExists('sub_menu');
    }
}
