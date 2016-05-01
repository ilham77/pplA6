<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Session;

class UserController extends Controller
{
    public function editProfile(Request $request){
		$file = $request->file('avatar');
		$destinationPath = 'avatar';
		$extension = $file->getClientOriginalExtension();
		$fileName = "test." . $extension;
        $file->move($destinationPath, $fileName);
  		$file = $request->file('cvresume');
		$destinationPath = 'cvresume';
		$extension = $file->getClientOriginalExtension();
		$fileName = "cv." . $extension;
        $file->move($destinationPath, $fileName);
    	return redirect('/');
	}
}
