<?php
$isLogged=false;
if(Auth::check()){
$isLogged=true;
}
$isLogged=false;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UILancer - Dashboard</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="{{ asset('style-dashboard.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
  <!-- Navigasi Bar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#home"><img src="{{ asset('logo2.png') }}" alt="Logo" width="150px" height="50px" class="navbar-brand"></a>
        <ul class="user-menu">

          <!-- Notifikasi -->
          <li role="presentation" class="dropdown pull-right" id="notifikasi">
                    <a href="#" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                      <span class="glyphicon glyphicon-bell"</span>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                      <li>
                        <a>
                          <span class="image">
                            <img src="img.jpg" alt="Profile Image" />
                          </span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <a>
                          <span class="image">
                            <img src="img.jpg" alt="Profile Image" />
                          </span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <a>
                          <span class="image">
                            <img src="img.jpg" alt="Profile Image" />
                          </span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <a>
                          <span class="image">
                            <img src="img.jpg" alt="Profile Image" />
                          </span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <div class="text-center">
                          <a href="#">
                            <strong>See All Alerts</strong>
                            <span class="glyphicon glyphicon-menu-right"</span>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>

                  <!-- Menu User -->
          <li class="dropdown pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span>User
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-remove-circle"></span> Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>

    </div><!-- /.container-fluid -->
  </nav>

  <!-- Sidebar -->
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
      <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Daftar Pekerjaan</a></li>
      <li  class="active"><a href="../search-dashboard"><span class="glyphicon glyphicon-search"></span> Cari Pekerjaan</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Buka Pekerjaan</a></li>
      <li class="parent ">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-1"><span class="glyphicon glyphicon-chevron-down"></span></span> Riwayat
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-folder-open"></span> Pembukaan Pekerjaan
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-check"></span> Apply Job
            </a>
          </li>
        </ul>
      </li>
      <li><a href="#"><span class="glyphicon glyphicon-tasks"></span> On-Going Job</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> FAQ &amp; Help</a></li>
    </ul>

  </div><!--/.sidebar-->

<!-- DETAIL PEKERJAAN -->

    <div class="container-fluid col-md-8 col-md-offset-2 col-xs-4 col-xs-offset-2 col-lg-8 col-lg-offset-2 text-left bg-white">
        <br/>
        <div class="container-fluid text-left">
        <h1><p id="judul_pekerjaan" >{{ $hasil->judul_pekerjaan }}</p></h1>
        <p><span>oleh <a href=#>chanek</a></span>
            <span>Dibuat tanggal: {{ $hasil->created_at }}</span>
            <span>Jumlah Pelamar: 25</span>
            <span>Status:
            @if($hasil->isTaken)
              Sudah Diambil
            @else
              Lowong
            @endif</span></p>
        <hr/>
      </div>

        <div id="deskripsi" class="container-fluid text-left bg-grey">
            <h1>Deskripsi:</h1>
            <p>
            {{ $hasil->deskripsi_pekerjaan }}<br/>

             <span>Skill yang dibutuhkan:</span>
             @if(count($hasill))
              @foreach($hasill as $skill)
                <span class="mb-5 mr-5 label label-default label-flat">{{ $skill->skill }}</span>
              @endforeach
            @endif
            <br/>

             <span>Durasi:</span>
            <span>{{ $hasil->durasi }} Minggu</span><br/>

             <span>Estimasi honor:</span>
            <span>Rp {{$hasil->budget}}</span><br/><br/>

            <span><b>Deadline:</b></span>
            <span>{{$hasil->endDate}}</span><br/>
        </p>
        <p><br/>
            @if($hasil->isVerified == 0)
            <!-- Auth::user()->role == "admin" --> 
              <a class="btn btn-block btn-success mt-20 font2 text-center" href="../verify/{{ $hasil->id }}">Verify</a>
            @else
              <a class="btn btn-block btn-success mt-20 font2 text-center" >APPLY</a>
            @endif
        </p>

    </div>
</div>

  <script>
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
  </script>
</body>

</html>
