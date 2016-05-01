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
           
            <p>Login</p>
          
            </a></li>
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
        <button type="button" class="btn btn-danger">Non UI</button>
        <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>

<!-- EDIT PROFILE -->
  <div id="body" class="container-fluid">
    <div id="sidebar" class="container-fluid col-md-3 col-xs-1 col-lg-3">
        <DL>
        <DT>Menu
            <DD><a href="#">Daftar Pekerjaan</a><br></DD>
            <DD><a href="#">Cari Pekerjaan</a><br></DD>
            <DD><a href="#">Buka Pekerjaan</a><br></DD>
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
    <div id="container" class="col-md-9 col-xs-4 col-lg-9 container-fluid bg-grey">
        <div id="content" class="container col-md-8 col-xs-4 col-lg-8 col text-left">
            <p>
            <h1>Edit Profile</h1>

            <form action="saveprofile" method="POST" role="form" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                <label for="avatar" class="control-label">Ganti Foto Profil</label><br/><br/>
                @if($avatar=="")
                  <img src="http://placehold.it/200x200" alt="">
                @else
                  <img src="{{URL::to('/avatar').'/'.$avatar}}" width="200px" height="200px" alt="">	
                @endif
                <br/>
                <br/>
                <div class="input-group">
                  <span class="input-group-btn">
                      <span class="btn btn-primary btn-file">
                          Browse&hellip; <input type="file" name="avatar">
                      </span>
                  </span>
                  <input type="text" class="form-control" readonly>
                </div>
                <span>Max. 2 MB</span>
              </div>
              <br/>
              <div class="form-group">
                <label for="nama" class="control-label">Nama</label>
                <input name="nama" type="text" class="form-control" placeholder="Nama...">
              </div>
              
              <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input name="email" type="email" class="form-control" placeholder="example@mail.com">
              </div>
                
              <div class="form-group">
                <label for="tempat" class="control-label">Tempat Kelahiran</label>
                <input name="tempat" type="text" class="form-control" placeholder="Tempat kelahiran...">
              </div>
              
              <div class="form-group">
                <label for="tanggal" class="control-label">Tanggal Lahir</label>
                <input name="tempat" type="date" class="form-control">
              </div>

              <div class="form-group">
                <label for="deskripsi" class="control-label">Deskripsi</label>
                <textarea name="deskripsi" style="resize:none;" cols="5" rows="10" class="form-control"placeholder="Deskripsikan diri anda..."></textarea>
              </div>
              
              <div class="form-group">
                <label for="linkedin" class="control-label">Linkedin</label>
                <input name="linkedin" type="text" class="form-control" placeholder="http://linkedin.com/12345-example">
              </div>
              
              <div class="form-group">
                <label for="web" class="control-label">Website pribadi</label>
                <input name="web" type="text" class="form-control" placeholder="http://www.example.com">
              </div>
              
              <div class="form-group">
                <label for="pekerjaan" class="control-label">Pekerjaan</label>
                <input name="pekerjaan" type="text" class="form-control" placeholder="Pekerjaan anda...">
              </div>
              
              <div class="form-group">
                <label for="skills" class="control-label">Skills</label>
                <input name="skills" type="text" class="form-control" placeholder="Pisahkan dengan ';' (e.g. PHP;HTML5;Java;etc.)">
              </div>

              <div class="form-group">
                <label for="password" class="control-label">Password Baru</label>
                <input name="password" type="password" class="form-control">
              </div>
              
              <div class="form-group">
                <label for="passconfirm" class="control-label">Konfirmasi Password</label>
                <input name="passconfirm" type="password" class="form-control">
              </div>
                
              <div class="form-group">
                <label id="file-pendukung" class="control-label">Upload CV/Resume (optional)</label>
                <div class="input-group">
                  <span class="input-group-btn">
                      <span class="btn btn-primary btn-file">
                          Browse&hellip; <input type="file" name="cvresume">
                      </span>
                  </span>
                  <input type="text" class="form-control" readonly>
                </div>
              </div>
              <br/>
              {!! Form::submit('Simpan', array('class'=>'btn btn-success')) !!}
              <button class="btn btn-danger"><a style="color:white; text-style:none;" href="{{URL::previous()}}">Back</a></button>
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
});

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});
</script>

</body>
</html>
