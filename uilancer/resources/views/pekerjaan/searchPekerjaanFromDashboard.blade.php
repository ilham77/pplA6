<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UILancer - Dashboard</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="style-dashboard.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style>
.box {
  width: 200px; height: 300px;
  position: relative;
  border: 1px solid #BBB;
  background: #EEE;
}
.ribbon {
  position: relative;
  right: -5px; top: 70px;
  z-index: 1;
  overflow: hidden;
  height: 75px;
  text-align: right;
}
.ribbon span {
  font-size: 10px;
  font-weight: bold;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
  line-height: 20px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  width: 100px;
  display: block;
  background: #79A70A;
  background: linear-gradient(#F70505 0%, #8F0808 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 19px; right: -21px;
}
.ribbon span::before {
  content: "";
  position: absolute; left: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid #8F0808;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #8F0808;
}
.ribbon span::after {
  content: "";
  position: absolute; right: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #8F0808;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #8F0808;
}

.col{
  height: 300px;
}
</style>

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
        <a href="#home"><img src="logo2.png" alt="Logo" width="150px" height="50px" class="navbar-brand"></a>
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
              <span class="glyphicon glyphicon-user"></span>{{\Auth::user()->name}}
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{url('dashboard')}}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
              <li><a href="{{url('edit')}}"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
              <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-remove-circle"></span> Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>

    </div><!-- /.container-fluid -->
  </nav>

<!-- Sidebar -->
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
      @if(Auth::user()->role == 'admin')
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
      <li><a href="{{url('dashboard')}}"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
      <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-list-alt"></span> Daftar Pekerjaan</a></li>
      <li class="active"><a href="{{url('search-dashboard')}}"><span class="glyphicon glyphicon-search"></span> Cari Pekerjaan</a></li>
      <li><a href="{{url('bukalowongan')}}"><span class="glyphicon glyphicon-pencil"></span> Buka Pekerjaan</a></li>
      <li class="parent ">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-1"><span class="glyphicon glyphicon-chevron-down"></span>Riwayat</span>
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li>
            <a class="" href="{{url('riwayatJobGiver')}}">
              <span class="glyphicon glyphicon-folder-open"></span> Pembukaan Pekerjaan
            </a>
          </li>
          @if(Auth::user()->role == 'mahasiswa')
            <li>
              <a class="" href="{{url('riwayatApply')}}">
                <span class="glyphicon glyphicon-check"></span> Apply Job
              </a>
            </li>
          @endif
        </ul>
      </li>
      <li><a href="{{URL::to('ongoing').'/'.Auth::user()->id}}"><span class="glyphicon glyphicon-tasks"></span> On-Going Job</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> FAQ &amp; Help</a></li>
    </ul>

  </div><!--/.sidebar-->

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <div class="container-fluid">
  <h1 class="text-left" style="margin-top:35px">Hasil Pencarian</h1>
  <br>
  Pekerjaan dengan kata kunci "{{ $kunci }}"

<br><br>
      @if(count($pekerjaanOff1))
<div class="col-lg-12" style="margin-left:-15px;">
        @foreach($pekerjaanOff1 as $pekerjaan)
<div class="col">
<div class="ribbon"><span>HOT !</span></div>
    <div class = "panel panel-default">
      <div class="panel-body">
                    <h4><a href="pekerjaan/{{ $pekerjaan->id }}">{{ $pekerjaan->judul_pekerjaan }}</a></h4>
<div class ="col-md-3 col-xs-1 col-lg-3">
                <span class="glyphicon glyphicon-user"></span><span> <a href="{{url('profile/'.$pekerjaan->user->id)}}">{{$pekerjaan->user->name}}</a></span>

                </div>
                <div class ="col-md-3 col-xs-1 col-lg-3">
                  <span class="glyphicon glyphicon-time"></span>{{ $pekerjaan->endDate }}

                </div>

                <div class ="col-md-3 col-xs-1 col-lg-3">
                  @if($pekerjaan->isTaken)
                  <span class="glyphicon glyphicon-folder-closed"></span><span>Closed</span>
              @else
                 <span class="glyphicon glyphicon-folder-open"></span><span> Open</span>
              @endif
                </div>

               <div class ="col-md-3 col-xs-1 col-lg-3">
              @if($pekerjaan->isDone)
                <span class="glyphicon glyphicon-check"></span><span> Done</span>
              @else
                <span class="glyphicon glyphicon-unchecked"></span><span> Not Done</span>
              @endif
                </div>
           <br><hr>

          <div class="deskripsi">
              <span data-toggle="tooltip" title="Budget" class="glyphicon glyphicon-usd"></span>
              <span>Rp {{$pekerjaan->budget}}</span><br>
              <span data-toggle="tooltip" title="Jumlah Pelamar Saat Ini" class="glyphicon glyphicon-briefcase"></span>
              <span>{{count($pekerjaan->applyManager)}}</span><br>
              <span data-toggle="tooltip" title="Estimasi Waktu Pengerjaan" class="glyphicon glyphicon-ok-circle"></span>
              <span>{{count($pekerjaan->durasi)}} minggu</span><br>
              <span>Skill yang dibutuhkan:</span>
             @if(count($pekerjaan->skillTag))
              @foreach($pekerjaan->skillTag as $skill)
                <span class="mb-5 mr-5 label label-default label-flat">{{ $skill->skill }}</span>
              @endforeach
            @endif
           </div>
                <div class="text-right">
                            <a href="pekerjaan/{{ $pekerjaan->id }}" class="btn btn-primary">Lihat Detail </a>
                </div>

            </div>

    </div>
    </div>
        @endforeach
      @endif

       @if($pekerjaanOff->total() != 0)
        <div class="text-center">
          <span class="text-muted"><b>{{ (($pekerjaanOff->currentPage() - 1) * $pekerjaanOff->perPage()) + 1 }}</b>–<b>{{ (($pekerjaanOff->currentPage() - 1) * $pekerjaanOff->perPage()) + count($pekerjaanOff1) }}</b> of <b>{{ $pekerjaanOff->total() }}</b></span>
          <div class="btn-group btn-group-sm">
            {!! $pekerjaanOff->appends([$pekerjaanNon->getPageName() => $pekerjaanNon->currentPage()])->links() !!}
          </div>
        </div>
      @endif
  </div>
