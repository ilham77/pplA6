<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTagUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('skill_tag_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unassigned();
            $table->string('skill');
        });
        
             Schema::table('skill_tag_user',function($table){
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                Schema::drop('users');
    }
}

