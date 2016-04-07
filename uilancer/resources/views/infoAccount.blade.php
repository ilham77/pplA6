<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>UILancer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
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
        <li><a href="#">About Us</a></li>
        <li><a href="#testimoni">Testimoni</a></li>
        <li><a href="#partner">Partner</a></li>
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
			<button type="button" class="btn btn-danger">UI</button>
			<button type="button" class="btn btn-danger">Non UI</button><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>

<div class="jumbotron text-center">
  <h1>UILancer</h1> 
  <p>taglinetagline</p> <!-- insert tagline here! -->
</div>

<!-- Container (Why UILancer Section) -->
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

<!-- Container (menu Section) -->
<div id="menu" class="container-fluid text-center bg-grey">
  <a href="#home">Home</a><br>
  <a href="#">How It Works</a></br>
  <a href="#">Browse</a></br>
  <a href="#">FAQ</a><br>
  <a href="#">Help</a><br>
</div>

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
