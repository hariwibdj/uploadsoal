<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
	header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>

<html>
<head>
	<title>Halaman Setelah Login</title>
</head>
<body>
	<h1>Selamat datang <?php echo $_SESSION['nama']; ?></h1>
	<h4>Anda berhasil login ke dalam aplikasi. Berikut data diri Anda yang tersimpan pada database kami :</h4>

	<table style="margin-bottom: 15px;">
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><?php echo $_SESSION['username'] ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $_SESSION['nama'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo $_SESSION['email'] ?></td>
		</tr>
	</table>

	<br>
	<br>
	<table border="1">
		<tr>
			<td>No.</td>
			<td>Kode Matakuliah</td>
			<td>Nama Matakuliah</td>
			<td>SKS</td>
			<td>Jenis</td>
			<td>Email</td>
			<td>Berkas Soal</td>
			<td>Upload File </td>
		</tr>
		<?php

			$host = "localhost";
			$user = "root";
			$password = "wibr4h4s14";
			$database_name = "db_upload_soal";
			$dosen = $_SESSION['email'];
			$no = 1;
			$konn = mysqli_connect($host, $user, $password,$database_name);
			$query = mysqli_query($konn,"select * from matakuliah where email = '$dosen'");
			while($data = mysqli_fetch_assoc($query)){

				?>
		<tr>
			<td><?=$no;?></td>
			<td><?=$data['kode_mk'];?></td>
			<td><?=$data['nama_mk'];?></td>
			<td><?=$data['sks'];?></td>
			<td><?=$data['jenis'];?></td>
			<td><?=$data['email'];?></td>
			<td><?=$data['nama_file'];?></td>
			<td><form action="upload.php?email=<?$data['email'];?>" method="post" enctype="multipart/form-data"> <input type="file" name="berkas" id="berkas"></form></td>
		</tr>
		<?php
			$no++;
			}
			?>
	</table>
		
	
	<a href="logout.php">Logout</a>
</body>
</html>
