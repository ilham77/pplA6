<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Report;
use App\User;

class ReportController extends Controller
{

    public function report(Request $request, $user, $pelapor){
        $report = new Report();
        $user = findorFail($user);
        $pelapor = findorFail($pelapor);
        $report->keluhan = $request->keluhan;
        $report->reported_id = $user->id;
        $report->reported_name = $user->name;
        if($pelapor->name==null)
        $report->pelapor = "";
        else
        $report->pelapor = $pelapor->name;
    }
}