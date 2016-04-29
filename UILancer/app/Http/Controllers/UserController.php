<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Auth;
use Validator;
use URL;
use Hash;
use App\Http\Requests;
use App\Traits\CaptchaTrait;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;


class UserController extends Controller
{
    
  public function masuklogin(Request $request){
    
        $username = $request->input('username');
        $password = $request->input('password');

        
            if(Auth::attempt(['username'=>$username,'password'=>$password])){
                //correct username and password
                $user = User::where('username','=',$user->username)->first();
                \Auth::loginUsingId($user->id);
               return view('home')->with('username', $user->username);
                
             
            } 
        //gagal login
        return redirect('/login')->with('error','Invalid email or password');
    }
    public function loginForm(){
         if(!Auth::check())
           return view('home.login');
        else
            return redirect('/');
    }
    public function logout(){
        \Auth::logout();
        //SSO::logout();
        return redirect('/');
    }
    
}
