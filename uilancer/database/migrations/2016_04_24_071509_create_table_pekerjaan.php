<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePekerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('judul');
            $table->string('deskripsi');
            $table->integer('budget')->unsigned();
            $table->date('deadline');
            $table->integer('estimasi')->unsigned();
            $table->boolean('isVerified');
            $table->boolean('isDone');
            $table->boolean('isTaken');
            $table->boolean('isClosed');
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
