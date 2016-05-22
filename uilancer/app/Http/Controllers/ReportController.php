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
        $report->keluhan = $request->keluhan;
        $report->reported_id = $user->id;
        $report->reported_name = $user->name;
        if($pelapor->name==null)
        $report->pelapor = "";
        else
        $report->pelapor = $pelapor->name;
        $report->save();
        return redirect('/profile/'.$user->id);
    }
}