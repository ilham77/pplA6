<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    
protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','npm','username','org_code','role',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id',
    ];
    
    public static function insert($name, $email, $npm, $username, $org_code, $faculty, $role){
     $user = new User();
     $user->name = $name;
     $user->email = $email;
     $user->npm = $npm; 
     $user->username = $username;
     $user->org_code = $org_code;
     $user->faculty=$faculty;
     $user->role = $role;
     $user->save();   
     return $user;
    }
    

    public static function get($npm){
    $user = User::find($npm);
    return $user;
    }
}
