<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Scheme::create('report', function (Blueprint $table)){
            $table->increments('id');
            $table->string('keluhan');
            $table->integer('user_id')->unsigned();
        }
        
         Schema::table('users',function($table){
            $table->foreign('user_id')->references('id')->on('users');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('report');
    }
}
