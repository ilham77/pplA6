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

<div class="jumbotron text-center">
  <h1>UILancer Official Account</h1> 
</div>

<div id="services" class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h3>Apa itu Official Account?</h3>
          <p>UILancer Official Account merupakan akun resmi untuk Anda yang ingin mencari freelancer mahasiswa yang berkompeten dalam bidang yang Anda inginkan.</p>
        </div>
        <div class="panel-body">
          <p>Akun resmi UILancer</p>
          <p>Email resmi @uilancer.com</p>
          <p>Post Lowongan Pekerjaan tidak perlu menunggu untuk verifikasi</p>
          <p>Lowongan Pekerjaan akan muncul teratas di halaman hasil pencarian</p>
          <p>Job Manager untuk mengelola pelamar pekerjaan</p>
          <p>Melihat profil pelamar</p>
          <p>Halaman Profil dan Dashboard untuk Anda</p>
          <p>Testimoni dan rating freelancer</p>
          <p>Testimoni dapat ditampilkan di halaman depan UILancer</p>
        </div>
        <div class="panel-footer">
          <p>Untuk mendapatkan Official Account, Anda dapat kontak kami dengan email ke:</p>
          <a href="#">info@uilancer.com</a>
        </div>
      </div> 
    </div> 
    <div class="col-sm-6">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h3>Saya hanya ingin mencari freelancer...</h3>
          <p>Anda tetap dapat memasang lowongan pekerjaan Anda di UILancer tanpa Official Account, tetapi Anda tidak akan mendapati semua keuntung yang didapati Official Account.</p>
        </div>
        <div class="panel-body">
          <p>Post Lowongan Pekerjaan akan diproses dan diverifikasi oleh tim UILancer</p>
          <p>Melihat profil pelamar</p>
          <p>Testimoni dan rating freelancer</p>
        </div>
        <div class="panel-footer">
          <button class="btn btn-lg">Post Lowongan Pekerjaan Anda!</button>
        </div>
      </div> 
    </div>
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
