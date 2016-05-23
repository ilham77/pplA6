<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pekerjaan;
use App\Report;
use App\User;

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

        $user->name      = $request->namaPemilikAkun;
        $user->password      = $request->password;
        $user->email     = $request->email;
        $user->role = $request->role;

        if ($user->password == $request->password) {
        	$user->save();
			return redirect('inbox');
        }

        return view('admin.createUser');
    }
    
    
    
}
