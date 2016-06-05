
<!DOCTYPE html>
<html lang="en">

<head>
  <title>UILancer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="{{ asset('style-dashboard.css') }}" rel="stylesheet">   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

  <!-- Navigasi Bar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#home"><img src="logo2.png" alt="Logo" width="150px" height="50px" class="navbar-brand"></a>
        <ul class="user-menu">

          <!-- Notifikasi -->
          <li role="presentation" class="dropdown pull-right" id="notifikasi">
                    <a href="#" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                      <span class="glyphicon glyphicon-bell"</span>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                      <li>
                        <a>
                          <span class="image">
                            <img src="img.jpg" alt="Profile Image" />
                          </span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <a>
                          <span class="image">
                            <img src="img.jpg" alt="Profile Image" />
                          </span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <a>
                          <span class="image">
                            <img src="img.jpg" alt="Profile Image" />
                          </span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <a>
                          <span class="image">
                            <img src="img.jpg" alt="Profile Image" />
                          </span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li>
                        <div class="text-center">
                          <a href="#">
                            <strong>See All Alerts</strong>
                            <span class="glyphicon glyphicon-menu-right"</span>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>

                  <!-- Menu User -->
          <li class="dropdown pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span>
              <span style="font-family: Lato, sans-serif;">{{\Auth::user()->name}}</span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{url('dashboard')}}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
              <li><a href="{{url('edit')}}"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
              <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-remove-circle"></span> Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>

    </div><!-- /.container-fluid -->
  </nav>



  <!-- Sidebar -->
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
      @if(Auth::user()->role == 'admin')
      <li class="parent">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-2"><span class="glyphicon glyphicon-th-large"></span> Admin Menu </span>
        </a>
        <ul class="children collapse" id="sub-item-2">
          <li>
            <a class="" href="{{url('inbox')}}">
              <span class="glyphicon glyphicon-inbox"></span> Inbox
            </a>
          </li>
          <li>
            <a class="" href="{{url('manageUser')}}">
              <span class="glyphicon glyphicon-pawn"></span> Manajemen User
            </a>
          </li>
        </ul>
      </li>
      @endif
      <li class="active"><a href="{{url('dashboard')}}"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
      <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-list-alt"></span> Daftar Pekerjaan</a></li>
      <li><a href="{{url('search-dashboard')}}"><span class="glyphicon glyphicon-search"></span> Cari Pekerjaan</a></li>
      <li><a href="{{url('bukalowongan')}}"><span class="glyphicon glyphicon-pencil"></span> Buka Pekerjaan</a></li>
      <li class="parent ">
        <a href="#">
          <span data-toggle="collapse" href="#sub-item-1"><span class="glyphicon glyphicon-chevron-down"></span></span> Riwayat
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li>
            <a class="" href="{{url('riwayatJobGiver')}}">
              <span class="glyphicon glyphicon-folder-open"></span> Pembukaan Pekerjaan
            </a>
          </li>
          @if(Auth::user()->role == 'mahasiswa')
            <li>
              <a class="" href="{{url('riwayatApply')}}">
                <span class="glyphicon glyphicon-check"></span> Apply Job
              </a>
            </li>
          @endif
        </ul>
      </li>
 <li><a href="{{URL::to('ongoing').'/'.Auth::user()->id}}"><span class="glyphicon glyphicon-tasks"></span> On-Going Job</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span> FAQ &amp; Help</a></li>
    </ul>
  </div><!--/.sidebar-->

  <div class="col-sm-7 col-sm-offset-3 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
                <div id="form" class="container-fluid">
  <b><h1 class="text-left" style="margin-top:35px">Edit Profil</h1></b>
<br>
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
                          <input type="file" name="avatar">
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
                <label id="file-pendukung" class="control-label">Upload CV/Resume (optional) - File harus berupa .pdf</label>
                <div class="input-group">
                  <span class="input-group-btn">
                      <span class="btn btn-primary btn-file">
                          <input type="file" name="cvresume">
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
      </div>
    </div>
  </div>

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