</div>
    </div>

<div class="col-lg-12" style="margin-left:-15px;">
        <div id="form" class="container-fluid">
            <h1 class="text-left" style="margin-top:35px"><hr></h1>
 <div class="col-lg-12" style="margin-left:-15px;">
<br>
      @if(count($pekerjaanNon1))
        @foreach($pekerjaanNon1 as $pekerjaan)
<div class="col">
    <div class = "panel panel-default">
      <div class="panel-body">
                    <h4><a href="pekerjaan/{{ $pekerjaan->id }}">{{ $pekerjaan->judul_pekerjaan }}</a></h4>
<div class ="col-md-3 col-xs-1 col-lg-3">
                <span class="glyphicon glyphicon-user"></span><span> <a href="{{url('profile/'.$pekerjaan->user->id)}}">{{$pekerjaan->user->name}}</a></span>

                </div>
                <div class ="col-md-3 col-xs-1 col-lg-3">
                  <span class="glyphicon glyphicon-time"></span>{{ $pekerjaan->endDate }}

                </div>

                <div class ="col-md-3 col-xs-1 col-lg-3">
                  @if($pekerjaan->isTaken)
                  <span class="glyphicon glyphicon-folder-closed"></span><span>Closed</span>
              @else
                 <span class="glyphicon glyphicon-folder-open"></span><span> Open</span>
              @endif
                </div>

               <div class ="col-md-3 col-xs-1 col-lg-3">
              @if($pekerjaan->isDone)
                <span class="glyphicon glyphicon-check"></span><span> Done</span>
              @else
                <span class="glyphicon glyphicon-unchecked"></span><span> Not Done</span>
              @endif
                </div>
           <br><hr>

          <div class="deskripsi">
              <span data-toggle="tooltip" title="Budget" class="glyphicon glyphicon-usd"></span>
              <span>Rp {{$pekerjaan->budget}}</span><br>
              <span data-toggle="tooltip" title="Jumlah Pelamar Saat Ini" class="glyphicon glyphicon-briefcase"></span>
              <span>{{count($pekerjaan->applyManager)}}</span><br>
              <span data-toggle="tooltip" title="Estimasi Waktu Pengerjaan" class="glyphicon glyphicon-ok-circle"></span>
              <span>{{$pekerjaan->durasi}} minggu</span><br>
              <span>Skill yang dibutuhkan:</span>
             @if(count($pekerjaan->skillTag))
              @foreach($pekerjaan->skillTag as $skill)
                <span class="mb-5 mr-5 label label-default label-flat">{{ $skill->skill }}</span>
              @endforeach
            @endif
           </div>
                <div class="text-right">
                            <a href="pekerjaan/{{ $pekerjaan->id }}" class="btn btn-primary">Lihat Detail </a>
                </div>
            </div>
    </div>
    </div>
        @endforeach
      @endif
      <br>
      @if($pekerjaanNon->total() != 0)
        <div class="text-center">
          <span class="text-muted"><b>{{ (($pekerjaanNon->currentPage() - 1) * $pekerjaanNon->perPage()) + 1 }}</b>–<b>{{ (($pekerjaanNon->currentPage() - 1) * $pekerjaanNon->perPage()) + count($pekerjaanNon1) }}</b> of <b>{{ $pekerjaanNon->total() }}</b></span>
          <div class="btn-group btn-group-sm">
            {!! $pekerjaanNon->appends([$pekerjaanOff->getPageName() => $pekerjaanOff->currentPage()])->links() !!}
          </div>
        </div>
      @endif
  </div>
  <center>
        <button class="btn btn-default mt-20 font2 text-center" onclick="goBack()">Cari lagi</button>
      </center>
</div>
      </div>




    </div>
  </div>



      </div>
    </div><!--/.row-->
  </div><!--/.row-->

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
  <script>
function goBack() {
    window.history.back()
}
</script>
</body>

</html>
