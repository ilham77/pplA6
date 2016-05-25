<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UILancer - Dashboard</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="{{ asset('style.css') }}">
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
              <span class="glyphicon glyphicon-user"></span>
              <span style="font-family: Lato, sans-serif;">{{Auth::user()->name}}</span>
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
      @if(Auth::user()->role == 'Admin')
      <li class="parent active">
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
      <li><a href="{{url('search-dashboard')}}"><span class="glyphicon glyphicon-search"></span> Cari Pekerjaan</a></li>
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
      <li><a href="ongoing/{{ Auth::user()->id }}"><span class="glyphicon glyphicon-tasks"></span> On-Going Job</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> FAQ &amp; Help</a></li>
    </ul>

  </div><!--/.sidebar-->

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <div id="form" class="container-fluid">
  <h1 class="text-left" style="margin-top:35px">Inbox</h1>
  <div class="row">
    <div class="col-md-12">
    <div class="row">

    </div>

    <div class="row">

        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-tasks">
                </span> Permintaan Pembuatan Pekerjaan</a></li>
                <li><a href="#profile" data-toggle="tab"><span class="glyphicon glyphicon-exclamation-sign"></span>
                    Report User</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">
                      @foreach($pekerjaan as $sbhPekerjaan)
                        <a href="{{url('/pekerjaan/'. $sbhPekerjaan->id) }}" class="list-group-item">
                          <span class="name" style="min-width: 300px; display: inline-block;">{{ $sbhPekerjaan->user->name }}</span>
                          <span class="">{{ $sbhPekerjaan->judul_pekerjaan }}</span>
                          <span class="text-muted" style="font-size: 11px;">- {{ $sbhPekerjaan->user->faculty }}</span>
                          <span class="badge">{{ \Carbon\Carbon::parse($sbhPekerjaan->created_at)->format('M j, Y g:i A') }}</span> <span class="pull-right"></span>
                        </a>
                      @endforeach
                    </div>
                    <br>
                    @if($pekerjaan->total() != 0)
                    <div class="text-center">
                        <span class="text-muted"><b>

                          {{ (($pekerjaan->currentPage() - 1) * $pekerjaan->perPage()) + 1 }}</b>–<b>{{ (($pekerjaan->currentPage() - 1) * $pekerjaan->perPage()) + $pekerjaan->count() }}</b> of <b>{{ $pekerjaan->total() }}</b></span>
                        <div class="btn-group btn-group-sm">
                          {!! $pekerjaan->render() !!}
                        </div>
                    </div>
                    @else
                    <br>
                    <br>
                    @endif
                </div>
                <div class="tab-pane fade in" id="profile">
                    <div class="list-group">
                    @if(count($reports))
                        @foreach($reports as $report)
                        <a href="report/{{$report->id}}" class="list-group-item">
                          <span class="name" style="min-width: 300px; display: inline-block;">{{$report->pelapor}}</span>
                          <span class="">{{$report->judul}}</span>
                          <span class="text-muted" style="font-size: 11px;">- {{$report->asal_instansi}}</span>
                          <span class="badge">{{ \Carbon\Carbon::parse($report->created_at)->format('M j, Y g:i A') }}</span> <span class="pull-right"></span>
                        </a>
                        @endforeach
                        
                     @if($pekerjaan->total() != 0)
                    <div class="text-center">
                        <span class="text-muted"><b>

                          {{(($report->currentPage() - 1) * $report->perPage()) + 1 }}</b>–<b>{{ (($report->currentPage() - 1) * $report->perPage()) + $report->count() }}</b> of <b>{{ $report->total() }}</b></span>
                        <div class="btn-group btn-group-sm">
                          {!! $report->render() !!}
                        </div>
                    </div>
                    @else
                    <br>
                    <br>
                    @endif
                    @endif
                </div>

        </div>
    </div>
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
</body>

</html>
