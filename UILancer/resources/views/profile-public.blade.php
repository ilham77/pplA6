<!DOCTYPE html>
<html lang="en">
<head>
  <title>UILancer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  @if(\Auth::check())
  <link href="{{ URL::asset('style-dashboard.css') }}" rel="stylesheet" type="text/css">
  @else
  <link href="{{ URL::asset('style.css') }}" rel="stylesheet" type="text/css">
  @endif
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body id="home" data-spy="scroll" data-target=".navbar" data-offset="60">
  @if(\Auth::check())
  
  @extends('layoutDashboard')
  @section('content')

  <!-- Sidebar -->  
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
      @if(Auth::user()->role == 'Admin')
      <li class="parent">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-2"><span class="glyphicon glyphicon-th-large"></span> Admin Menu </span>
        </a>
        <ul class="children collapse" id="sub-item-2">
          <li>
            <a class="" href="{{url('inbox')}}">
              <span class="glyphicon glyphicon-inbox"></span> Inbox
            </a>
          </li>
          <li>
            <a class="" href="{{url('manageUser')}}">
              <span class="glyphicon glyphicon-pawn"></span> Manajemen User
            </a>
          </li>
        </ul>
      </li>
      @endif
      <li class="active"><a href="{{url('dashboard')}}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-list-alt"></span> Daftar Pekerjaan</a></li>
      <li class="active"><a href="{{url('search-dashboard')}}"><span class="glyphicon glyphicon-search"></span> Cari Pekerjaan</a></li>
      <li><a href="{{url('bukalowongan')}}"><span class="glyphicon glyphicon-pencil"></span> Buka Pekerjaan</a></li>
      <li class="parent ">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-1"><span class="glyphicon glyphicon-chevron-down"></span></span> Riwayat 
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li>
            <a class="" href="{{url('riwayatJobGiver')}}">
              <span class="glyphicon glyphicon-folder-open"></span> Pembukaan Pekerjaan
            </a>
          </li>
          <li>
            <a class="" href="{{url('riwayatApply')}}">
              <span class="glyphicon glyphicon-check"></span> Apply Job
            </a>
          </li>
        </ul>
      </li>
      <li><a href="{{URL::to('ongoing').'/'.Auth::user()->id}}"><span class="glyphicon glyphicon-tasks"></span> On-Going Job</a></li>
      <li><a href="faq"><span class="glyphicon glyphicon-question-sign"></span> FAQ &amp; Help</a></li>
    </ul>
  </div><!--/.sidebar-->

@else
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="{{ url('/') }}"><img src="{{ asset('logo2.png') }}" alt="Logo" width="150px" height="50px" class="navbar-brand"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./">About Us</a></li>
        <li><a href="./">Testimoni</a></li>
        <li><a href="./">Partner</a></li>
        <li data-toggle="modal" data-target="#myModal"><a href="#">
            <p>Login</p>
        </a></li>
      </ul>
    </div>
  </div>
