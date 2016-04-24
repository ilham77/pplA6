<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pekerjaan;
use App\SkillPekerjaan;

class PekerjaanController extends Controller
{
    public function insert(Request $request) {

    	$this->validate($request, [

    			'judul' 	=> 'required|alpha_num|max:255',
    			'deskripsi'	=> 'required',
    			'budget'	=> 'required|numeric',
    			'estimasi'	=> 'required',
    			'deadline'	=> 'required|date|after:now',
    			'skill'		=> 'required',

    		]);

    	$pekerjaan = new Pekerjaan;

    	$pekerjaan->judul 		= $request->judul;
    	$pekerjaan->deskripsi 	= $request->deskripsi;
    	$pekerjaan->budget		= $request->budget;
    	$pekerjaan->estimasi	= $request->estimasi;
    	$pekerjaan->deadline	= $request->deadline;

    	/* Disini perlu ada validasi terhadap jenis user
    	   Kalau UI atau pemiliki akun resmi, maka 'isVerified' = 1 */
    	$pekerjaan->isVerified 	= 1;

    	$pekerjaan->isDone		= 0;
    	$pekerjaan->isTaken		= 0;
    	$pekerjaan->isClosed	= 0;

    	$pekerjaan->save();

    	$arrSkill = explode(';', $request->skill);
    	foreach($arrSkill as $s){
    		$skill = new SkillPekerjaan;
    		$skill->skill = $s;
    		
    		$pekerjaan->skill()->save($skill);
    	}

    	return back();
    }
}
