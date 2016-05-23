<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Report;
use App\User;

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
        if($pelapor->role=="mahasiswa" or $pelapor->role=="admin"){
        $report->asal_instansi = $pelapor->faculty;
        }else{
        $report->asal_instansi = $pelapor->asal_instansi;
        }
        $report->pelapor = $pelapor->name;
        $report->save();
        return redirect('/profile/'.$user->id);
}

    public function detailReport($report)
    {
    $report = Report::findorFail($report);
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
            return view('admin.inbox');
        } else {
            return redirect('/');
        }
    } else {
        return view('notfound');
    }
  ;
    }
}
