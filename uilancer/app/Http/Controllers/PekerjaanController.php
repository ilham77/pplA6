<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pekerjaan;
use App\SkillTagPekerjaan;
use App\User;
use App\ApplyManager;
use Auth;
use App\UserLuar;
use App\Rating;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = Pekerjaan::whereHas('user', function ($query) {
            $query->where('role','official');
        })->where('isVerified',1)->where('isTaken',0)->orderBy('created_at','desc')->paginate(10,['*'],'page_a');

        foreach ($pekerjaans as $pekerjaan) {
            $tempHonor = strrev("".$pekerjaan->budget."");
            $tempHonor = str_split($tempHonor,3);
            $pekerjaan->budget = strrev(implode(".", $tempHonor));
        }

        $pekerjaanss = Pekerjaan::whereHas('user', function ($query) {
            $query->where('role','<>','official');
        })->where('isVerified',1)->where('isTaken',0)->orderBy('created_at','desc')->paginate(10,['*'],'page_b');

        foreach ($pekerjaanss as $pekerjaan) {
            $tempHonor = strrev("".$pekerjaan->budget."");
            $tempHonor = str_split($tempHonor,3);
            $pekerjaan->budget = strrev(implode(".", $tempHonor));
        }

        return view('pekerjaan.listPekerjaan',compact('pekerjaans','pekerjaanss'));
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

        $id_pelamar = Array();

        foreach($hasil->applyManager as $am) {
            array_push($id_pelamar, $am->user_id);
        }

        $userluar = UserLuar::all();

        if (Auth::user()){
            $statusUser = ApplyManager::where('user_id',Auth::user()->id)->where('pekerjaan_id',$pekerjaan)->first();
            return view('pekerjaan.halamanPekerjaan-dashboard',compact('hasil','hasill','jobGiver','jumlah_pelamar','id_pelamar','statusUser','userluar'));
        } else {
            return view('pekerjaan.halamanPekerjaan',compact('hasil','hasill','jobGiver','jumlah_pelamar','id_pelamar','userluar'));
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
            if($as != "") {
                $skill = new SkillTagPekerjaan;
                $skill->pekerjaan_id = $pekerjaan->id;
                $skill->skill = $as;
                $skill->save();
            }
        }
        return redirect('post');
    }

    public function editPekerjaan(Request $request, $id) {
         $hasil = Pekerjaan::where('id',$id)->first();
            $this->validate($request, [
                'judul'       => 'required',
                'deskripsiPekerjaan' => 'required',
                'skill' => 'required',
                'budget' => 'required|numeric',
                'estimasi' => 'required|numeric',
                'deadline' => 'required',
            ]);
            $hasil->judul_pekerjaan       = $request->judul;
            $hasil->deskripsi_pekerjaan   = $request->deskripsiPekerjaan;
            $hasil->budget = $request->budget;
            $hasil->durasi = $request->estimasi;
            $hasil->endDate = $request->deadline;
            $hasil->save();

            SkillTagPekerjaan::where('pekerjaan_id',$id)->delete();

            $arrSkill = explode(";", $request->skill);
            foreach($arrSkill as $as)
            {
                if($as != "")
                {
                    $skill = new SkillTagPekerjaan;
                    $skill->pekerjaan_id = $hasil->id;
                    $skill->skill = $as;
                    $skill->save();
                }
            }

            return redirect('postEdit');
    }

    public function editForm($id) {
        $pekerjaan = Pekerjaan::where('id',$id)->first();
        $skillTag = $pekerjaan->skilltag;
        $hasil = "";
        foreach ($skillTag as $st) {
            if ($st->skill != "") {
                $hasil = $hasil.$st->skill.";";
            }
        }
        return view('pekerjaan.editPekerjaan',compact('pekerjaan', 'hasil'));
    }

    public function verifyJob($idPekerjaan) {
        $pekerjaan = Pekerjaan::find($idPekerjaan);
        $pekerjaan->update(array('isVerified' => 1));
        return redirect('inbox');
    }

    public function unverifyJob($idPekerjaan) {
        $pekerjaan = Pekerjaan::find($idPekerjaan);
        $pekerjaan->update(array('isVerified' => 0));
        return redirect('inbox');
    }

    public function deleteJob(Pekerjaan $idPekerjaan) {
        foreach ($idPekerjaan->skillTag as $st) {
            $st->delete();
        }

        foreach ($idPekerjaan->applyManager as $am) {
            $am->delete();
        }

        foreach ($idPekerjaan->userluar as $ul) {
            $ul->delete();
        }

        $idPekerjaan->delete();
        return redirect('/');
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
        ->where('isVerified',1)->where('isTaken',0)->orderBy('created_at','desc');



        if(!Auth::check())
        {
            $hasil = $hasil->simplePaginate(10)->appends($request->all());
                    foreach ($hasil as $pekerjaan) {
                        $tempHonor = strrev("".$pekerjaan->budget."");
                        $tempHonor = str_split($tempHonor,3);
                        $pekerjaan->budget = strrev(implode(".", $tempHonor));
                    }
            return view('pekerjaan.searchPekerjaan')->with('pekerjaans',$hasil)->with('kunci',$request->kunci);
        }
        else
        {
            if ($request->pencari) {
                $hasil->whereHas('user',function($query) use ($request){
                            $query->where('name','LIKE','%'.$request->pencari.'%');
                });
            }


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

            foreach ($hasil as $pekerjaan) {
                        $tempHonor = strrev("".$pekerjaan->budget."");
                        $tempHonor = str_split($tempHonor,3);
                        $pekerjaan->budget = strrev(implode(".", $tempHonor));
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

            foreach ($hasil as $pekerjaan) {
                        $tempHonor = strrev("".$pekerjaan->budget."");
                        $tempHonor = str_split($tempHonor,3);
                        $pekerjaan->budget = strrev(implode(".", $tempHonor));
            }

            $result = $hasil->get();
            $pekerjaanOff = Array();
            $pekerjaanNon = Array();

            foreach ($result as $r) {
                $re = User::where('id',$r->user_id)->first();

                if($re->role == 'official')
                {
                    array_push($pekerjaanOff, $r);
                }
                else
                {
                    array_push($pekerjaanNon, $r);
                }
            }

            /*if ((($request->get('page_a', 1)-1) * 10)  + 10 > count($pekerjaanOff)) {
                $pekerjaanOff1 = array_slice($pekerjaanOff, ($request->get('page_a', 1)-1) * 10, 10);
            }
            else{
                $pekerjaanOff1 = array_slice($pekerjaanOff, ($request->get('page_a', 1)-1) * 10, 10);
            }*/

            $pekerjaanOff1 = array_slice($pekerjaanOff, ($request->get('page_a', 1)-1) * 10, 10);
            $pekerjaanNon1 = array_slice($pekerjaanNon, ($request->get('page_b', 1)-1) * 10, 10);

            $pekerjaanOff = new LengthAwarePaginator($pekerjaanOff, count($pekerjaanOff), 10, $request->get('page_a', 1), ['pageName' => 'page_a', 'query' => $request->all(), 'path' => url('searchPekerjaan')]);
            $pekerjaanNon = new LengthAwarePaginator($pekerjaanNon, count($pekerjaanNon), 10, $request->get('page_b', 1), ['pageName' => 'page_b', 'query' => $request->all(), 'path' => url('searchPekerjaan')]);


            return view('pekerjaan.searchPekerjaanFromDashboard',compact('pekerjaanOff','pekerjaanNon','pekerjaanOff1','pekerjaanNon1'))->with('kunci',$request->kunci);
        }
    }

    public function ongoing(User $user)
    {
        $freelancer_job = $user->applyManager->where('status', 1);

        foreach ($freelancer_job as $fj) {
            $tempHonor = strrev("".$fj->pekerjaan->budget."");
            $tempHonor = str_split($tempHonor,3);
            $fj->pekerjaan->budget = strrev(implode(".", $tempHonor));

            $fj->pekerjaan->endDate =  \Carbon\Carbon::parse($fj->pekerjaan->endDate)->format('M j, Y');
        }

        $job = $user->pekerjaan;
        $jobgiver_job = Array();

        foreach($job as $j)
        {
            $j = $j->applyManager->where('status', 1);

            foreach ($j as $jg) {
                $tempHonor = strrev("".$jg->pekerjaan->budget."");
                $tempHonor = str_split($tempHonor,3);
                $jg->pekerjaan->budget = strrev(implode(".", $tempHonor));

                $jg->pekerjaan->endDate =  \Carbon\Carbon::parse($jg->pekerjaan->endDate)->format('M j, Y');

                array_push($jobgiver_job, $jg);
            }
        }

        return view('pekerjaan.ongoing',compact('freelancer_job','jobgiver_job','user'));
    }

    public function postLowongan(Request $request){
        	$this->validate($request, [
                'name'		=> 'required',
                'asal_instansi' => 'required',
                'email'		=> 'required|email',
                'no_telp'   => 'required|numeric|min:6',
                'judul'       => 'required|max:255',
                'deskripsiPekerjaan'   => 'required',
                'budget'      => 'required|numeric',
                'estimasi'    => 'required|numeric',
                'deadline'    => 'required|date|after:now',
                'skill'       => 'required'
            ]);

        $pekerjaan = new Pekerjaan;

        $pekerjaan->judul_pekerjaan       = $request->judul;
        $pekerjaan->deskripsi_pekerjaan   = $request->deskripsiPekerjaan;
        $pekerjaan->budget = $request->budget;
        $pekerjaan->durasi = $request->estimasi;
        $pekerjaan->endDate = $request->deadline;
        $pekerjaan->user_id = '1';

        /* Disini perlu ada validasi terhadap jenis user
           Kalau UI atau pemiliki akun resmi, maka 'isVerified' = 1 */
        $pekerjaan->isVerified  = 0;

        $pekerjaan->isDone      = 0;
        $pekerjaan->isTaken     = 0;
        $pekerjaan->isClosed    = 0;

        $pekerjaan->save();

        $arrSkill = explode(";", $request->skill);
        foreach($arrSkill as $as)
        {
            $skill = new SkillTagPekerjaan;
            $skill->pekerjaan_id = $pekerjaan->id;
            $skill->skill = $as;
            $skill->save();
        }

        $user = new UserLuar;
        $user->name = $request->name;
        $user->asal_instansi=$request->asal_instansi;
        $user->email=$request->email;
        $user->no_telp=$request->no_telp;
        $user->pekerjaan_id = $pekerjaan->id;
        $user->save();

        return view('post');
    }

    public function lihatPelamar(Pekerjaan $pekerjaan)
    {
        $pelamar = $pekerjaan->applyManager->where('status',0);
        $i = 1;
        return view('pekerjaan.lihatPelamar',compact('pekerjaan','pelamar','i'));
    }

    public function rateTesti(Request $request, Pekerjaan $pekerjaan, User $user){
        if (Auth::user()->id != $pekerjaan->user_id) {
            return redirect('home');
        }
        $rating = new Rating;

        $rating->freelancer = $user->id;
        $rating->job_giver = Auth::user()->id;
        $rating->pekerjaan = $pekerjaan->id;

        $rating->rating = $request->rating;
        $rating->testimoni = $request->testimoni;

        $pekerjaan->update(array('isClosed' => 1));
        $pekerjaan = $pekerjaan->applyManager->where('status',1);

        foreach ($pekerjaan as $k) {
            $k->update(array('status' => 0));
        }

        $rating->save();
        return redirect('ongoing/'. Auth::user()->id);
    }

    public function done(Pekerjaan $pekerjaan)
    {
        $kerja_id = ApplyManager::where('pekerjaan_id',$pekerjaan->id)->where('status',1)->lists('user_id')->toArray();

        if (!in_array(Auth::user()->id, $kerja_id)) {
            return redirect('home');
        }

        $pekerjaan->update(array('isDone' => 1));
        return redirect('ongoing/'.Auth::user()->id);
    }

    public function confirm(Pekerjaan $pekerjaan)
    {
        if (Auth::user()->id != $pekerjaan->user_id) {
            return redirect('home');
        }

        $pekerjaan->update(array('isClosed' => 1));
        $pekerjaan = $pekerjaan->applyManager->where('status',1);

        foreach ($pekerjaan as $k) {
            $k->update(array('status' => 0));
        }

        return redirect('ongoing/'.Auth::user()->id);
    }

}