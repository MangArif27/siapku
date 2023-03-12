<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik')->unique();
            $table->string('nama');
            $table->char('jenis_kelamin');
            $table->text('alamat');
            $table->integer('no_hp');
            $table->string('email')->unique();
            $table->string('scan_ktp');
            $table->string('photo');
            $table->char('level');
            $table->char('status');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
