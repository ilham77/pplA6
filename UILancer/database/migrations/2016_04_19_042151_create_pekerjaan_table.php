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

            $table->integer('budget');
            $table->date('endDate');
            $table->integer('durasi');

            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('pekerjaan',function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
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
