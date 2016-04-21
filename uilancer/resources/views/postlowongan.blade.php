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

<div id="form" class="container-fluid">
  <h1 class="text-center">Buka Lowongan Kerja</h1>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form action="addlowongan" method="POST" role="form">
        <div class="form-group">
          <label for="judul">Judul Pekerjaan</label>
          <input type="text" class="form-control" name="judul" placeholder="Judul pekerjaan..."></input>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi Pekerjaan</label>
          <textarea class="form-control" name="deskripsi" placeholder="Deskripsi pekerjaan..."></textarea>
        </div>
        <div class="form-group">
          <label for="skilltag">Skill yang diperlukan (dipisah dengan ";")</label>
          <input type="text" class="form-control" name="skilltag" placeholder="skill1;skill2;etc..."></input>
        </div>
        <div class="form-inline">
          <div class="form-group">
            <label for="budget">Budget</label>
            <input type="text" class="form-control" name="budget" placeholder="dalam Rupiah (Rp)"></input>
          </div>
          <div class="form-group">
            <label for="estimasi">Estimasi waktu pengerjaan (dalam minggu)</label>
            <input type="number" class="form-control" name="estimasi" min="1"></input>
          </div>
        </div>
        <br>
        <div class="form-inline">
          <div class="form-group">
            <label for="waktututup">Deadline pencarian:</label>
            <input type="date" class="form-control" name="tanggaltutup"></input>
            <input type="time" class="form-control" name="jamtutup"></input>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-defautl center-block btn-lg">Buka Lowongan!</button>
      </form>
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
