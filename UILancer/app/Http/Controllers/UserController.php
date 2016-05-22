<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\SkillUser;
use App\User;
use App\ApplyManager;
use App\Pekerjaan;
use Auth;
use DB;
use Session;
use Hash;

class UserController extends Controller
{

	public function editForm() {
		if (Auth::user()){
			return view('edit');
		} else {
			return redirect('/');
		}
	}

    public function viewProfile() {
        if (Auth::user()){
            return view('dashboard');
        } else {
            return redirect('/');
        }
    }

    public function viewPublicProfile($user){
        $usr = User::findorFail($user);
        $skills = $usr->skill;
        return view('profile-public', compact('usr', 'skills'));
    }

    public function masuklogin(Request $request){

        $username = Input::get('username');
        $password = Input::get('password');
        $user= DB::table('users')->where([['username','=',$username]])->first();
        if($user===null){
            return redirect('/login')->withErrors(['Invalid email or password']);
        } else {
            $pwd = $user->password;
            if (Hash::check($password, $pwd)) {
                if($user->role == 'official'){
                    Auth::loginUsingId($user->id);
                    return redirect('/');
                } else {
                    return redirect('/login')->withErrors(['Invalid email or password']);
                }
            } else {
                return redirect('/login')->withErrors(['Invalid email or password']);
            }
        }

    }

    public function loginForm(){
        if(!Auth::check())
           return view('/login');
        else
            return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
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

        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $destinationPath = 'avatar';
            $fileName = $userid . "-avatar";
            $user->avatar = $fileName;
            $file->move($destinationPath, $fileName);
        }


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

    	return redirect('dashboard');
	}

    public function apply($pekerjaan, $freelancer)
    {
        if(Auth::user())
        {
            //1. PERHATIAN!!! bagian 'Auth::user()->id == $freelancer' bisa diapus kalo mau nyoba apply
            //2. Nyoba apply dengan inject url nya langsung, contoh : /apply/4/2

            if(Auth::user()->id == $freelancer)
            {
                $apply_manager = new ApplyManager;
                $apply_manager->status = 0;
                $apply_manager->pekerjaan_id = $pekerjaan;
                $apply_manager->user_id = $freelancer;
                $apply_manager->save();

                return redirect('pekerjaan/'.$pekerjaan)->withErrors(array('message' => 'Apply success'));
            }
            else
            {
                return redirect('pekerjaan/'.$pekerjaan);
            }
        }
        else
        {
            return redirect('/home');
        }
    }

    public function cancelApply($pekerjaan, $freelancer)
    {
        if(Auth::user())
        {
            //1. PERHATIAN!!! bagian 'Auth::user()->id == $freelancer' bisa diapus kalo mau nyoba apply
            //2. Nyoba apply dengan inject url nya langsung, contoh : /apply/4/2

            if(Auth::user()->id == $freelancer)
            {
                ApplyManager::where('pekerjaan_id',$pekerjaan)->where('user_id',$freelancer)->delete();

                return redirect('pekerjaan/'.$pekerjaan)->withErrors(array('message' => 'Apply canceled'));
            }
            else
            {
                return redirect('pekerjaan/'.$pekerjaan);
            }
        }
        else
        {
            return redirect('/home');
        }
    }

    public function onGoing($user)
    {
        return view('pekerjaan.ongoing');
    }
}
