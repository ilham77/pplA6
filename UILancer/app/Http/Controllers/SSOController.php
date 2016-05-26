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
               $newUser = User::    insert($user->name,$user->npm,$user->username, $user->org_code, $user->faculty, $user->role, $user->educational_program);
                \Auth::loginUsingId($newUser->id);
                return redirect('/')->with('npm', $user->npm);
             }
             else {
               $user = User::where('npm','=',$user->npm)->first();
               \Auth::loginUsingId($user->id);

               if ($user->role == 'blocked') {
                 return view('block');
               }
               return redirect('/')->with('npm', $user->npm);
             }
         } else {
            //SSO::logout();
           //  return view('home')->with('npm', $user->npm);
         }
     }

    public function logout(){
        \Auth::logout();
        //SSO::logout();
        return redirect('/');
    }

    public function logoutSSO(){
        SSO::logout();
    }
}

//pisah ke class SSOController