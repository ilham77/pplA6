<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Auth;
use Validator;
use URL;
//use Hash;
use App\Http\Requests;
use App\Traits\CaptchaTrait;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;


class UserController extends Controller
{
    
  public function masuklogin(Request $request){

        $username = $request->username;
        $npm = $request->input('npm');
        $user = User::where('username','=',$username)
                ->get();
        //return $user;
            if($user){
                //correct username and password
                $id = $user->first();
                //$user = User::where('username','=',$user -> username)->first();
                Auth::loginUsingId($id);
               return view('home');
                 
            } 
        //gagal login
        return redirect('/login')->with('error','Invalid email or password');
    }
    public function loginForm(){
         if(!Auth::check())
           return view('/login');
        else
            return redirect('/');
    }
    public function logout(){
        \Auth::logout();
        //SSO::logout();
        return redirect('/');
    }
    
}
