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
<body>


<!-- <div id="form" class="container-fluid">
  <h1 class="text-center">Buka Lowongan Kerja</h1>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <form action="addlowongan" method="POST" role="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="judul">Judul Pekerjaan</label>
          <input type="text" class="form-control" name="judul" placeholder="Judul pekerjaan..."></input>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi Pekerjaan</label>
          <textarea class="form-control" name="deskripsiPekerjaan" placeholder="Deskripsi pekerjaan..."></textarea>
        </div>
        <div class="form-group">
          <label for="skilltag">Skill yang diperlukan (dipisah dengan ";")</label>
          <input type="text" class="form-control" name="skill" placeholder="skill1;skill2;etc..."></input>
        </div>
        <div class="form-inline">
          <div class="form-group">
            <label for="budget">Budget</label>
            <input type="text" class="form-control" name="budget" placeholder="dalam Rupiah (Rp)"></input>
          </div>
          &nbsp
          <div class="form-group">
            <label for="estimasi">Estimasi waktu pengerjaan (dalam minggu) </label>
            <input type="number" class="form-control" name="estimasi" min="1"></input>
          </div>
        </div>
        <br>
        <div class="form-inline">
          <div class="form-group">
            <label for="waktututup">Deadline pencarian:</label>
            <input type="date" class="form-control" name="deadline"></input>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success center-block btn-lg">Buka Lowongan!</button>
      </form>
    </div>
  </div>
</div> -->


<div class="container" style="margin-top:35px">
    <div class="row">
        <div class="col-sm-3 col-md-2">

        </div>
        <div class="col-sm-9 col-md-10">
           
            <div class="pull-right">
                <span class="text-muted"><b>1</b>–<b>50</b> of <b>160</b></span>
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">

        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Pembuatan Pekerjaan</a></li>
                <li><a href="#profile" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>
                    Report User</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                          <span class="name" style="min-width: 300px; display: inline-block;">Mark Otto</span>
                          <span class="">Judul Pekerjaan</span>
                          <span class="text-muted" style="font-size: 11px;">- Asal Institusi</span> 
                          <span class="badge">12:10 AM</span> <span class="pull-right"></span>
                        </a>
                        <a href="#" class="list-group-item">
                          <span class="name" style="min-width: 300px; display: inline-block;">Luthfi Kurnia Putra</span>
                          <span class="">Membuat game</span>
                          <span class="text-muted" style="font-size: 11px;">- PT MMC Rajawali</span> 
                          <span class="badge">12:05 AM</span> <span class="pull-right"></span>
                        </a>
                        <a href="#" class="list-group-item">
                          <span class="name" style="min-width: 300px; display: inline-block;">Hadaiq Rolis Sanabila</span>
                          <span class="">Membuat soal SDA</span>
                          <span class="text-muted" style="font-size: 11px;">- Fasilkom UI</span> 
                          <span class="badge">12:00 AM</span> <span class="pull-right"></span>
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade in" id="profile">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                          <span class="name" style="min-width: 300px; display: inline-block;">Mark Otto</span>
                          <span class="">Judul Report</span>
                          <span class="text-muted" style="font-size: 11px;">- Asal Institusi</span> 
                          <span class="badge">12:10 AM</span> <span class="pull-right"></span>
                        </a>
                        <a href="#" class="list-group-item">
                          <span class="name" style="min-width: 300px; display: inline-block;">Luthfi Kurnia Putra</span>
                          <span class="">Tidak memberikan bayaran</span>
                          <span class="text-muted" style="font-size: 11px;">- PT MMC Rajawali</span> 
                          <span class="badge">12:05 AM</span> <span class="pull-right"></span>
                        </a>
                        <a href="#" class="list-group-item">
                          <span class="name" style="min-width: 300px; display: inline-block;">Hadaiq Rolis Sanabila</span>
                          <span class="">Tidak mengaccept status pekerjaan</span>
                          <span class="text-muted" style="font-size: 11px;">- Fasilkom UI</span> 
                          <span class="badge">12:00 AM</span> <span class="pull-right"></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


</body>
</html>