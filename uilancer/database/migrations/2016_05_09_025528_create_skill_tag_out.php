<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTagOut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('skill_out', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pekerjaan_out_id')->unsigned();
            $table->string('skill');
        });

        Schema::table('skill_out', function ($table) {
            $table->foreign('pekerjaan_out_id')->references('id')->on('pekerjaan_out');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
