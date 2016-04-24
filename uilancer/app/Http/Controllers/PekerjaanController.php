<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pekerjaan;
use App\SkillTag;

class PekerjaanController extends Controller
{
    public function index()
    {
    	$pekerjaans = Pekerjaan::where('isVerified',1)->get();

    	return view('pekerjaan.listPekerjaan',compact('pekerjaans'));
    }

    public function detailPekerjaan($pekerjaan)
    {
    	$hasil = Pekerjaan::findorFail($pekerjaan);
    	$hasill = $hasil->skillTag;

    	return view('pekerjaan.halamanPekerjaan',compact('hasil','hasill'));
    }

    public function insertPekerjaan(Request $request)
    {   
        $pekerjaan = new pekerjaan;
        $pekerjaan->judul_pekerjaan = $request->judul_pekerjaan;
        $pekerjaan->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        $pekerjaan->isDone = 0;
        $pekerjaan->isTaken = 0;
        $pekerjaan->isVerified = $request->verifikasi;
        $pekerjaan->isClosed = 0;
        $pekerjaan->save();

        $arrSkill = explode(",", $request->skill_tag);
        foreach($arrSkill as $as)
        {
            $skill = new skillTag;
            $skill->pekerjaan_id = $pekerjaan->id;
            $skill->skill = $as;
            $skill->save();
        }


        return redirect('/insertPekerjaan');
    }

    public function searchPekerjaan(Request $request)
    {

        $hasil = Pekerjaan::where('judul_pekerjaan','LIKE','%'.$request->kunci.'%')
        ->orWhere('deskripsi_pekerjaan','LIKE','%'.$request->kunci.'%')
        ->get();

        $hasil = $hasil->where('isVerified',1);

        return view('pekerjaan.searchPekerjaan')->with('pekerjaans',$hasil)->with('kunci',$request->kunci);
    }

    public function searchPekerjaanFromDashboard(Request $request)
    {

        $hasil = Pekerjaan::where('judul_pekerjaan','LIKE','%'.$request->kunci.'%')
        ->orWhere('deskripsi_pekerjaan','LIKE','%'.$request->kunci.'%')
        ->get();

        $hasil = $hasil->where('isVerified',1);

        return view('pekerjaan.searchPekerjaanFromDashboard')->with('pekerjaans',$hasil)->with('kunci',$request->kunci);
    }
}
