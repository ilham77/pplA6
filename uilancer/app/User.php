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
        'name', 'email', 'password','npm','username','org_code','role', 'deskripsi', 'ketertarikan', 'linkedin', 'skill_tag'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id', 'avatar'
    ];
    
    public static function insert($name, $npm, $username, $org_code, $faculty, $role, $educational_program){
     $user = new User();
     $user->name = $name;
     $user->npm = $npm; 
     $user->username = $username;
     $user->org_code = $org_code;
     $user->faculty=$faculty;
     $user->role = $role;
     $user->educational_program = $educational_program;
     $user->save();   
     return $user;
    }
    

    public static function get($npm){
    $user = User::find($npm);
    return $user;
    }
}
