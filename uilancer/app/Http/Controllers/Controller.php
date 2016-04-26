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
    public function showLogin()
    {
        // show the form
        return View::make('login');
    }

    public function doLogin()
    {
    // validate the info, create rules for the inputs
    $rules = array(
        'email'    => 'required|email', // make sure the email is an actual email
        'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    );

    // run the validation rules on the inputs from the form
    $validator = Validator::make(Input::all(), $rules);

    // if the validator fails, redirect back to the form
    if ($validator->fails()) {
        return Redirect::to('login')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    } else {

        // create our user data for the authentication
        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {

            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            echo 'SUCCESS!';

        } else {        

            // validation not successful, send back to form 
            return Redirect::to('login');

        }

}
    }
    public function logout(){
        SSO::logout();
        return redirect('/');
    }
}
