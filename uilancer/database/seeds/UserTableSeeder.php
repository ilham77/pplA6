// app/database/seeds/UserTableSeeder.php

use Illuminate/Database/Seeder;
use Illuminate/Database/Eloquent/Model;

<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    $user = array(
        array('name'=>'Anto','email'=>'anto@gmail.com','password'=> Hash::make('awesome'))
    );
//    User::create(array(
//        'name'     => 'anto',
//        'username' => 'anto69',
//        'email'    => 'antoks@holes.com',
//        'password' => Hash::make('awesome'),
//    ));

    DB::table('users')->insert($anggota);
}
}