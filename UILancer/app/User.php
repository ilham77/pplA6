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
        'name', 'email','npm','username', 'password','org_code','role', 'phone', 'deskripsi', 'ketertarikan', 'linkedin', 'avatar', 'cvresume', 'tanggal_lahir', 'tempat_lahir', 'pekerjaan'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id'
    ];

    public function skill() {
        return $this->hasMany(SkillUser::class);
    }

    public function pekerjaan() {
        return $this->hasMany(Pekerjaan::class);
    }

    public function applyManager() {
        return $this->hasMany(ApplyManager::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class, 'freelancer');
    }

    public function rates(){
        return $this->hasMany(Rating::class, 'job_giver');
    }

    public function getRating(){
        return $this->ratings()->avg('rating');
    }

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

    public static function setPassword($password){
     //$password = Hash::make('secret');
     $user->password = $password;
     $user->save();
    }
}
