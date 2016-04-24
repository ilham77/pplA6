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
  <div class="col-md-offset-2">
  <h1 class="text-left">Cari Lowongan Kerja</h1>
</div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form action="/pplA6/uilancer/public/searchPekerjaan" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="kunci" placeholder="Masukkan pekerjaan, skill, atau kata kunci lainnya"></input>
        </div>
        <hr>
        <h3 class="text-left">Filter</h3>
              <div class="form-group row">
                <label for="pencariPekerja" class="col-md-3 control-label">Pencari Pekerja</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="pencari" placeholder="Nama">
                </div>
              </div>
                <div class="form-group row">
                    <label for="rangeHonor" class="col-md-3 control-label" >Range Honor</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="minimumHonor" placeholder="Dalam Rupiah (Rp)">
                        </div>
                        <div class="col-md-1" style="width:45px;">
                            to
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="maksimumHonor" placeholder="Dalam Rupiah (Rp)">
                        </div>
                </div>
              <div class="form-group row">
                <label for="durasiPekerjaan" class="col-md-3 control-label">Durasi Pekerjaan</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="durasi" placeholder="Dalam pekan">
                </div>
              </div>
              <div class="form-group row">
                <label for="statusPekerjaan" class="col-md-3 control-label">Status</label>
                <div class="col-md-8">
                  <select class="form-control" name="status">
                    <option>Done</option>
                    <option>Lowong</option>
                    <option>Tutup</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                    <label for="rangePembuatanThread" class="col-md-3 control-label" >Waktu Pembuatan Thread</label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="minimumHonor" placeholder="Dalam Rupiah (Rp)">
                        </div>
                        <div class="col-md-1" style="width:45px;">
                            to
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" id="maksimumHonor" placeholder="Dalam Rupiah (Rp)">
                        </div>
                </div>
              <br>

            <button type="submit" class="btn btn-defautl  center-block btn-lg">Cari Lowongan!</button>
          </form>
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
