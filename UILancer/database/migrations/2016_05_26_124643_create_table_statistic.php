<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStatistic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistic', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('tanggal');
            $table->integer('jml_freelancer')->unsigned;
            $table->integer('jml_job')->unsigned;
            $table->integer('jml_done')->unsigned;
            $table->integer('jml_report')->unsigned;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('statistic');
    }
}
