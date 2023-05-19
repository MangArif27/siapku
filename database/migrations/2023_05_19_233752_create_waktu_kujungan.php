<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaktuKujungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waktu_kujungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wbp');
            $table->string('kamar_wbp');
            $table->string('waktu');
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
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
        Schema::dropIfExists('waktu_kujungan');
    }
}
