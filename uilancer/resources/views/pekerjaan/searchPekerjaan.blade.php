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
<br><br>
			@if(count($pekerjaans))
       
				@foreach($pekerjaans as $pekerjaan)
<div class="container">
    <div class = "panel panel-default">
			<div class="panel-body">
                    <h4><a href="pekerjaan/{{ $pekerjaan->id }}">{{ $pekerjaan->judul_pekerjaan }}</a></h4>

                
<div class ="col-md-3 col-xs-1 col-lg-3">			 
                <span class="glyphicon glyphicon-user"></span><span> {{$pekerjaan->user->username}}</span>				
                </div> 
                <div class ="col-md-3 col-xs-1 col-lg-3">
                  <span class="glyphicon glyphicon-time">{{ $pekerjaan->endDate }}</span>
							
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
              <span>{{$pekerjaan->budget}}</span><br>
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
            <br/>
                <h4>{{ $pekerjaan->deskripsi_pekerjaan }}</h4>
           </div>
                <div class="text-right">
                            <a href="pekerjaan/{{ $pekerjaan->id }}" class="btn btn-primary">Lihat Detail </a>
                </div>
            </div>
		</div>	
    </div>			
				@endforeach
			@else
				<h2>Tidak ada pekerjaan</h2>
			@endif
			 
        <div align="center">
            {!! $pekerjaans->render() !!}
            <form action="home"><button type="submit"  class="btn btn-defautl">Cari lagi</button></form>
        </div>
</div>



<!-- Footer -->
<footer class="text-center" style="position: relative; height: 100px; bottom: 0; width: 100%;">
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
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>