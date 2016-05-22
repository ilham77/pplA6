<?php $avatar="";?>
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
      <img src="logo2.png" alt="Logo" width="150px" height="50px" class="navbar-brand" href="#home">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./about">About Us</a></li>
        <li><a href="#testimoni">Testimoni</a></li>
        <li><a href="#partner">Partner</a></li>
        <li data-toggle="modal" data-target="#myModal"><a href="#">
            @if(\Auth::check())
            <p>Welcome, {{\Auth::user()->name}}</p>
            @else
            <p>Login</p>
            @endif
            </a></li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
           @if(\Auth::check())
               <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Logout</h4>
        </div>
        <div class="modal-body">
          <a href="{{url('logout')}}" class="btn btn-danger">Logout</a>
        </div>
      </div>
            @else
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
            @endif
      <!-- Modal content-->


    </div>
</div>

<!-- EDIT PROFILE -->
<div id="body" class="container-fluid">

    <!-- SIDEBAR -->
  <div id="sidebar" class="container-fluid col-md-3 col-xs-1 col-lg-3">
        <DL>
        <DT>Menu
            <DD><a href="#">Daftar Pekerjaan</a><br></DD>
            <DD><a href="#">Cari Pekerjaan</a><br></DD>
            <DD><a href="{{url('bukalowongan')}}">Buka Pekerjaan</a><br></DD>
            <DD><a href="#">On Going Job</a><br></DD>
        </DT><br>
        <DT>Riwayat
                <DD><a href="#">Pembukaan Job</a></DD>
                <DD><a href="#">Apply Job</a></DD>
        </DT>
        <hr  style="height:1px;border:none;color:#333;background-color:#333;"/>

        <a href="#">Setting</a><br>
        <a href="#">FAQ & Help</a><br>
        </DT>
  </div>

    <!-- PROFILE -->
  <div id="container" class="col-md-9 col-xs-4 col-lg-9 container-fluid bg-grey">
        <div class="col-md-4 col-xs-2 col-lg-4">
			@if(\Auth::user()->avatar == "")
                  <img src="http://placehold.it/200x200" alt="">
                @else
                  <img src="{{URL::to('avatar').'/'.\Auth::user()->avatar}}" alt="">
                @endif
        </div>
        <div id="profile-header" class="col-md-7 col-xs-3 col-lg-7">
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
            <p>Media Sosial     : {{\Auth::user()->linkedin}}</p>
            <p>Web              : {{\Auth::user()->web}}</p>
            <p>Ketertarikan     : Massage, Telephone marketing</p>
            <p>Pekerjaan        : {{\Auth::user()->role}}</p>
            <p>Fakultas         : {{\Auth::user()->faculty}}</p>
            CV / Resume :
            <span><a href="#" download>click here to download</a></span></br>
          <a href="{{url('edit')}}" class="btn btn-danger">Edit Profile</a>
        </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 text-center">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Fasilkom, Universitas Indonesia</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> ask@uilancer.com</p>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center">
  <p>Copyright &copy; 2016. UILancer</p>
</footer>

<footer class="container-fluid text-center">
  <a href="#home" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br>
  <img src="logo2.png" alt="UILancer" width="200" height="50">
  <p>UILancer is marketplace for service blablabla</p>
  <a href="#">(+62) 813-681-999</a></br>
  <a href="#">ask@uilancer.com</a><br>
  <p>Made By <a href="" title="UILancer">PPL A6</a></p>
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
