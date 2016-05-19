<!DOCTYPE html>
<html lang="en">
<head>
  <title>UILancer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="style-dashboard.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

@extends('layoutDashboard')
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-8 col-lg-offset-2 main">
<div id="form" class="container-fluid">
  <h1 class="text-center">Buka Lowongan Kerja</h1>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form action="addlowongan" method="POST" role="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="judul">Judul Pekerjaan</label>
          <input type="text" class="form-control" name="judul" placeholder="Judul pekerjaan..." value="{{old('judul')}}"></input>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi Pekerjaan</label>
          <textarea class="form-control" name="deskripsiPekerjaan" placeholder="Deskripsi pekerjaan...">{{old('deskripsi')}}</textarea>
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
        <button type="submit" class="btn btn-success center-block btn-lg">Buka Lowongan!</button>
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
