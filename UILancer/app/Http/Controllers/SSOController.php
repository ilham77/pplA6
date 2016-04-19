<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use SSO\SSO;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SSOController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 
     public function login(){
          SSO::Authenticate();
        $user=SSO::getUser();
         if(SSO::check()){
            
             if((!DB::table('users')->where('npm','=',$user->npm)->get())){ 
               $newUser = User::insert($user->name,"",$user->npm,$user->org_code,$user->username, $user->faculty, $user->role);
                \Auth::loginUsingId($newUser->id);
                return view('home')->with('npm', $user->npm);
             } else {
               $user = User::where('npm','=',$user->npm)->first();
               \Auth::loginUsingId($user->id);
               return view('home')->with('npm', $user->npm);
             }
         } else {
            //SSO::logout();
           //  return view('home')->with('npm', $user->npm);
         }
     }
    
    public function logout(){
        \Auth::logout();
        return redirect('/');
    }
}

//pisah ke class SSOController