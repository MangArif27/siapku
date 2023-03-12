<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataWbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_wbp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_induk');
            $table->string('nama');
            $table->string('blok');
            $table->char('kamar');
            $table->string('kejahatan');
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
        Schema::dropIfExists('data_wbp');
    }
}
