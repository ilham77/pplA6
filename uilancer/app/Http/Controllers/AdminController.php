<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pekerjaan;
use App\Report;
use App\User;
use Hash;

class AdminController extends Controller
{
    public function index()
    {
       $reports = Report::all();
       $pekerjaan = Pekerjaan::where('isVerified',0)->paginate(10);
        return view('admin.inbox',compact('pekerjaan','reports'));
    }

    public function createUser(Request $request){
        	$this->validate($request, [
                'namaPemilikAkun'		=> 'required',
                'password' => 'required',
                'confirmPassword' => 'required',
                'email'		=> 'required|email',
                // 'no_telp'   => 'required|numeric|min:6',
                'role'       => 'required',
            ]);

        $user = new User;

        // Available alpha caracters
        $characters = '1234567890';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $npm = str_shuffle($pin);


        $user->name      = $request->namaPemilikAkun;

        $hashPassword = hash('md5',$request->password);
        $hashConfirmed = hash('md5',$request->confirmPassword);
        $user->npm = $npm;
        $user->password = $hashPassword;

        $user->email     = $request->email;
        $user->role = $request->role;

        if ($hashPassword == $hashConfirmed) {
        	$user->save();
			return redirect('inbox');
        }

        return view('admin.createUser');
    }
    
    
    
}
