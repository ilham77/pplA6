<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pekerjaan;
use App\SkillTagPekerjaan;
use App\User;
use App\ApplyManager;
use Auth;

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
        $hasil->endDate =  \Carbon\Carbon::parse($hasil->endDate)->format('M j, Y');

        $tempHonor = strrev("".$hasil->budget."");
        $tempHonor = str_split($tempHonor,3);
        $hasil->budget = strrev(implode(".", $tempHonor));

    	$hasill = $hasil->skillTag;

        $jobGiver = $hasil->user;

        $jumlah_pelamar = $hasil->applyManager->count();

        if (Auth::user()){
            return view('pekerjaan.halamanPekerjaan-dashboard',compact('hasil','hasill','jobGiver','jumlah_pelamar'));
        } else {
            return view('pekerjaan.halamanPekerjaan',compact('hasil','hasill','jobGiver','jumlah_pelamar'));
        }
    }

    public function bukaLowongan() {
        if (Auth::user()){
            return view('postlowongan');
        } else {
            return redirect('/');
        }
    }

    public function insertPekerjaan(Request $request)
    {
        $this->validate($request, [

                'judul'       => 'required|max:255',
                'deskripsiPekerjaan'   => 'required',
                'budget'      => 'required|numeric',
                'estimasi'    => 'required|numeric',
                'deadline'    => 'required|date|after:now',
                'skill'       => 'required',

            ]);

        $pekerjaan = new Pekerjaan;

        $pekerjaan->judul_pekerjaan       = $request->judul;
        $pekerjaan->deskripsi_pekerjaan   = $request->deskripsiPekerjaan;
        $pekerjaan->budget = $request->budget;
        $pekerjaan->durasi = $request->estimasi;
        $pekerjaan->endDate = $request->deadline;

        /* Disini perlu ada validasi terhadap jenis user
           Kalau UI atau pemiliki akun resmi, maka 'isVerified' = 1 */
        $pekerjaan->isVerified  = 1;

        $pekerjaan->isDone      = 0;
        $pekerjaan->isTaken     = 0;
        $pekerjaan->isClosed    = 0;

        $pekerjaan->user_id = Auth::user()->id;
        $pekerjaan->save();

        $arrSkill = explode(";", $request->skill);
        foreach($arrSkill as $as)
        {
            $skill = new SkillTagPekerjaan;
            $skill->pekerjaan_id = $pekerjaan->id;
            $skill->skill = $as;
            $skill->save();
        }
        return redirect('dashboard');
    }

    public function searchPekerjaan(Request $request)
    {
        $hasil = Pekerjaan::where(function ($query) use ($request){
                $query->where('judul_pekerjaan','LIKE','%'.$request->kunci.'%')
                      ->orWhere('deskripsi_pekerjaan','LIKE','%'.$request->kunci.'%')
                      ->orWhereHas('skillTag',function($query) use ($request){
                            $query->where('skill','LIKE','%'.$request->kunci.'%');
                        });
            })
        ->where('isVerified',1);

        if($request->flag == "nonDash")
        {
            $hasil = $hasil->simplePaginate(10)->appends($request->all());
            return view('pekerjaan.searchPekerjaan')->with('pekerjaans',$hasil)->with('kunci',$request->kunci);
        }
        else
        {

            if($request->minimumHonor && $request->maksimumHonor)
            {
                $hasil = $hasil->where(function ($query) use ($request){
                $query->where('budget','>=',$request->minimumHonor)
                      ->where('budget','<=',$request->maksimumHonor);
                });
            }
            else if($request->minimumHonor)
            {
                $hasil = $hasil->where('budget','>=',$request->minimumHonor);
            }

            else if($request->maksimumHonor)
            {
                $hasil = $hasil->where('budget','<=',$request->maksimumHonor);
            }

            if($request->durasi)
            {
                $hasil = $hasil->where('durasi',$request->durasi);
            }

            if($request->status)
            {
                if($request->status == "Done")
                {
                    $hasil = $hasil->where('isDone',1);
                }
                elseif ($request->status == "Lowong") {
                    $hasil = $hasil->where('isTaken',0);
                }
                elseif ($request->status == "Tutup") {
                    $hasil = $hasil->where('isClosed',1);
                }
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

            $hasil = $hasil->simplePaginate(10)->appends($request->all());
            return view('pekerjaan.searchPekerjaanFromDashboard')->with('pekerjaans',$hasil)->with('kunci',$request->kunci);
        }
    }
}