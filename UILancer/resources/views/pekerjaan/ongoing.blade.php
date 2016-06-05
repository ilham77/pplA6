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

<style>

.vertical-alignment-helper {
    display:table;
    height: 100%;
    width: 100%;
}
.vertical-align-center {
    /* To center vertically */
    display: table-cell;
    vertical-align: middle;
}
.modal-content {
    /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
    width:inherit;
    height:inherit;
    /* To center horizontally */
    margin: 0 auto;
}
</style>


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
              <span style="font-family: Lato, sans-serif;">{{\Auth::user()->name}}</span>
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
      <li><a href="{{url('search-dashboard')}}"><span class="glyphicon glyphicon-search"></span> Cari Pekerjaan</a></li>
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
          @if(Auth::user()->role != 'official')
            <li>
              <a class="" href="{{url('riwayatApply')}}">
                <span class="glyphicon glyphicon-check"></span> Apply Job
              </a>
            </li>
          @endif
        </ul>
      </li>
      <li class="active"><a href="{{URL::to('ongoing').'/'.Auth::user()->id}}"><span class="glyphicon glyphicon-tasks"></span> On-Going Job</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> FAQ &amp; Help</a></li>
    </ul>

  </div><!--/.sidebar-->

 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <div id="table" class="container-fluid">
  <h1 class="text-left" style="margin-top:35px">On-Going Job</h1>

  @if($user->role != 'official')
    <u><h3>Freelancer</h3></u>
    <table style="width:100%" class="table table-hover">
      <div class="table-responsive">
      @if(count($freelancer_job))
        <thead>
        <tr>
        <td><center><b>Judul Pekerjaan</b></center></td>
        <td><center><b>Pemberi Pekerja</b></center></td>
        <td><center><b>Durasi Kerja</center></b></td>
        <td><center><b>Honor</b></center></td>
        <td><center><b>Deadline</b></center></td>
        <td></td>
        <td></td>
        </tr>
        </thead>
        @foreach($freelancer_job as $fj)
            <tr>
            <td><center>{{ $fj->pekerjaan->judul_pekerjaan }}</center></td>
            <td><center>{{ $fj->pekerjaan->user->name }}</center></td>
            <td><center>{{ $fj->pekerjaan->durasi }} pekan</center></td>
            <td><center>Rp{{ $fj->pekerjaan->budget }},-</center></td>
            <td><center>{{ $fj->pekerjaan->endDate }}</center></td>

            @if($fj->pekerjaan->isDone == 0)
              <td><center> <button type="button" class="btn btn-primary mt-20 font2 text-center" data-toggle="modal" data-target="#modalDone-{{ $fj->pekerjaan->id }}">Done</button></center></td>
            @else
              <td><center>Waiting for confirmation</center></td>
            @endif

          </tr>
        @endforeach
      @else
        <b>Tidak ada pekerjaan</b>
      @endif
       </div>
    </table>
  @endif
</div>
    </div>
  </div>
<div class="row">
      <div class="col-lg-12">
        <div id="table" class="container-fluid">
  <u><h3>Job Giver</h3></u>
    <table style="width:100%" class="table table-hover">
      <div class="table-responsive">
       @if(count($jobgiver_job))
        <thead>
      <tr>
        <td><center><b>Judul Pekerjaan</b></center></td>
        <td><center><b>Pekerja</b></center></td>
        <td><center><b>Durasi Kerja</center></b></td>
        <td><center><b>Honor</b></center></td>
        <td><center><b>Deadline</b></center></td>
        <td></td>
        <td></td>
      </tr>
        </thead>
        @foreach($jobgiver_job as $jg)
            <tr>
              <td><center>{{ $jg->pekerjaan->judul_pekerjaan }}</center></td>
              <td><center>{{ $jg->user->name }}</center></td>
              <td><center>{{ $jg->pekerjaan->durasi }} minggu</center></td>
              <td><center>Rp{{ $jg->pekerjaan->budget }},-</center></td>
              <td><center>{{ $jg->pekerjaan->endDate }}</center></td>

               @if($jg->pekerjaan->isDone == 0)
                <td><center>Waiting to be done</center></td>
              @else
                <td><center><a class="btn btn-success mt-20 font2 text-center" data-toggle="modal" data-target="#modalTestimoni-{{ $jg->pekerjaan->id }}">Confirm</a></center></td>
              @endif
            </tr>
        @endforeach
      @else
<b>Tidak ada pekerjaan</b>
      @endif
       </div>
    </table>
</div>
    </div>
  </div>

</div>


      </div>
    </div><!--/.row-->
  </div><!--/.row-->


      </div>
    </div><!--/.row-->
  </div><!--/.row-->

@foreach($freelancer_job as $fj)
  <div class="modal fade" id="modalDone-{{ $fj->pekerjaan->id }}" role="dialog">  
        <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
    <div class="modal-dialog">
               <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <center>
        <div class="modal-body">
          <div style="margin-top:-15px"><h4>Apakah anda yakin pekerjaan telah anda selesaikan?</h4></div>
          <a href="../done/{{ $fj->pekerjaan->id }}" class="btn btn-default">Yes</a>
          <a class="btn btn-default" data-dismiss="modal">No</a>
        </div>
      </center>
      </div>
    </div>
  </div>
      <!-- Modal content-->
    </div>
</div>
@endforeach

@foreach($jobgiver_job as $jg)
  <div class="modal fade" id="modalTestimoni-{{ $jg->pekerjaan->id }}" role="dialog">
        <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
    <div class="modal-dialog">
               <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rating, Testimoni, dan Konfirmasi</h4>
        </div>
        <center>
        <div class="modal-body">
          <div style="margin-top:-15px">
            <br>
            <form action="{{url('rate/'.$jg->pekerjaan->id.'/'.$jg->user->id)}}" method="POST" role="form">
            {{csrf_field()}}
                              <table>
                                    <tbody>
                                        <tr height="50px">
                                            <td style="padding-right:5px;"><div align="right"><label>Berikan rating anda</label></div></td>
                                            <td width="400px" style="margin-left:15px;">
                                              <!-- <input required class="form-control" type="number" name="rating" placeholder="Rating"> -->
    <fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
  </fieldset>
                                            </td>
                                        </tr>

                                        <tr height="85px">
                                            <td style="padding-right:5px;"><div align="right"><label>Testimoni</label></div></td>
                                            <td><textarea required style="resize:none;margin-left:20px;" class="form-control" type="text" rows="3" name="testimoni" placeholder="Testimoni"></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <br>
                                {!! Form::submit('Simpan', array('class'=>'btn btn-success mt-20 font2 text-center')) !!}
                                            </form>
          </div><!--
          <a href="#" class="btn btn-default">Yes</a>
          <a class="btn btn-default" data-dismiss="modal">No</a> -->
        </div>
      </center>
      </div>
    </div>
  </div>
      <!-- Modal content-->
    </div>
</div>
@endforeach


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
