<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Auth;
use Validator;
use URL;
use Session;
//use Hash;
use App\Http\Requests;
use App\Traits\CaptchaTrait;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    
    public function masuklogin(Request $request){

        $username = Input::get('username');
        $password = Input::get('password');
        //echo($username);
        //echo('a');
        $user= DB::table('users')->where([['username','=',$username],['password','=',$password]])->first();
        if($user===null){
            return redirect('/login')->with('error','Invalid email or password');
            //return view('home');
            }
        if($user->role='official'){
            //correct username and password
            //$user = User::where('username','=',$user ->username)->first();
            Auth::loginUsingId($user->id);
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
