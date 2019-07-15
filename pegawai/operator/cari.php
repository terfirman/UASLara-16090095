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
		#container ul { list-style: none; }

        #container .buttons { margin-bottom: 20px; }

        #container .list li .card{ width: 38rem; margin-bottom: 20px; padding-bottom: 10px; }

        #container .grid li .card{ float: left; width: 15rem; margin:0px 20px 20px 0px; }
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
			<form class="form-inline my-2 my-lg-0" action="cari.php">
				<input class="form-control mr-sm-2" type="search"  name="cari" id="cari"  placeholder="Cari Disini" aria-label="Search">
				<button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
			</form>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../koneksi/logout.php"><i class='fas fa-power-off'></i> Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<div id="container" class="container">
		<br>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="./">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
			</ol>
		</nav>
		
		<ul class="list">
		<div class="buttons">
			<button class="btn btn-outline-success my-2 my-sm-0 grid"><i class='fas fa-th grid'></i></button>
			<button class="btn btn-outline-success my-2 my-sm-0 list"><i class='fas fa-list-ul list'></i></button>
			<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal"><i class='fas fa-user-plus'></i> Tambah Pegawai</button>
		</div>

		<?php 
	   //include file koneksi 
		include "../koneksi/koneksi.php";
	
			$cari = $_GET['cari'];
			$query = mysqli_query($mysqli, "select * from pegawai where nama like '%$cari%'");	
		
			$count = mysqli_num_rows($query);
			if($count > 0 ){
				
			while($user_data = mysqli_fetch_array($query)) { ?>
			<li>
				<div class="card">
					<div class="card-body">
						<h5 class='card-title'>NIP : <?php echo $user_data['nip'];?></h5>
						<h5 class='card-title'><?php echo $user_data['nama'];?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?php echo $user_data['jabatan'];?></h6>
						<p class="card-text"><?php echo $user_data['j_kelamin'];?></p>
						<a href='editPegawai.php?nip=<?php echo $user_data['nip']; ?>' class="card-link">Edit</a>
						<a href='delete.php?nip=<?php echo $user_data['nip']; ?>' class="card-link">Hapus</a>
					</div>
				</div>
			</li>
			<?php
				}//end while
				
			}else{	
				echo "Pencarian <strong>" . $cari . "</strong>Tidak Ditemukan";
			}
		?>	
		</ul>
	</div>	

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container">
						<form method="post">
							<div class="form-group row">
								<label for="nim" class="col-sm-2 control-label">NIP</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="nip" placeholder="NIP">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="nama" class="col-sm-2 control-label">Nama</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="nama" placeholder="namat">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="nama" class="col-sm-2 control-label">Tanggal Lahir</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="tanggal" placeholder="Tanggal Lahir">
								</div>
							</div>
							
							<div class="form-group row">
							  <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
							  <div class="col-sm-10">
								  <select class="form-control" name="jk">
									<option selected>Jenis Kelamin</option>
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
								  </select>
							  </div>
							</div>
							
							<div class="form-group row">
								<label for="alamat" class="col-sm-2 control-label">Alamat</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="alamat" placeholder="alamat">
								</div>
							</div>	
							
							<div class="form-group row">
							  <label for="jurusan" class="col-sm-2 control-label">Jabatan</label>
							  <div class="col-sm-10">
								  <select class="form-control" name="jurusan">
									<option selected>Pilih Jurusan</option>
									<option value="D4 Teknik Informatika">D4 Informatika</option>
									<option value="D3 Kebidanan">D3 Kebidanan</option>
									<option value="D3 Farmasi">D3 Farmasi</option>
									<option value="D4 TI">D3 Mesin</option>
									<option value="D3 Kebidanan">D3 Akutansi</option>
									<option value="D3 Farmasi">D3 Komputer</option>
								  </select>
							  </div>
							</div>
							
							<div class="form-group row">
								<label for="alamat" class="col-sm-2 control-label">Pddkan Terakhir</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="p_terakhir" placeholder="Pendidikan Terakhir">
								</div>
							</div>	
							
							<div class="form-group row">
								<label for="alamat" class="col-sm-2 control-label">Pglmn Kerja</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="p_kerja" placeholder="Pengalaman Kerja">
								</div>
							</div>	
							
							<div class="form-group row">
								<label for="alamat" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="user" placeholder="Username">
								</div>
							</div>	
							
							<div class="form-group row">
								<label for="alamat" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="pass" placeholder="Password">
								</div>
							</div>	
							<hr>	
								<div style="float: right">
									<input class="btn btn-outline-primary" type="submit" value="Simpan">
									<input class="btn btn-outline-secondary" type="reset" value="Batal">
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="../assets/js/jquery-2.1.4.min.js"></script>
	<script>
		$(document).ready(function() {
			$('button').on('click',function(e) {
				if ($(this).hasClass('grid')) {
					$('#container ul').removeClass('list').addClass('grid');
				}
				else if($(this).hasClass('list')) {
					$('#container ul').removeClass('grid').addClass('list');
				}
			});  
		});
	</script>
</body>
</html>