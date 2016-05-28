<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLuar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('user_luar', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('name');
            $table->string('asal_instansi');
            $table->string('email');
            $table->integer('no_telp')->unsigned();
            $table->integer('pekerjaan_id')->unsigned();
            $table->timestamps();
         });

        Schema::table('user_luar',function($table){
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
        Schema::drop('user_luar');
    }
}