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
</head>

<body>
  @extends('layoutDashboard')
  @section('content')
	
  <!-- Sidebar -->  
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">

      <li><a href="./"><span class="glyphicon glyphicon-home"></span> Home</a></li>     
      <li class="active"><a href="{{url('dashboard')}}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Daftar Pekerjaan</a></li>
      <li><a href="{{url('search-dashboard')}}"><span class="glyphicon glyphicon-search"></span> Cari Pekerjaan</a></li>
      <li><a href="bukalowongan"><span class="glyphicon glyphicon-pencil"></span> Buka Pekerjaan</a></li>
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
      <li><a href="faq"><span class="glyphicon glyphicon-question-sign"></span> FAQ &amp; Help</a></li>
    </ul>

  </div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-8 col-lg-offset-3 main">			
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header"></div>
				<div class="col-md-4 col-xs-2 col-lg-3">
					@if(\Auth::user()->avatar == "")
                  		<img src="http://placehold.it/200x200" alt="">
                	@else
                  		<img src="{{URL::to('avatar').'/'.\Auth::user()->avatar}}" alt="">  
                	@endif
        		</div>
		        <div id="profile-header" class="col-md-5 col-xs-3 col-lg-4">
		            <h1>{{\Auth::user()->name}}</h1>
		            <hr/>
		            <h3>Deskripsi:</h3>
		            <p>
		            {{\Auth::user()->deskripsi}}
		            </p>
		        </div>
		        <div id="biodata" class="col-md-9 col-xs-4 col-lg-9">
		            <p>Tempat Kelahiran : {{\Auth::user()->tempat_lahir}}</p>
		            <p>Tanggal Lahir    : {{\Auth::user()->tanggal_lahir}}</p>
		            <p>Email            : {{\Auth::user()->email}}</p>
		            <p>Linkedin         : {{\Auth::user()->linkedin}}</p>
		            <p>Website Pribadi  : {{\Auth::user()->web}}</p>
		            <p>Ketertarikan     : </p>
		            <p>Pekerjaan        : {{\Auth::user()->role}}</p> 
		            <p>Fakultas         : {{\Auth::user()->faculty}}</p>
		            CV / Resume :
		            <span><a href="#" download>click here to download</a></span><br><br>
		         	<a href="{{url('edit')}}" class="btn btn-danger">Edit Profile</a>
		         	<br><br>
		        </div>
			</div>
		</div><!--/.row-->		
	</div>
	
	@stop

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