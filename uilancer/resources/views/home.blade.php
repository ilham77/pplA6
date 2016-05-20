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
      
        <li data-toggle="modal" data-target="#myModal">
            <a href="#">
              @if(\Auth::check())
                <p>Welcome, {{\Auth::user()->name}}</p>
              @else
                <p>Login</p>
              @endif
            </a>
        </li>
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
          <h4 class="modal-title">Menu</h4>
        </div>
        <div class="modal-body">
          <a href="{{url('logout')}}" class="btn btn-danger">Logout</a>
          <div class="divider"></div>
          <a href="{{url('dashboard')}}" class="btn btn-danger">Profil</a>
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
    </div>
</div>

<div class="jumbotron text-center" style="background-image: url('bgr1.jpg');">
  <h1>Find Freelancer</h1> 
  <p>What kind of service are you looking for ?</p> 
  <form action="searchPekerjaan" method="POST" class="form-inline">
    {{ csrf_field() }}<input type="text" name="kunci" class="form-control" size="50" placeholder="Example: website, etc " required>
    <input type="hidden" name="flag" value="nonDash">
    <button type="submit" class="btn btn-danger">Search</button><br>
  </form>
  <br>
  <br>
  <form>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" href="#">I Want to Hire</button><br>
<<<<<<< HEAD
  <a href="infoAccount" style="font-weight: bold; text-decoration: none;">Don't have official account?</a>
=======
  <a href="info">Don't have official account?</a>
>>>>>>> refs/remotes/origin/master
  </form>
</div>

<!-- Container (About Us Section) -->
<div id="about" class="container-fluid">
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

<!-- Container (Why UILancer Section) -->
<div id="services" class="container-fluid text-center">
  <h2>Why UILancer?</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>POWER</h4>
      <p>Kami memberikan layanan yang terbaik</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-refresh logo-small"></span>
      <h4>UPDATE</h4>
      <p>Informasi lowongan yang kami berikan selalu diperbarui</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>JOB DONE</h4>
      <p>Semua pekerjaan yang diberikan dikerjakan dengan tuntas</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-check logo-small"></span>
      <h4>CHECK</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>CERTIFIED</h4>
      <p>Terpercaya dan aman dengan informasi yang kami berikan</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4>HARD WORK</h4>
      <p>Dikerjakan oleh tim dengan kerja keras</p>
    </div>
  </div>
</div>

<!-- Container (Testimoni Section) -->
<div id="testimoni" class="container-fluid text-center bg-grey">
  <h2>What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
      </div>
      <div class="item">
        <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
      </div>
      <div class="item">
        <h4>"Could I... BE any more happy with this website?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div><br>
</div>

<!-- Container (Partner Section) -->
<div id="partner" class="container-fluid text-center">  
  <h2>Partner</h2><br>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="1.png" alt="CDC" width="400" height="300">
        <p><strong>Partner</strong></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="2.png" alt="ABC" width="400" height="300">
        <p><strong>Partner</strong></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="3.png" alt="DEF" width="400" height="300">
        <p><strong>Partner</strong></p>
      </div>
    </div>
  </div>
</div>

<!-- Container (Statistik Section) -->
<div id="statistik" class="container-fluid text-center bg-grey">  
  <div class="row text-center slideanim">
    <div class="col-sm-4">
        <h1><strong>8,715</strong></h1>
        <h2><strong>Job Terpasang</strong></h2>
    </div>
    <div class="col-sm-4">
        <h1><strong>IDR 10,500,782,190</strong></h1>
        <h2><strong>Jumlah Job Keseluruhan (IDR)</strong></h2>
    </div>
    <div class="col-sm-4">
        <h1><strong>50,341</strong></h1>
        <h2><strong>Jumlah Pekerja</strong></h2>
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