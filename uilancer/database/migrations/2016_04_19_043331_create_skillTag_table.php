<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skillTag_pekerjaan', function (Blueprint $table) {
            $table->increments('id',true);
            $table->integer('pekerjaan_id')->unsigned();
            $table->string('skill');
            $table->timestamps();
        });

        Schema::table('skillTag_pekerjaan',function($table){
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skillTag_pekerjaan');
    }
}
