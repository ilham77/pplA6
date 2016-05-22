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
        $report->keluhan = $request->keluhan;
    }
}