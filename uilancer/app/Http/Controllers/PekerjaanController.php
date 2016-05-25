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

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = Pekerjaan::where('isVerified',1);
        $pekerjaans = $pekerjaans->simplePaginate(10);

        foreach ($pekerjaans as $pekerjaan) {
            $tempHonor = strrev("".$pekerjaan->budget."");
            $tempHonor = str_split($tempHonor,3);
            $pekerjaan->budget = strrev(implode(".", $tempHonor));
        }

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

        $id_pelamar = Array();

        foreach($hasil->applyManager as $am) {
            array_push($id_pelamar, $am->user_id);
        }

        if (Auth::user()){
            return view('pekerjaan.halamanPekerjaan-dashboard',compact('hasil','hasill','jobGiver','jumlah_pelamar','id_pelamar'));
        } else {
            return view('pekerjaan.halamanPekerjaan',compact('hasil','hasill','jobGiver','jumlah_pelamar','id_pelamar'));
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
        if(Auth::user()->role == 'mahasiswa')
        {
            $pekerjaan->isVerified  = 0;
        }
        else
        {
            $pekerjaan->isVerified  = 1;
        }

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
        return redirect('post');
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
        return redirect('inbox');
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
                    foreach ($hasil as $pekerjaan) {
                        $tempHonor = strrev("".$pekerjaan->budget."");
                        $tempHonor = str_split($tempHonor,3);
                        $pekerjaan->budget = strrev(implode(".", $tempHonor));
                    }
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

            $hasil = $hasil->simplePaginate(10)->appends($request->all());
            return view('pekerjaan.searchPekerjaanFromDashboard')->with('pekerjaans',$hasil)->with('kunci',$request->kunci);
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

        return view('pekerjaan.ongoing',compact('freelancer_job','jobgiver_job'));
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
        $pelamar = $pekerjaan->applyManager;
        $i = 1;
        return view('pekerjaan.lihatPelamar',compact('pekerjaan','pelamar','i'));
    }

    public function done($pekerjaan)
    {
        $kerja = Pekerjaan::find($pekerjaan);
        $kerja->update(array('isDone' => 1));
        return redirect()->back();
    }

    public function confirm($pekerjaan)
    {
        $kerja = Pekerjaan::find($pekerjaan);
        $kerja->update(array('isClosed' => 1));
        $kerja = $kerja->applyManager->where('status',1);

        foreach ($kerja as $k) {
            $k->update(array('status' => 0));
        }

        return redirect()->back();
    }

}