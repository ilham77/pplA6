<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('judul_pekerjaan');
            $table->string('deskripsi_pekerjaan');
            $table->boolean('isDone');
            $table->boolean('isTaken');
            $table->boolean('isVerified');
            $table->boolean('isClosed');
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
        Schema::drop('pekerjaan');
    }
}
