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
               $newUser = new User();
               User::insert($user->name,$user->$email,$user->password,$user->npm,$user->username,$user->org_code, $user->role);
                return view('home')->with('npm', $user->npm);
             }
         } else
           DB::table('mahasiswa')->where('npm','=',$user->npm)->update([
                    ['isLogged' => true]
                ]);
         
         //Auth::login(4);
          return view('home')->with('npm', $npm);
     }
    
    public function logout(){
         DB::table('mahasiswa')->where('npm','=',$user->npm)->update([
                    ['isLogged' => false]
                ]);
        return redirect ('/');
    }
}

//pisah ke class SSOController