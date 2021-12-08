<!--
-- Source Code from My Notes Code (www.mynotescode.com)
-- 
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/mynotescode
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Nilai Quiz Tutorial FK UMS</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Style untuk Loading -->
		<style>
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		</style>
	</head>
	<body>
		<!--
		-- START HEADER
		-- Membuat Menu Header / Navbar
		-- Hapus saja jika tidak diperlukan
		-->
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php" style="color: white;"><b>Import Nilai Quiz Tutorial FK UMS</b></a>
				</div>
				
			</div>
		</nav>
		<!-- END HEADER -->
		
		<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- 
			-- Buat sebuah tombol untuk mengarahkan ke form import data
			-- Tambahkan class btn agar terlihat seperti tombol
			-- Tambahkan class btn-success untuk tombol warna hijau
			-- class pull-right agar posisi link berada di sebelah kanan
			-->
			<a href="form_quiz.php" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-upload"></span> Import Data
			</a>
			
			<h3>Data Hasil Import</h3>
			
			<hr>
			
			<!-- Buat sebuah div dan beri class table-responsive agar tabel jadi responsive -->
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>ID</th>
						<th>NIM</th>
						<th>Nama Mahasiswa</th>
						<th>Nilai Quiz</th>
					</tr>
					<?php
					// Load file koneksi.php
					include "koneksi.php";
					session_start();
					if(isset($_COOKIE['import_data']))
					{
						$import_data=$_COOKIE['import_data'];
						//echo "tampilan import data ".$import_data." berarti aman";
					}
					if($import_data=="aktif")
					{
							// Buat query untuk menampilkan semua data siswa
							$sql = mysqli_query($connect, "SELECT * FROM data_nilai ORDER BY id_auto ASC");
			
							$no = 1; // Untuk penomoran tabel, di awal set dengan 1
							while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
								echo "<tr>";
								echo "<td align='center'>".$no."</td>";
								echo "<td align='center'>".$data['id_auto']."</td>";
								echo "<td align='center'>".$data['nim']."</td>";
								echo "<td>".$data['nama_mhs']."</td>";
								echo "<td align='center'>".$data['sb']."</td>";
								echo "</tr>";
								
								$no++; // Tambah 1 setiap kali looping
							}
					}
					else
					{
						echo "<h2>Maaf anda tidak di ijinkan mengakses halaman ini..!!!!</h2><br>";
					}
					?>
				</table>
			</div>
		</div>
	</body>
</html>
