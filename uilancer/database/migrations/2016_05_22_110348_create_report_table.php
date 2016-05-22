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
        Schema::create('report', function (Blueprint $table)
    {
            $table->increments('id');
            $table->string('keluhan');
            $table->integer('reported_id')->unsigned();
            $table->string('reported_name');
            $table->string('pelapor');
        });
        
         Schema::table('report',function($table){
            $table->foreign('reported_id')->references('id')->on('users');
    });
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