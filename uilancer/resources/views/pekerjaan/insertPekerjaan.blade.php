<!DOCTYPE html>
<html>
<head>
	<title>Halaman Insert Pekerjaan</title>
</head>
<body>
<h1>Form untuk menginput pekerjaan</h1>
<form action="/pplA6/uilancer/public/addPekerjaan" method="POST" class="form-horizontal">
   {{ csrf_field() }}
   Judul Pekerjaan &nbsp : <input type="text" name="judul_pekerjaan"><br>
   Deksripsi Pekerjaan  &nbsp : <input type="text" name="deskripsi_pekerjaan"><br>
   Status Verifikasi (0 atau 1)  &nbsp : <input type="text" name="verifikasi"><br>
   Skill Tag (pisahkan dengan koma)  &nbsp : <input type="text" name="skill_tag"><br>
   <br><button type="submit">Add Pekerjaan</button>
</form>
</body>
</html>