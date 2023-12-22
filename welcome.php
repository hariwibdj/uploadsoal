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
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datepicker.min.css" rel="stylesheet">
    <link href="assets/js/dataTables/css/dataTables.bootstrap.css" rel="stylesheet">
	<style>
		.gaya1{
			font-size :14px;
			color :blue;
			
		}
		.nogaris{
			text-decoration: none;
		}
	</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
<a class="navbar-brand" href="#">uploadsoal.hariwib.ac.id</a> 

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home fa-lg" style = "color :blue"></i> <span class="sr-only">(current)</span></a>
      </li>
      
        
    </ul> 
  </div>
  <span class="navbar-text mr-3">
  <a class="d-flex nogaris" href="logout.php">L o g o u t </a>
  </span>
</nav>
<!-- <div class="container-fluid"> -->
<div class="container">

	<h3>Selamat Datang, <?php echo $_SESSION['nama']; ?></h3>
	<!-- <h4>Anda berhasil login ke dalam aplikasi. Berikut data diri Anda yang tersimpan pada database kami :</h4> -->
	
	<!-- <table >
		<tr>
			<td>Username</td>
			<td>: </td>
			<td><?php echo $_SESSION['username'] ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>: </td>
			<td><?php echo $_SESSION['nama'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>: </td>
			<td><?php echo $_SESSION['email'] ?></td>
		</tr>
	</table> -->

	
	<br>
	<br>
	<table class="table table-striped table-hover" id="dataTables-example">
		<thead>

			<tr>
				<td>No.</td>
				<td>Kode</td>
				<td>Matakuliah</td>
				<td>SKS</td>
				<td>Jenis</td>
				<td>Kelas</td>
				<!-- <td>Email</td> -->
				<td>Berkas Soal</td>
				<td>Upload File </td>
			</tr>
		</thead>
		<?php

			$host = "localhost";
			$user = "root";
			$password = "wibr4h4s14";
			$database_name = "db_upload_soal";
			$dosen = $_SESSION['email'];
			$no = 1;
			$konn = mysqli_connect($host, $user, $password,$database_name);
			if($dosen =='hariwib@darmajaya.ac.id'){
				$query = mysqli_query($konn,"select * from matakuliah");
			}
			else{
				$query = mysqli_query($konn,"select * from matakuliah where email = '$dosen'");
			}
			while($data = mysqli_fetch_assoc($query)){

				?>
				<tbody>

					<tr>
						<td class="gaya1"><?=$no;?></td>
						<td class="gaya1"><?=$data['kode_mk'];?></td>
						<td class="gaya1"><?=$data['nama_mk'];?></td>
						<td class="gaya1"><?=$data['sks'];?></td>
						<td class="gaya1"><?=$data['jenis'];?></td>
						<td class="gaya1" ><?=$data['kelas'];?></td>
						<!-- <td><?=$data['email'];?></td> -->
						<td class="gaya1"><?=$data['nama_file'];?></td>
						<td class="gaya1"><form action="" method="post" enctype="multipart/form-data"> 
							<input name="id" type="hidden" value="<?php echo $data['id'];?>" /> 	
							<input name="kodemk" type="hidden" value="<?php echo $data['kode_mk'];?>" /> 	
							<input name="jenis" type="hidden" value="<?php echo $data['jenis'];?>" /> 	
							<input name="kelas" type="hidden" value="<?php echo $data['kelas'];?>" /> 	
							
							<input type="file" name="userfile" id="userfile"> 
							
							<input type="submit" name="submit" value="Upload" class="btn btn-primary btn-sm"> </form></td>
						</tr>
					</tbody>
		<?php
			$no++;
			}
			?>
	</table>
	<br>
	<footer class="footer">
      <!-- <div class="container-fluid"> -->
        <p class="text-muted pull-left">&copy; <?php echo date("Y");?> <a href="http://www.hariwib.com"> hariwb.com</a></p>
        <p class="text-muted pull-right ">Theme by <a href="http://www.getbootstrap.com" target="_blank">Bootstrap</a></p>
      <!-- </div> -->
    </footer>
</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <!-- DataTables -->
    <script src="assets/js/dataTables/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
      $(function () {

        //datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // toolip
        $('[data-toggle="tooltip"]').tooltip();

        $('#dataTables-example').dataTable( {
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "pageLength": 5
        } );
      })
    </script>

</body>
</html>

<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

    if (isset($_POST['submit'])) {
        // btnDelete
		$id = $_POST['id'];
		$kodemk = $_POST['kodemk'];
		$jenis = $_POST['jenis'];
		$kelas = $_POST['kelas'];
	    $sumber = $_FILES['userfile']['tmp_name'];
        $target = 'berkassoal/'.$_FILES['userfile']['name'];
        $namafile = $_FILES['userfile']['name'];


//tambahan
//$lokasi_file   = $_FILES['img']['tmp_name'];
//$namafile      = $_FILES['img']['name'];

//tambahan
  $file_basename = substr($namafile, 0, strripos($namafile, '.')); // get file extention
  $file_ext      = substr($namafile, strripos($namafile, '.')); // get file name 
  $fileName      = 'UAS-2023-1'.'-'.$_SESSION['username']."-".$kodemk."-".$jenis."-".$kelas.$file_ext;
  $direktori     = "berkassoal/$fileName";




if(move_uploaded_file($sumber, $direktori))
{
 
 echo "<br/> File Uploaded Successfully <br/>";
 echo "<br/>Uploaded File:".$fileName;
//  echo "<br/><a href='http://localhost/uploadsoal/berkassoal/$fileName'>".$fileName."</a>";
 
 
 
 

$email = $_SESSION['email'];
// membuat koneksi ke database


$koneksi = mysqli_connect("localhost","root","wibr4h4s14","db_upload_soal");

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
// end membuat koneksi
$update = mysqli_query($koneksi,"UPDATE matakuliah SET nama_file = '$fileName' WHERE email = '$email' and id ='$id'");  
if(!$update)
{
//  echo mysqli_error();
 echo $email;
}



 
}
else 
	echo"Can't Upload Selected File ";
		
    } else {
        //assume btnSubmit
    }
}
?>
