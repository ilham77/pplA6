<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('npm');
            $table->string('username');
            $table->string('password');
            $table->string('org_code');
            $table->string('faculty');
            $table->string('educational_program');
            $table->string('role');
            $table->string('avatar');
            $table->string('cvresume');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('deskripsi');
            $table->string('ketertarikan');
            $table->string('linkedin');
            $table->string('web');
            $table->rememberToken();
            $table->timestamps();
        });

         DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'email' => 'ask@uilancer.com',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            )
        );
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
