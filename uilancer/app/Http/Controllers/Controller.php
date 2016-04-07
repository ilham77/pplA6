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
    
    public function login(){
        SSO::Authenticate();
        $user=SSO::getUser();
       if(DB::table('mahasiswa')->where('npm','=',$user->npm)->get()){
           echo $user->name;
       }else{
            DB::table('mahasiswa')->insert([
                ['npm' => $user->npm,
                 'username' => $user->username,
                 'name' => $user->name, 
                 'org_code' => $user->org_code,  
                 'faculty' => $user->faculty,
                 'educational_program' => $user->educational_program]
            ]);
            
            return redirect('/');
        }

    }
    
    public function logout(){
        SSO::logout();
        return redirect('/');
    }
}
