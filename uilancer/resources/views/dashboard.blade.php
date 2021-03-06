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
<link href="{{ asset('style-dashboard.css') }}" rel="stylesheet">
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
      <li class="active"><a href="{{url('dashboard')}}"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
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
</div>



	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row" style="margin-top:35px">
			<div class="col-lg-12" style="margin-top:5px">
				<div class="col-md-3" >
			@if(\Auth::user()->avatar == "")
                  <img src="http://placehold.it/200x200" alt="">
                @else
                  <img src="{{URL::to('avatar').'/'.\Auth::user()->avatar}}" alt="">
                @endif
                <br>
                <br>
        </div>
        <div id="profile-header" class="col-md-7">
            <a href="{{url('dashboard')}}"><h1 style="margin-top:-5px;">{{\Auth::user()->name}}</h1></a>
            <hr/>
            <h3>Deskripsi:</h3>
            <p>
            {{\Auth::user()->deskripsi}}
            </p>
        </div>
        <br>

        <div id="biodata" class="col-md-9 col-xs-4 col-lg-9">
        	<br>
            <p>Tempat Kelahiran : {{\Auth::user()->tempat_lahir}}</p>
            <p>Tanggal Lahir    : {{\Auth::user()->tanggal_lahir}}</p>
            <p>Email            : {{\Auth::user()->email}}</p>
            <p>Media Sosial     : {{\Auth::user()->linkedin}}</p>
            <p>Web              : {{\Auth::user()->web}}</p>
            <p>Ketertarikan     : </p>
            <p>Pekerjaan/Role        : {{\Auth::user()->role}}</p>
            <p>Fakultas         : {{\Auth::user()->faculty}}</p>

            @if(\Auth::user()->cvresume != "")
            <a href="{{URL::to('cvresume').'/'.\Auth::user()->cvresume}}" class="btn btn-primary">Lihat CV/Resume</a>
            @endif
          <a href="{{url('edit')}}"  class="btn btn-warning mt-20 font2 text-center">Edit Profile</a>

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
