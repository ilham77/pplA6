<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pekerjaan;
use App\Report;
use App\Statistic;
use App\User;
use Hash;
use Auth;
use Khill\Lavacharts\Lavacharts;
use DB;
use DateTime;

class AdminController extends Controller
{
    public function index()
    {
          
       $reports = Report::all();
       $pekerjaan = Pekerjaan::where('isVerified',0)->paginate(10);
        
$chart = \Lava::DataTable();
$stats = new Statistic;
$date = date('d-M-Y');
$jml_freelancer = User::where('role','=','mahasiswa')->count();
$jml_job = Pekerjaan::all()->count();
$jml_done = Pekerjaan::where('isDone','=','1')->count();
$jml_report = Report::all()->count();

if($stats->find($date)==null){
$stats->tanggal=$date;
$stats->jml_freelancer=$jml_freelancer;
$stats->jml_job = $jml_job;
$stats->jml_done = $jml_done;
$stats->jml_report = $jml_report;
$stats->save();
}



$chart->addDateColumn('created_at')
             ->addNumberColumn('Freelancer')
             ->addNumberColumn('Job given')
             ->addNumberColumn('Report')
             ->addNumberColumn('Job Done');
if(count($stats)){
$graph = $stats->orderBy('created_at','desc')->distinct()->first()->get();
foreach($graph as $gr){
$chart ->addRow([$gr->created_at,$gr->jml_freelancer,$gr->jml_job,$gr->jml_report,$jml_done]);
}
}
\Lava::LineChart(('Temps'), $chart, [
    'title' => 'Statistik Website',
    'width'=>1200,
    'height'=>400

]);
 return view('admin.inbox',compact('pekerjaan','reports'));
    }


    public function showUser()
    {
       $users = User::all();
        return view('admin.manageUser',compact('users'));
    }

    public function createUser(Request $request){
        	$this->validate($request, [
                'username' => 'required',
                'namaPemilikAkun'		=> 'required',
                'password' => 'required',
                'confirmPassword' => 'required',
                'email'		=> 'required|email',
                // 'no_telp'   => 'required|numeric|min:6',
                'role'       => 'required',
            ]);

        $user = new User;

        // Available alpha caracters
        $characters = '1234567890';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $npm = str_shuffle($pin);

        $user->username = $request->username;
        $user->name      = $request->namaPemilikAkun;

        $hashPassword = bcrypt($request->password);
        $confirm = $request->confirmPassword;
        $user->npm = $npm;
        $user->password = $hashPassword;

        $user->email     = $request->email;
        $user->role = $request->role;

        if ($request->password == $confirm) {
        	$user->save();
			return redirect('inbox');
        }

        return view('admin.createUser');
    }

    public function editForm($id) {

            $user = User::where('id',$id)->first();
            return view('admin.editUser',compact('user'));

    }

    public function editUser(Request $request){

            $this->validate($request, [
                'namaPemilikAkun'       => 'required',
                'password' => 'required',
                'confirmPassword' => 'required',
                'email'     => 'required|email',
                // 'no_telp'   => 'required|numeric|min:6',
                'role'       => 'required',
            ]);

        $user->name      = $request->namaPemilikAkun;

        $hashPassword = bcrypt($request->password);
        $confirm = $request->confirmPassword;
        $user->npm = $npm;
        $user->password = $hashPassword;

        $user->email     = $request->email;
        $user->role = $request->role;

        if ($request->password == $confirm) {
            $user->save();
            return redirect('manageUser');
        }

        return redirect('/editUser')->withErrors(['Ada salah data']);
    }

    public function deleteUser($id) {
        User::where('id',$id)->delete();
        return redirect('manageUser');
    }

    public function blockUser($id) {
        User::where('id',$id)->update(array('role' => 'blocked'));
        return redirect('manageUser');
    }
}
