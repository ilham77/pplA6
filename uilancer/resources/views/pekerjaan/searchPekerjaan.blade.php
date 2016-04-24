<!DOCTYPE html>
<html lang="en">
<head>
  <title>UILancer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="style.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body id="home" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="./"><img src="logo2.png" alt="Logo" width="150px" height="50px" class="navbar-brand"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./">About Us</a></li>
        <li><a href="./">Testimoni</a></li>
        <li><a href="./">Partner</a></li>
        <li data-toggle="modal" data-target="#myModal"><a href="#">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
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
      
    </div>
</div>

<div id="table" class="container-fluid">
  <h1 class="text-center">Hasil Pencarian</h1>
  <br>
  Pekerjaan dengan kata kunci "{{ $kunci }}"	
		<table style="width:100%" class="table table-bordered">
			<div class="table-responsive">
				<thead>
		  <tr>
		    <td><center><b>Judul Pekerjaan</b></center></td>
		    <td><center><b>Deskripsi Pekerjaan</b></center></td>		
		    <td><center><b>Status</center></b></td>
		    <td><center><b>Progress</center></b></td>
		  </tr>
		  	</thead>
			@if(count($pekerjaans))
				@foreach($pekerjaans as $pekerjaan)
						<tr>
							<td><center><a href="/pplA6/uilancer/public/pekerjaan/{{ $pekerjaan->id }}">{{ $pekerjaan->judul_pekerjaan }}</a></center></td>
							<td><center>{{ $pekerjaan->deskripsi_pekerjaan }}</center></td>
							<td><center>
							@if($pekerjaan->isTaken)
								Sudah Diambil
							@else
								Lowong
							@endif
							</center></td>
							<td><center>
							@if($pekerjaan->isDone)
								Udah Kelar
							@else
								Belom Kelar
							@endif
							</center></td>
						</tr>
				@endforeach
			@else
				<h2>Tidak ada pekerjaan</h2>
			@endif
			 </div>
		</table>
        <div align="center">
            <button type="submit"  class="btn btn-defautl">Cari lagi</button>
        </div>
</div>



<!-- Footer -->
<footer class="text-center" style="position: fixed; height: 100px; bottom: 0; width: 100%;">
  <p>Copyright &copy; 2016. UILancer</p>
</footer>

<script>
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

</body>
</html>





<!-- <!DOCTYPE html>
<html>
<head>
	<title>halaman hasil search pekerjaan</title>
</head>
<body>

</body>
</html> -->