</nav>
@endif

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row" style="margin-top:35px">
      <div class="col-lg-12" style="margin-top:5px">
          <div class="col-md-3">
            @if($usr->avatar == "")
            <img src="http://placehold.it/200x200" alt="">
            @else
            <img src="{{URL::to('avatar').'/'.$usr->avatar}}" alt="">
            @endif
            <br><br>
          </div>
        <div id="profile-header" class="col-md-7">
            <h1 style="margin-top:-5px;">{{$usr->name}}</h1>
            <hr/>
            <h3>Deskripsi:</h3>
            <p>
            {{$usr->deskripsi}}
            </p>
        </div>
        <br>

        <div id="biodata" class="col-md-9 col-xs-4 col-lg-9">
          <br>
            <p>Tempat Kelahiran : {{$usr->tempat_lahir}}</p>
            <p>Tanggal Lahir    : {{$usr->tanggal_lahir}}</p>
            <p>Email            : {{$usr->email}}</p>
            <p>Media Sosial     : {{$usr->linkedin}}</p>
            <p>Web              : {{$usr->web}}</p>
            <p>Ketertarikan     : </p>
            <p>Pekerjaan        : {{$usr->role}}</p>
            <p>Fakultas         : {{$usr->faculty}}</p>


                    @if($usr->cvresume == "")
                    <a href="#" class="btn btn-primary mt-20 font2 text-center">Lihat CV/Resume</a>
                    @else
                    <a href="{{URL::to('cvresume').'/'.$usr->cvresume}}" class="btn btn-primary mt-20 font2 text-center">Lihat CV/Resume</a>
                    @endif
                      @if(\Auth::check())
            <a class="btn btn-danger mt-20 font2 text-center " data-toggle="modal" data-target="#reportModal" href="#">Report</a>
            @endif
            <br>
            <hr style="">
                    <h3>Riwayat Pekerjaan</h3>
                    <table style="width:1050px;" class="table table-hover">
              <div class="table-responsive">
              @if(count($jobs))
                <thead>
                <td><center><b>Judul Pekerjaan</b></center></td>
                <td><center><b>Pemberi Pekerja</b></center></td>
                <td><center><b>Durasi Kerja</center></b></td>
                <td><center><b>Honor</b></center></td>
                <td><center><b>Deadline</b></center></td>
                <td></td>
                </thead>

                @foreach($jobs as $job)
                  <tr>
                      <td><center>{{ $job->pekerjaan->judul_pekerjaan }}</center></td>
                      <td><center>{{ $job->pekerjaan->user->name }}</center></td>
                      <td><center>{{ $job->pekerjaan->durasi }} minggu</center></td>
                      <td><center>Rp.{{ $job->pekerjaan->budget }},-</center></td>
                      <td><center>{{ $job->pekerjaan->endDate  }}</center></td>

                  </tr>
                @endforeach
              @else
                <b>User ini belum pernah menyelesaikan pekerjaan freelance</b>
              @endif
                </div>
              </table>
                  </div>
        </div>

      </div>

    </div><!--/.row-->

@stop


<script>
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("deadline")[0].setAttribute('min', today);
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#home']").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });

  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
  <!--
REPORT MODAL
-->

  <!-- Modal -->
@if(\Auth::check())
<div class="modal fade" id="reportModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Report User</h4>
            <br>
        <div class="modal-body">
           <form action="../report/{{$usr->id}}/{{Auth::user()->id}}" method="post" role="form" enctype="multipart/form-data">
              {{csrf_field()}}
            <div class="form-group">
                <p>Judul Laporan:</p>
            <input type="text" name="judul" class="form-control"><br>
                <p>Ceritakan keluhan anda:</p>
            <textarea name="keluhan" class="form-control" style="resize:none;" cols="5" rows="10" required></textarea>
                <br>
                <button class="btn btn-primary" data-toggle="modal" data-target="thanks" type=submit>Kirim</button>
        </div>
        </form>
        </div>
        </div>
      </div>
      </div>
<!--END REPORT-->

      <!--
THANKS MODAL
-->

  <!-- Modal -->

<div class="modal fade" id="thanks" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </form>
        <div class="modal-body">
            <center><p>Terima kasih. Laporan anda akan segera di proses.</p>
                <p>Untuk pertanyaan lebih lanjut silahkan hubungi ask@uilancer.com</p></center>
        </div>
        </div>

      </div>
      </div>
@endif
  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
           @if(\Auth::check())
               <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Logout</h4>
        </div>
        <div class="modal-body">
          <a href="{{url('logout')}}" class="btn btn-danger">Logout</a>
        </div>
      </div>
            @else
               <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <a href="{{url('sso-login')}}" class="btn btn-danger">UI</a>
          <div class="divider"></div>
          <a href="{{url('login')}}" class="btn btn-danger">Non UI</a><br>
        </div>
      </div>
            @endif
    </div>
</div>


<!--END THANKS-->
</body>
</html>
