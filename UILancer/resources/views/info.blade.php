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
  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
  //<![CDATA[
    bkLib.onDomLoaded(function() { new nicEditor().panelInstance('deskripsiPekerjaan'); });
  //]]>
  </script> 
  <style type="text/css">
    /*<![CDATA[*/
    #myInstance1 {
      border: 2px dashed #0000ff;
    }

    .nicEdit-selected {
      border: 2px solid #0000ff !important;
    }
   
    .nicEdit-main {
      background-color: #fff !important;
    }
   /*]]>*/
    .jumbotron h1 {
      color: #fff;
      background-color: #000;
      text-align: center;
      padding-top: 30px;
      opacity: 0.6;
      width: 600px;
      height: 200px;
      margin-left: 400px;
    }
  </style>
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
      <a href="{{url('home')}}"><img src="logo2.png" alt="Logo" width="150px" height="50px" class="navbar-brand"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li data-toggle="modal" data-target="#myModal"><a href="#">Login</a></li>
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
            <p>Saya adalah...</p><br><br><br><br>
          <a href="{{url('sso-login')}}" class="btn btn-warning mt-20 font2">Mahasiswa UI</a>
            &nbsp<span>atau</span> &nbsp
          <a href="{{url('login')}}" class="btn btn-primary mt-20 font2">Akun Official</a><br>
        </div>
      </div>
            @endif
      <!-- Modal content-->
    </div>
</div>

<div class="jumbotron text-center">
  <h1>UILancer Official Account</h1> 
</div>

<div class="container-fluid">
  <div class="row">
    <div  class="col-sm-6">
      <div class="panel panel-default text-left">
        <div id="official" class="panel-heading">
          <center><h3>Apa itu Official Account?</h3></center>
          <p>UILancer Official Account merupakan akun resmi untuk Anda yang ingin mencari freelancer mahasiswa yang berkompeten dalam bidang yang Anda inginkan.</p>
        </div>
        <div class="panel-body text-left" style="height:350px;">
          <ul>
            <li>Akun resmi UILancer</li>
            <li>Email resmi @uilancer.com</li>
            <li>Post Lowongan Pekerjaan tidak perlu menunggu untuk verifikasi</li>
            <li>Lowongan Pekerjaan akan muncul teratas di halaman hasil pencarian</li>
            <li>Job Manager untuk mengelola pelamar pekerjaan</li>
            <li>Melihat profil pelamar</li>
            <li>Halaman Profil dan Dashboard untuk Anda</li>
            <li>Testimoni dan rating freelancer</li>
            <li>Testimoni dapat ditampilkan di halaman depan UILancer</li>
            <li>Logo dapat ditampilkan di halaman depan UILancer</li>
          </ul>
        </div>
        <div class="panel-footer text-center" style="height:100px;">
          <p>Untuk mendapatkan Official Account, Anda dapat kontak kami dengan email ke:</p>
          <a href="#">info@uilancer.com</a>
        </div>
      </div> 
    </div> 
    <div class="col-sm-6">
      <div class="panel panel-default text-center">
        <div id="no-official" class="panel-heading">
          <h3>Saya hanya ingin mencari freelancer...</h3>
          <p>Anda tetap dapat memasang lowongan pekerjaan Anda di UILancer, tetapi Anda tidak akan mendapati semua keuntungan yang didapat sebagai Official Account.</p>
        </div>
        <div class="panel-body text-left" style="height:350px;">
          <ul>
            <li>Post Lowongan Pekerjaan akan diproses dan diverifikasi oleh tim UILancer</li>
            <li>Melihat profil pelamar</li>
            <li>Testimoni dan rating freelancer</li>
          </ul>
        </div>
        <div class="panel-footer" style="height:100px;">
          <button class="btn btn-lg" onclick="location.href='#form-pekerjaan';">Post Lowongan Pekerjaan Anda!</button>
        </div>
      </div> 
    </div>
  </div> 
</div>
    
<div id="form-pekerjaan" class="container-fluid bg-grey slideanim">   
  @if (count($errors))
  <div class="well well-sm" id="error">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <br><br>
  <center><h1>POST LOWONGAN PEKERJAAN</h1></center>
  <form action="post-lowongan" method="POST" role="form" enctype="multipart/form-data">
    {{csrf_field()}}
    <br/>

    <div class="form-group">
      <label for="name" class="control-label">Nama Lengkap</label>
      <input name="name" type="text" class="form-control" placeholder="Tuliskan nama lengkap anda...">
    </div>
             
    <div class="form-group">
      <label for="asal_instansi" class="control-label">Asal Instansi</label>
      <input name="asal_instansi" type="text" class="form-control" placeholder="Tuliskan asal instansi anda...">
    </div>
             
    <div class="form-group">
      <label for="email" class="control-label">Email</label>
      <input name="email" type="email" class="form-control" placeholder="example@mail.com">
    </div>

    <div class="form-group">
      <label for="no_telp" class="control-label">No. Telepon</label>
      <input name="no_telp" type="number" class="form-control" placeholder="Tuliskan nomer telepon anda..." min="0"  >
    </div>
             
    <div class="form-group">
      <label for="deadline" class="control-label">Tanggal lowongan ditutup</label>
      <input name="deadline" type="date" class="form-control"  >
    </div>
              
    <div class="form-group">
      <label for="estimasi" class="control-label">Perkiraan waktu pengerjaan (dalam minggu)</label>
      <input name="estimasi" type="number" class="form-control" min="0" max="52"   placeholder="Tuliskan perkiraan lama waktu pengerjaan...">
    </div>
             
    <div class="form-group">
      <label for="budget" class="control-label">Budget (dalam IDR )</label>
      <input name="budget" type="number" class="form-control"   placeholder="Tuliskan budget untuk pekerjaan yang anda post...">
    </div>

    <div class="form-group">
      <label for="judul" class="control-label">Judul Pekerjaan</label>
      <input name="judul" type="text" class="form-control" placeholder="Tuliskan judul pekerjaan yang ingin anda post...">
    </div>

    <div class="form-group">
      <label for="deskripsiPekerjaan" class="control-label">Deskripsi Pekerjaan</label>
      <textarea id="deskripsiPekerjaan" name="deskripsiPekerjaan" style="resize:none;" cols="5" rows="10" class="form-control" placeholder="Deskripsikan pekerjaan yang ingin anda post..."></textarea>
    </div>
              
    <div class="form-group">
      <label for="website" class="control-label">Website</label>
      <input name="website" type="text" class="form-control" placeholder="http://www.example.com">
    </div>
              
    <div class="form-group">
      <label for="skill" class="control-label">Skill yang dibutuhkan</label>
      <input name="skill" type="text" class="form-control" placeholder="Pisahkan dengan ';' (e.g. PHP;HTML5;Java;etc.)">
    </div>
    
    {!! Form::submit('POST LOWONGAN', array('class'=>'btn btn-success')) !!}
    <div class="divider"></div>
    <button class="btn btn-danger"><a style="color:white; text-decoration:none;" href="{{URL::previous()}}">KEMBALI</a></button>
  </form>
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
          <input class="form-control" id="name" name="name" placeholder="Name" type="text"  >
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email"  >
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-danger pull-right" type="submit">Send</button>
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
$('button').click(function(){
    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
    return false;
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
