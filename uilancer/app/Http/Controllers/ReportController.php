<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Report;
use App\User;
use App\UserLuar;

class ReportController extends Controller
{

    public function report(Request $request){
        $report = new Report();
        $user = User::find($request->user);
        $pelapor = Auth::user();
        $report->judul=$request->judul;
        $report->keluhan = $request->keluhan;
        $report->reported_id = $user->id;
        $report->reported_name = $user->name;


        /*buat userLuar ternyata masih banyak yang harus di handle
        1. bikin link buat diakses user luar
        2. isi linkya daftar pekerjaan doi
        3. dia bisa report user hanya dari halaman ongoing/riwayat yang udah done
        4. jadi fungsi buat user luar harusnya beda krn ada parameter tambahan (pekerjaan)
        NOTE: user luar hanya tersambung sama pekerjaan miliknya sendiri
        */
        if($pelapor->role=="mahasiswa" or $pelapor->role=="official") {
            $report->asal_instansi = $pelapor->faculty;
        }

        $report->pelapor = $pelapor->name;
        $report->save();
        return redirect('/profile/'.$user->id);
}

    public function detailReport($report)
    {
    $report = Report::find($report);
    if($report->exists()){
        if (Auth::user()->role="admin"){
            return view('report',compact('report'));
        } else {
            return redirect('/');
        }
    } else {
        return view('notfound');
    }
    }

     public function deleteReport($report)
    {
  $report=Report::find($report);
     if($report!=null){
        if (Auth::user()->role="admin"){
            $report->delete();
            return redirect('/inbox');
        } else {
            return redirect('/');
        }
    } else {
        return view('notfound');
    }
  ;
    }
}
