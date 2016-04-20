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
				<tr>
					<td><center><a href="/uilancer/public/pekerjaan/{{ $pekerjaan->id }}">{{ $pekerjaan->judul_pekerjaan }}</a></center></td>
					<td><center>{{ $pekerjaan->deskripsi_pekerjaan }}</center></td>
					<td><center>
					@if($pekerjaan->isTaken)
						Sudah Diambil
					@else
						Lowong
					@endif
					</center></td>
					<td><center>
					@if($pekerjaan->isDone)
						Udah Kelar
					@else
						Belom Kelar
					@endif
					</center></td>
				</tr>
		@endforeach
	@else
		<h2>Tidak ada pekerjaan</h2>
	@endif
</table>
</body>
</html>