<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pekerjaan;

class AdminController extends Controller
{
    public function index()
    {
        $pekerjaan = Pekerjaan::where('isVerified',0)->paginate(10);
        return view('admin.inbox',compact('pekerjaan'));
    }
}
