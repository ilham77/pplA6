<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function(Blueprint $table){
           $table->increments('id');
           $table->string('npm');
           $table->string('username');
           $table->string('name');
           $table->string('org_code');
           $table->string('faculty');
           $table->string('educational_program');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mahasiwa');
    }
}

//migrate gabungin sama alvan