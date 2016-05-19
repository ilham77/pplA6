<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UILancer - Dashboard</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="style-dashboard.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
  @extends('layoutDashboard')
  @section('content')

  <div class="col-sm-9 col-sm-offset-3 col-lg-8 col-lg-offset-3 main">
    <div class="row">
      <div class="col-lg-12">
        <div id="form" class="container-fluid">
  <h1 class="text-left" style="margin-top:35px">Cari Lowongan Kerja</h1>
  <div class="row">
    <div class="col-md-8">
      <form action="searchPekerjaan" method="POST">
      {{csrf_field()}}
        <div class="form-group">
          <input required type="text" class="form-control" name="kunci" placeholder="Masukkan pekerjaan, skill, atau kata kunci lainnya"></input>
        </div>
        <hr style="border: 1 none;">
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
                            <input type="number" class="form-control" name="minimumHonor" placeholder="Dalam Rupiah (Rp)">
                        </div>
                        <div class="col-md-1" style="width:45px;">
                            to
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="maksimumHonor" placeholder="Dalam Rupiah (Rp)">
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
                    <option>Lowong</option>
                    <option>Done</option>
                    <option>Tutup</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                    <label for="rangePembuatanThread" class="col-md-3 control-label" >Waktu Pembuatan Thread</label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="minimumTgl" placeholder="Dalam Rupiah (Rp)">
                        </div>
                        <div class="col-md-1" style="width:45px;">
                            to
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="maksimumTgl" placeholder="Dalam Rupiah (Rp)">
                        </div>
                </div>
              <br>
            <input type="hidden" name="flag" value="Dash">
            <button type="submit" class="btn btn-defautl  left-block btn-lg">Cari Lowongan!</button>
          </form>
    </div>
  </div>
</div>


      </div>
    </div><!--/.row-->
  </div><!--/.row-->

  @stop

  <script>
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
