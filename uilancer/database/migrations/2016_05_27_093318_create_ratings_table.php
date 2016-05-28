<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('freelancer')->unsigned();
            $table->integer('pekerjaan')->unsigned();
            $table->integer('job_giver')->unsigned();
            $table->double('rating', 5, 1)->unsigned();
            $table->string('testimoni');
        });

        Schema::table('ratings', function($table){
            $table->foreign('freelancer')->references('id')->on('users');
            $table->foreign('pekerjaan')->references('id')->on('pekerjaan');
            $table->foreign('job_giver')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}
