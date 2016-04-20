<!DOCTYPE html>
<html>
<head>
	<title>Pekerjaan {{ $hasil->judul_pekerjaan }}</title>
</head>
<body>
<h1>{{ $hasil->judul_pekerjaan }}</h1>
Deksripsi Pekerjaan : {{ $hasil->deskripsi_pekerjaan }}<br>
Status : 
@if($hasil->isTaken)
	Sudah Diambil
@else
	Lowong
@endif<br>
Progress : 
@if($hasil->isDone)
	Udah Kelar
@else
	Belom Kelar
@endif<br>


<h2>Skill Tag</h2>
@if(count($hasill))
<ol>
	@foreach($hasill as $skill)
		<li>{{ $skill->skill }}</li>
	@endforeach
</ol>
@endif
</body>
</html>