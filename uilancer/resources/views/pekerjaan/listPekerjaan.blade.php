<!DOCTYPE html>
<html>
<head>
	<title>Ini halaman list pekerjaan</title>
</head>
<body>
<table border="1" style="width:100%">
<h1>Halaman List Semua Pekerjaan</h1>
  <tr>
    <td><center>Judul Pekerjaan</center></td>
    <td><center>Deskripsi Pekerjaan</center></td>		
    <td><center>Status</center></td>
    <td><center>Progress</center></td>
  </tr>
	@if(count($pekerjaans))
		@foreach($pekerjaans as $pekerjaan)
			<div class="container">
    <div class = "panel panel-default">
			<div class="panel-body">
                    <h4><a href="pekerjaan/{{ $pekerjaan->id }}">{{ $pekerjaan->judul_pekerjaan }}</a></h4>

                
<div class ="col-md-3 col-xs-1 col-lg-3">			 
                <span class="glyphicon glyphicon-user"></span><span> User</span>				
                </div> 
                <div class ="col-md-3 col-xs-1 col-lg-3">
                  <span class="glyphicon glyphicon-time">{{ $pekerjaan->endDate }}</span>
							
                </div>
                
                <div class ="col-md-3 col-xs-1 col-lg-3">
                  @if($pekerjaan->isTaken)
                  <span class="glyphicon glyphicon-folder-closed"></span><span>Closed</span>
							@else
								 <span class="glyphicon glyphicon-folder-open"></span><span> Open</span>
							@endif
                </div>
                
               <div class ="col-md-3 col-xs-1 col-lg-3">
							@if($pekerjaan->isDone)				 
                <span class="glyphicon glyphicon-check"></span><span> Done</span>
							@else
								<span class="glyphicon glyphicon-unchecked"></span><span> Not Done</span>
							@endif
                </div>
           <br><hr>
                
          <div class="deskripsi">
              <span class="glyphicon glyphicon-usd"></span>
              <span> {{$pekerjaan->budget}}</span><br>
                <h4>{{ $pekerjaan->deskripsi_pekerjaan }}</h4>
           </div>
                <div class="text-right">
                            <a href="pekerjaan/{{ $pekerjaan->id }}" class="btn btn-primary">Lihat Detail </a>
                </div>
            </div>
		</div>	
    </div>			
		@endforeach
	@else
		<h2>Tidak ada pekerjaan</h2>
	@endif
</table>
</body>
</html>