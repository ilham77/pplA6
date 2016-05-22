<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UILancer - Buka Pekerjaan</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="{{ asset('style.css') }}">
  <link href="style-dashboard.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
  //<![CDATA[
          bkLib.onDomLoaded(function() { new nicEditor().panelInstance('deskripsiPekerjaan'); });
    //]]>
  </script>
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  @extends('layoutDashboard')
  @section('content')
  
  <!-- Sidebar -->  
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">

      <li><a href="./"><span class="glyphicon glyphicon-home"></span> Home</a></li>     
      <li><a href="{{url('dashboard')}}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Daftar Pekerjaan</a></li>
      <li><a href="{{url('search-dashboard')}}"><span class="glyphicon glyphicon-search"></span> Cari Pekerjaan</a></li>
      <li class="active"><a href="bukalowongan"><span class="glyphicon glyphicon-pencil"></span> Buka Pekerjaan</a></li>
      <li class="parent ">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-1"><span class="glyphicon glyphicon-chevron-down"></span></span> Riwayat 
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-folder-open"></span> Pembukaan Pekerjaan
            </a>
          </li>
          <li>
            <a class="" href="#">
              <span class="glyphicon glyphicon-check"></span> Apply Job
            </a>
          </li>
        </ul>
      </li>
      <li><a href="#"><span class="glyphicon glyphicon-tasks"></span> On-Going Job</a></li>
      <li><a href="faq"><span class="glyphicon glyphicon-question-sign"></span> FAQ &amp; Help</a></li>
    </ul>

  </div><!--/.sidebar-->

  <div class="col-sm-9 col-sm-offset-3 col-lg-8 col-lg-offset-3 main">
    <div class="row">
      <div class="col-lg-12">
        <div id="form" class="container-fluid">
          <h1 class="text-left" style="margin-top:35px">Buka Pekerjaan</h1><br>
          <div class="row">
              <div class="col-md-8">
                <form action="addlowongan" method="POST" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="judul">Judul Pekerjaan</label>
                      <input type="text" class="form-control" name="judul" placeholder="Judul pekerjaan..." value="{{old('judul')}}"></input>
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi Pekerjaan</label>
                      <textarea id="deskripsiPekerjaan" class="form-control" name="deskripsiPekerjaan" placeholder="Deskripsi pekerjaan...">{{old('deskripsi')}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="skilltag">Skill yang diperlukan (dipisah dengan ";")</label>
                      <input type="text" class="form-control" name="skill" placeholder="skill1;skill2;etc..." value="{{old('skill')}}"></input>
                    </div>
                    <div class="form-inline">
                      <div class="form-group">
                        <label for="budget">Budget</label>
                        <input type="text" class="form-control" name="budget" placeholder="dalam Rupiah (Rp)" value="{{old('budget')}}"></input>
                      </div>
                      <div class="form-group">
                        <label for="estimasi">Estimasi waktu pengerjaan (dalam minggu)</label>
                        <input type="number" class="form-control" name="estimasi" min="1" value="{{old('estimasi')}}"></input>
                      </div>
                    </div>
                    <br>
                    <div class="form-inline">
                      <div class="form-group">
                        <label for="waktututup">Deadline pencarian:</label>
                        <input type="date" class="form-control" name="deadline" value="{{old('deadline')}}"></input>
                      </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-success left-block btn-lg">Buka Lowongan</button>
                  </form>

                  @if (count($errors))

                    <div class="well well-sm" id="error">
                      <ul>

                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach

                      </ul>
                    </div>

                  @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Container (Contact Section) 
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
-->

@stop

<script>
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("deadline")[0].setAttribute('min', today);
!function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
            $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 

        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })

        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
</script>

</body>

</html>
