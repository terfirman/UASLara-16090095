<?php
	require ('../koneksi/koneksi.php');
	session_start();

	if(!isset($_SESSION['username'])) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
		header('Location: ../'); 
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<style type="text/css">
		h3 {
			display: inline-block;
			padding: 10px;
			background: #B9121B;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}

		.full-screen {
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="./">Kepegawaian</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="./"><i class='fas fa-home'></i> Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="pegawai.php"><i class='fas fa-database'></i> Data Pegawai</a>
				</li>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="tentang.php"><i class='fas fa-info-circle'></i> Tentang Kami</a>
				</li>
			</ul>			
			<form action="cari.php" class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="cari" id="cari" name="cari" placeholder="Cari Disini" aria-label="Search">
				<button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
			</form>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../koneksi/logout.php"><i class='fas fa-th'></i> Grid</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../koneksi/logout.php"><i class='fas fa-list-ul'></i> List</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../koneksi/logout.php"><i class='fas fa-power-off'></i> Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<br>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="./">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
			</ol>
		</nav>
		<p> UAS Corp merupakan salah satu perusahaan media terbesar di Indonesia. Perusahaan ini membawahi berbagai unit usaha yang bergerak di bidang media, gaya hidup dan hiburan. </p>

		<p> Perusahaan ini dulunya bernama PT Pejuang Tugas yang kemudian berganti nama menjadi UAS Corp yang terus dipakai hingga sekarang. Guna mengembangkan usahanya membuat sang pemilik mulai melebarkan sayap usahanya di berbagai bidang, salah satu anak perusahaannya adalah NokturnalTV dan AntimeremCom. </p>

		<p> AntimeremCom merupakan salah satu perusahaan yang dimiliki induk UAS Corp. Memulai debut pada 11 Januari 2019 AntimeremCom telah melahirkan berbagai varian konten, seperti Nugas Lembur, Bagai Quda, Sampai Lupa Push Rank dan masih banyak lagi. </p>

		<p> Selain itu, mitra kerja AntimeremCom yakni AntimelekTV sejak 14 Februari 2019 bersama-sama menyajikan konten yang menjadi jajaran pemuncak trending youtube, seperti Grebek Polteknik, Debat Kursi Dosen dan beberapa program lainnya. </p>

	<div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>