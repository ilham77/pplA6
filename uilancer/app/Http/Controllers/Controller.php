<?php

namespace App\Http\Controllers;
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
        echo $user->username . "</br>";
        echo $user->name;
        echo "<!DOCTYPE html><html><head></head><body></br><a href=\"".url('logout')."\">LOGOUT</a></body></html>";

    }
    
    public function logout(){
        SSO::logout();
        return redirect('/');
    }
}
