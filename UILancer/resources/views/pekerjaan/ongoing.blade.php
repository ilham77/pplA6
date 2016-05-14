<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UILancer - Dashboard</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="{{ asset('style.css') }}">
<link href="style-dashboard.css" rel="stylesheet">
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
              <span style="font-family: Lato, sans-serif;">{{\Auth::user()->name}}</span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
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
      <li><a href="{{url('dashboard')}}"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
      <li><a href=""><span class="glyphicon glyphicon-list-alt"></span> Daftar Pekerjaan</a></li>
      <li  class="active"><a href="{{url('search-dashboard')}}"><span class="glyphicon glyphicon-search"></span> Cari Pekerjaan</a></li>
      <li><a href="{{url('bukalowongan')}}"><span class="glyphicon glyphicon-pencil"></span> Buka Pekerjaan</a></li>
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
      <li><a href="{{url('ongoing')}}"><span class="glyphicon glyphicon-tasks"></span> On-Going Job</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> FAQ &amp; Help</a></li>
    </ul>

  </div><!--/.sidebar-->

 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <div id="table" class="container-fluid">
  <h1 class="text-left" style="margin-top:35px">On-Going Job</h1>
  <br>
  <u><h3>Freelancer</h3></u>
    <table style="width:100%" class="table table-hover">
      <div class="table-responsive">
       <thead>
      <tr>
        <td><center><b>Judul Pekerjaan</b></center></td>
        <td><center><b>Pencari Pekerja</b></center></td>
        <td><center><b>Durasi Kerja</center></b></td>
        <td><center><b>Honor</b></center></td>
        <td><center><b>Deadline</b></center></td>
        <td></td>
        <td></td>
      </tr>
        </thead>
            <tr>
        <td><center>Membuat web</center></td>
        <td><center>Kurnianto Trilaksono</center></td>
        <td><center>5 pekan</center></td>
        <td><center>Rp3.000.000,-</center></td>
        <td><center>20 December 2017</center></td>
        <td><center><a class="btn btn-primary mt-20 font2 text-center" data-toggle="modal" data-target="#modalDone">Done</a></center></td>
            </tr> 
                        <tr>
        <td><center>Membuat web</center></td>
        <td><center>Kurnianto Trilaksono</center></td>
        <td><center>5 pekan</center></td>
        <td><center>Rp3.000.000,-</center></td>
        <td><center>20 December 2017</center></td>
        <td><center>Waiting for the confirmation</center></td>
            </tr> 
       </div>
    </table>
</div>
    </div>
  </div>
<div class="row">
      <div class="col-lg-12">
        <div id="table" class="container-fluid">
  <u><h3>Job Giver</h3></u>
    <table style="width:100%" class="table table-hover">
      <div class="table-responsive">
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
            <tr>
        <td><center>Membuat web</center></td>
        <td><center>Kurnianto Trilaksono</center></td>
        <td><center>5 pekan</center></td>
        <td><center>Rp3.000.000,-</center></td>
        <td><center>20 December 2017</center></td>
        <td><center>Waiting to be done</center></td>
            </tr> 
        <tr>
        <td><center>Membuat web</center></td>
        <td><center>Kurnianto Trilaksono</center></td>
        <td><center>5 pekan</center></td>
        <td><center>Rp3.000.000,-</center></td>
        <td><center>20 December 2017</center></td>
        <td><center><a class="btn btn-primary mt-20 font2 text-center" href="#">Done</a></center></td>
            </tr> 
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

  <div class="modal fade" id="modalDone" role="dialog">
    <div class="modal-dialog">
               <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <center>
        <div class="modal-body">
          <div style="margin-top:-15px"><h4>Apakah anda yakin menghapus user ini?</h4></div>
          <a href="#" class="btn btn-default">Yes</a>
          <a class="btn btn-default" data-dismiss="modal">No</a>
        </div>
      </center>
      </div>
      <!-- Modal content-->
   
      
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
