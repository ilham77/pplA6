<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\SkillUser;
use App\User;
use Auth;
use Redirect;
use Session;

class UserController extends Controller
{

	public function editForm() {
		if (Auth::user()){
			return view('edit');
		} else {
			return redirect('/');
		}
	}

    public function editProfile(Request $request){

    	$this->validate($request, [
                'nama'		=> 'required',
                'email'		=> 'required|email',
                'tanggal'    => 'required|date',
                'deskripsi'    => 'required',
                'linkedin'       => 'url',
                'web'       => 'url',
                'skills'       => 'required',
                'avatar'	=> 'mimes:jpeg,bmp,png|max:2048',
                'cvresume'	=> 'mimes:pdf|max:4096',
            ]);

    	$user = Auth::user();

    	$user->name 			= $request->nama;
    	$user->email 			= $request->email;
    	$user->tempat_lahir 	= $request->tempat;
    	$user->tanggal_lahir 	= $request->tanggal;
    	$user->deskripsi		= $request->deskripsi;
    	$user->linkedin 		= $request->linkedin;
    	$user->web 				= $request->web;

    	$userid = $user->id;

		$file = $request->file('avatar');
		$destinationPath = 'avatar';
		$fileName = $userid . "-avatar";
		$user->avatar = $fileName;
        $file->move($destinationPath, $fileName);

        if ($request->hasFile('cvresume')){
        	$file = $request->file('cvresume');
			$destinationPath = 'cvresume';
			$extension = $file->getClientOriginalExtension();
			$fileName = $userid . "-cvresume." . $extension;
        	$file->move($destinationPath, $fileName);
        }

        $arrSkill = explode(";", $request->skills);
        foreach($arrSkill as $as)
        {
            $skill = new SkillUser;
            $skill->user_id = $user->id;
            $skill->skill = $as;
            $skill->save();
        }
  		
  		$user->save();

    	return redirect('/');
	}
}
