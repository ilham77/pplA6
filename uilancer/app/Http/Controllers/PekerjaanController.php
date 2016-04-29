<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pekerjaan;
<<<<<<< HEAD
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
        $this->validate($request, [

                'judul_pekerjaan'       => 'required|alpha_num|max:255',
                'deskripsi_pekerjaan'   => 'required',
                'startHonor'            => 'required|numeric',
                'endHonor'              => 'required|numeric',
                'durasi'                => 'required|numeric',
                'endDate'               => 'required|date|after:now',
                'skill'                 => 'required',

            ]);

        $pekerjaan = new Pekerjaan;

        $pekerjaan->judul_pekerjaan       = $request->judul_pekerjaan;
        $pekerjaan->deskripsi_pekerjaan   = $request->deskripsi_pekerjaan;
        $pekerjaan->startHonor = $request->startHonor;
        $pekerjaan->endHonor = $request->endHonor;
        $pekerjaan->durasi = $request->durasi;
        $pekerjaan->endDate = $request->endDate;

        /* Disini perlu ada validasi terhadap jenis user
           Kalau UI atau pemiliki akun resmi, maka 'isVerified' = 1 */
        $pekerjaan->isVerified  = 1;

        $pekerjaan->isDone      = 0;
        $pekerjaan->isTaken     = 0;
        $pekerjaan->isClosed    = 0;

        $pekerjaan->save();

        $arrSkill = explode(",", $request->skill_tag);
        foreach($arrSkill as $as)
        {
            $skill = new skillTag;
            $skill->pekerjaan_id = $pekerjaan->id;
            $skill->skill = $as;
            $skill->save();
        }
        return back();
    }

    public function searchPekerjaan(Request $request)
    {
        $hasil2 = SkillTag::where('skill','LIKE','%'.$request->kunci.'%')->get();

        $hasil = Pekerjaan::where(function ($query) use ($request,$hasil2){
                $query->where('judul_pekerjaan','LIKE','%'.$request->kunci.'%')
                      ->orWhere('deskripsi_pekerjaan','LIKE','%'.$request->kunci.'%')
                      ->orWhereIn('id',$hasil2->pluck('pekerjaan_id'));
            })
        ->where('isVerified',1);

        if($request->flag == "nonDash")
        {
            $hasil = $hasil->get();
            return view('pekerjaan.searchPekerjaan')->with('pekerjaans',$hasil)->with('kunci',$request->kunci);
        }
        else
        {

            if($request->minimumHonor && $request->maksimumHonor)
            {
                $hasil = $hasil->where(function ($query) use ($request){
                $query->where('startHonor','>=',$request->minimumHonor)
                      ->orWhere('endHonor','<=',$request->maksimumHonor);
                });
            }
            else if($request->minimumHonor)
            {
                $hasil = $hasil->where('startHonor','>=',$request->minimumHonor);
            }

            else if($request->maksimumHonor)
            {
                $hasil = $hasil->where('endHonor','<=',$request->maksimumHonor);
            }

            if($request->durasi)
            {
                $hasil = $hasil->where('durasi',$request->durasi);
            }

            if($request->minimumTgl && $request->maksimumTgl)
            {
                $MyDateCarbon = \Carbon\Carbon::parse($request->maksimumTgl);
                $MyDateCarbon->addDays(1);

                $hasil = $hasil->where(function ($query) use ($request,$MyDateCarbon){
                $query->whereBetween('created_at', [$request->minimumTgl, $MyDateCarbon]);
                });
            }
            else if($request->minimumTgl)
            {
                $hasil = $hasil->whereDate('created_at', '>=', $request->minimumTgl);
            }
            else if($request->maksimumTgl)
            {
                $MyDateCarbon = \Carbon\Carbon::parse($request->maksimumTgl);
                $MyDateCarbon->addDays(1);

                $hasil = $hasil->whereDate('created_at', '<=', $MyDateCarbon);
            }

            $hasil = $hasil->get();
            return view('pekerjaan.searchPekerjaanFromDashboard')->with('pekerjaans',$hasil)->with('kunci',$request->kunci);
        }
    }
}
=======
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
>>>>>>> post-lowongan-UI
