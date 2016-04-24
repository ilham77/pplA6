<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSkillpekerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skillpekerjaan', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pekerjaan_id')->unsigned();
            $table->string('skill');
        });

        Schema::table('skillpekerjaan', function ($table) {
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skillpekerjaan');
    }
}
