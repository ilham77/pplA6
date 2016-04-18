<?php

namespace App\Http\Controllers;
use DB;
use SSO\SSO;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
   /** public function home(){
        if(SSO::check()){
            $user = SSO::getUser();
            $name = $user->name;
            $npm = $user->npm;
            
            return view('home')
                ->with('npm',$npm)
                ->with('name',$name);
        }
    }**/
    
    
     public function login(){
         if(SSO::check()){
             SSO::Authenticate();
             $user=SSO::getUser();
             if((!DB::table('mahasiswa')->where('npm','=',$user->npm)->get())){ 

               $newUser = User::insert($user->name,$user->$email,$user->password,$user->npm,$user->username,$user->org_code, $user->role);
                Auth::login($newUser->id);
                return view('home')->with('npm', $user->npm);
             } else {
               $user = User::get($user->npm);
               Auth::login($user->id);
               return view('home')->with('npm', $npm);
             }
         }
     }
    
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

//pisah ke class SSOController