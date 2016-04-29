<?php

namespace App\Http\Controllers;
use DB;
use SSO\SSO;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Input;
use Validator;
use Redirect;
use Request;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
 public function editProfile(Request $request){
		$user = \Auth::user();
        //$user = $user->id;
		$user = User::find($user);
		$email = $user->email;
		$name = $request->input('name');
		$address = $request->input('address');
        $phone = $request->input('phone');
		$desc = $request->input('description');
		//cek foto
		if($request->hasFile('picture'))
		{
			$file = $request->file('picture');
			$validator = Validator::make(array('file'=>$file),[
				'file' => 'image|max:2000',
			]);
			if($validator->fails())
				return redirect('/profile')->withErrors($validator);
			$destinationPath = 'engine/userimage';
			$extension = $file->getClientOriginalExtension();
			$fileName = $email.'.'.$extension;
            Storage::put('userimage/'.$fileName,
                file_get_contents($file->getRealPath()));
			//$file->move($destinationPath,$fileName);
			$user->avatar=$fileName;
		}
		$validator = Validator::make($request->all(),[
            'phone' => 'numeric',
            'name' => 'min:3|max:16',
        ],[
            'numeric'=>'Only numbers are allowed for :attribute',
            'min'=>'Your :attribute must be 3 characters or more',
			'max'=>'Your :attribute must be less than 16 characters',
        ]);
        if ($validator->fails()) {
            return redirect('/profile')
                    ->withErrors($validator);
        }
        $user->name = $name;
        $user->phone = $phone;
		$user->description = $desc;
		$user->address = $address;
		$user->save();
		return redirect('/profile');
	}
}
