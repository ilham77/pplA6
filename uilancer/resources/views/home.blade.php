<?php
$isLogged=false;
if(Auth::check()){
$isLogged=true;
}
$isLogged=false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UILancer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="style.css">
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
    <a href="#home"><img src="logo2.png" alt="Logo" width="150px" height="50px" class="navbar-brand"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <!---->
        <li><a href="#about">About Us</a></li>
        <li><a href="#testimoni">Testimoni</a></li>
        <li><a href="#partner">Partner</a></li>
      
        <li data-toggle="modal" data-target="#myModal"><a href="#">               @if($isLogged)
            <p>Welcome, {{$name}}</p>
            @else
            <p>Login</p>
            @endif
            </a></li></a></li>
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

<!-- DETAIL PEKERJAAN -->
    
    <div class="container-fluid text-center bg-white">
        <br/>
        <h1><p id="judul_pekerjaan">Membuat Website HTML5</p></h1>
        <p><span>oleh <a href=#>chan.ek</a></span>
            <span>Dibuat tanggal: 25 Maret 2016 17:09:09</span> 
            <span>Jumlah Pelamar: 25</span>
            <span>Status: Mencari</span></p>
        <hr/>
        <div id="deskripsi" class="container text-left bg-grey">
            <h1>Deskripsi:</h1>
            <p>
            Membuat website statis company profile PT. MAJUMUNDUR Tbk<br/>
                
            Fitur yang harus dibuat:<br/>
                
                    <li>mengepost artikel</li>
                    <li>login/logout</li>
                    <li>comment section</li>
                    <br/>
            Nilai plus untuk implementasi jQuery
            </p>
        </div>
         <div id="skill tag" class="container text-left bg-grey" >
             <span>Skill yang dibutuhkan:</span>
             <span class="mb-5 mr-5 label label-default label-flat">PHP</span>
             <span class="mb-5 mr-5 label label-default label-flat">HTML5</span>
        </div>
        <div id="durasi-kerja" class="container text-left bg-grey" >
             <span>Durasi:</span>
            <span>7 - 14 Minggu</span>
        </div>
        <div id="range-honor" class="container  text-left bg-grey" >
             <span>Range honor:</span>
            <span>Rp 2.000.000 - Rp 3.000.000</span>
        </div>
        <div class="container text-right bg-grey">
        <p>
            <a class="btn btn-lg btn-success mt-20 font2" href="#">APPLY</a>
        </p>
        </div>
    </div>


<!-- Container (About Us Section) -->
<div id="about" class="container-fluid bg-grey">
<div class="row">
    <div class="col-sm-8">
      <h2>About Us</h2><br>
      <h4>UILancer adalah aplikasi berbasis web yang menyediakan jasa untuk mewadahi para pencari freelance (mahasiswa/i UI) dan pemberi kerja (pihak UI/Non UI). Selain itu UILancer hadir sebagai penghubung antara freelancer dan job giver.</h4>
      <p>UILancer dikembangkan oleh tim PPLA6 dimana terdiri dari mahasiswa/i Fasilkom Universitas Indonesia yang sedang memenuhi matakuliah Proyek Perangkat Lunak.</p><br>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-level-up logo"></span>
    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Fasilkom, Universitas Indonesia</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> ask@uilancer.com</p>    
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>  
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center">
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
