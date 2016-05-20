<<<<<<< HEAD
=======

>>>>>>> refs/remotes/origin/master
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>UILancer - Edit Profile</title>
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
      <div class="col-lg-6">
        <div class="page-header"></div>
            
            <h1>Edit Profile</h1>

            <form action="saveprofile" method="POST" role="form" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                <label for="avatar" class="control-label">Ganti Foto Profil</label><br/><br/>
                @if(\Auth::user()->avatar == "")
                  <img src="http://placehold.it/200x200" alt="">
                @else
                  <img src="{{URL::to('avatar').'/'.\Auth::user()->avatar}}" alt="">	
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
                <input name="nama" type="text" class="form-control" placeholder="Nama..." value="{{\Auth::user()->name}}">
              </div>
              
              <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input name="email" type="email" class="form-control" placeholder="example@mail.com" value="{{\Auth::user()->email}}">
              </div>
                
              <div class="form-group">
                <label for="tempat" class="control-label">Tempat Kelahiran</label>
                <input name="tempat" type="text" class="form-control" placeholder="Tempat kelahiran..." value="{{\Auth::user()->tempat_lahir}}">
              </div>
              
              <div class="form-group">
                <label for="tanggal" class="control-label">Tanggal Lahir</label>
                <input name="tanggal" type="date" class="form-control" value="{{\Auth::user()->tanggal_lahir}}">
              </div>

              <div class="form-group">
                <label for="deskripsi" class="control-label">Deskripsi</label>
                <textarea name="deskripsi" style="resize:none;" cols="5" rows="10" class="form-control"placeholder="Deskripsikan diri anda...">{{\Auth::user()->deskripsi}}</textarea>
              </div>
              
              <div class="form-group">
                <label for="linkedin" class="control-label">Linkedin</label>
                <input name="linkedin" type="text" class="form-control" placeholder="http://linkedin.com/12345-example" value="{{\Auth::user()->linkedin}}">
              </div>
              
              <div class="form-group">
                <label for="web" class="control-label">Website pribadi</label>
                <input name="web" type="text" class="form-control" placeholder="http://www.example.com" value="{{\Auth::user()->web}}">
              </div>
              
              <div class="form-group">
                <label for="skills" class="control-label">Skills</label>
                <input name="skills" type="text" class="form-control" placeholder="Pisahkan dengan ';' (e.g. PHP;HTML5;Java;etc.)">
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

              @if (count($errors))

                <div class="well well-sm" id="error">
                  <ul>

                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach

                  </ul>
                </div>

              @endif

              {!! Form::submit('Simpan', array('class'=>'btn btn-success')) !!}

              <button class="btn btn-danger"><a style="color:white; text-style:none;" href="{{URL::previous()}}">Back</a></button>
            </form>   
            <br>
<br> 
        </div>
    </div>
  </div>


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
