<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pekerjaan;
use App\Report;
use App\Statistic;
use App\User;
use App\UserLuar;
use Hash;
use Auth;
use Khill\Lavacharts\Lavacharts;
use DB;
use DateTime;
class AdminController extends Controller
{
    public function index()
    {
       $reports = Report::paginate(10,['*'],'page_a');
       $pekerjaan = Pekerjaan::where('isVerified',0)->paginate(10,['*'],'page_b');
       $userLuar = UserLuar::all();

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
}else{
$stats = $stats->find($date);
$stats->tanggal=$date;
$stats->jml_freelancer=$jml_freelancer;
$stats->jml_job = $jml_job;
$stats->jml_done = $jml_done;
$stats->jml_report = $jml_report;
$stats->save();
}
$chart->addDateColumn('created_at')
             ->addNumberColumn('Freelancer')
             ->addNumberColumn('Job Given')
             ->addNumberColumn('Job Done')
             ->addNumberColumn('Report');

if(count($stats)){
$graph = $stats->orderBy('created_at','desc')->distinct()->first()->get();
foreach($graph as $gr){
$chart ->addRow([$gr->created_at,$gr->jml_freelancer,$gr->jml_job,$jml_done,$gr->jml_report]);
}
}
\Lava::LineChart(('Temps'), $chart, [
    'title' => 'Statistik Website',
    'width'=>1100,
    'height'=>400
]);
 return view('admin.inbox',compact('pekerjaan','reports','userLuar'));
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
                'faculty' => 'required',
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
        $user->faculty = $request->faculty;
        $user->role = $request->role;
        if ($request->password == $confirm) {
        	$user->save();
			return redirect('manageUser');
        }
        return view('admin.createUser');
    }
    public function editForm($id) {
            $user = User::where('id',$id)->first();
            return view('admin.editUser',compact('user'));
    }
    
    public function editUser(Request $request, $id){
        $user = User::where('id',$id)->first();
            $this->validate($request, [
                'namaPemilikAkun'       => 'required',
                'password' => 'required',
                'confirmPassword' => 'required',
                'email'     => 'required|email',
                'faculty' => 'required',
                // 'no_telp'   => 'required|numeric|min:6',
                'role'       => 'required',
            ]);
        $user->username = $request->username;
        $user->name      = $request->namaPemilikAkun;
        $hashPassword = bcrypt($request->password);
        $confirm = $request->confirmPassword;
        $user->password = $hashPassword;
        $user->email     = $request->email;
        $user->faculty = $request->faculty;
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

    public function unblockUser($id) {
        $user = User::find($id);

        if($user->org_code == "")
            $user->update(array('role' => 'official'));
        else
            $user->update(array('role' => 'mahasiswa'));

        return redirect('manageUser');
    }
}
