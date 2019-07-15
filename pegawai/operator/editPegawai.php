<?php
	require ('../koneksi/koneksi.php');
	session_start();

	if(!isset($_SESSION['username'])) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
		header('Location: ../'); 
	}
?>
<?php
	// include database connection file
	include_once("../koneksi/koneksi.php");

	// Check if form is submitted for user update, then redirect to homepage after update
	if(isset($_POST['update']))
	{   
			$id = $_POST['id'];
			$nip = $_POST['nip'];
			$nama = $_POST['nama'];
			$tanggal = $_POST['tanggal'];
			$jenis_kelamin = $_POST['jk'];
			$alamat = $_POST['alamat'];
			$jabatan = $_POST['jabatan']; 
			$pendidikan = $_POST['p_terakhir'];
			$Pengalaman = $_POST['p_kerja'];
			$password = $_POST['pass'];
			$level = $_POST['level'];

		// update user data
		$result = mysqli_query($mysqli, "UPDATE pegawai SET nama='$_POST[nama]',tanggal_lahir='$_POST[tanggal]',j_kelamin='$_POST[jk]',alamat='$_POST[alamat]',jabatan='$_POST[jabatan]',pendidikan='$_POST[p_terakhir]',p_kerja='$_POST[p_kerja]',password='$_POST[pass]',level='$_POST[level]'  WHERE nip=$nip");

		// Redirect to homepage to display updated user in list
		header("Location: pegawai.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
			</form>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../koneksi/logout.php"><i class='fas fa-power-off'></i> Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<?php
		// Display selected user data based on id
		// Getting id from url
		$nip = $_GET['nip'];

		// Fetech user data based on id
		$result = mysqli_query($mysqli, "SELECT * FROM pegawai WHERE nip=$nip");

		while($user_data = mysqli_fetch_array($result))
		{
			$nip = $user_data['nip'];
			$nama = $user_data['nama'];
			$tanggal = $user_data['tanggal_lahir'];
			$jenis_kelamin = $user_data['j_kelamin'];
			$alamat = $user_data['alamat'];
			$jabatan = $user_data['jabatan']; 
			$pendidikan = $user_data['pendidikan'];
			$pengalaman = $user_data['p_kerja'];
			$password = $user_data['password'];
			$level = $user_data['level'];
		}
	?>
	<div class="container">
		<br>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="./">Home</a></li>
				<li class="breadcrumb-item"><a href="pegawai.php">Data Pegawai</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Data Pegawai</li>
			</ol>
		</nav>
			<form method="post">
				<div class="form-group row">
					<label for="nip" class="col-sm-2 control-label">NIP</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="nip" value="<?php echo $nip;?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="nama" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="nama" value="<?php echo $nama;?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="tanggal" class="col-sm-2 control-label">Tanggal Lahir</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" id="datepicker" name="tanggal" value="<?php echo $tanggal;?>">
					</div>
				</div>
				
				<div class="form-group row">
				  <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
				  <div class="col-sm-10">
					  <select class="form-control" name="jk">
						<option selected>-- Jenis Kelamin --</option>
						<?php if ($jenis_kelamin === "Laki-Laki") : ?>
						<option value="Laki-Laki" id="Laki-Laki" name="Laki-Laki" selected>Laki-laki</option>
						<option value="perempuan" id="Perempuan" name="Perempuan">Perempuan</option>
						<?php else : ?>
						<option value="Laki-Laki" id="Laki-Laki" name="Laki-Laki" >Laki-laki</option>
						<option value="perempuan" id="Perempuan" name="Perempuan" selected>Perempuan</option>
						<?php endif; ?>
					  </select>
				  </div>
				</div>
				
				<div class="form-group row">
					<label for="alamat" class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="alamat" value="<?php echo $alamat;?>">
					</div>
				</div>	
				
				<div class="form-group row">
					<label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="jabatan" value="<?php echo $jabatan;?>">
					</div>
				</div>	
				
				<div class="form-group row">
					<label for="p_terakhir" class="col-sm-2 control-label">Pddkan Terakhir</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="p_terakhir" value="<?php echo $pendidikan;?>">
					</div>
				</div>	
				
				<div class="form-group row">
					<label for="p_kerja"  class="col-sm-2 control-label">Pglman Kerja</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="p_kerja" name="p_kerja" rows="3" placeholder="Pengalaman Kerja"><?php echo $pengalaman;?></textarea>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="pass" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="pass" value="<?php echo $password;?>">
					</div>
				</div>

				<div class="form-group row">
				  <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
				  <div class="col-sm-10">
					  <select class="form-control" name="level">
						<option selected>-- Level --</option>
						<?php if ($jenis_kelamin === "Laki-Laki") : ?>
						<option value="Admin" id="Admin" name="Admin" selected>Admin</option>
						<option value="Pegawai" id="Pegawai" name="Pegawai">Pegawai</option>
						<?php else : ?>
						<option value="Admin" id="Admin" name="Admin">Admin</option>
						<option value="Pegawai" id="Pegawai" name="Pegawai" selected>Pegawai</option>
						<?php endif; ?>
					  </select>
				  </div>
				</div>
				
				<hr>	
					<p><?php echo isset($pesan) ? $pesan : ""?></p>
					<div style="float: right">
						<button  class="btn btn-outline-primary btn-sm" type="submit" id="update" name="update"><i class='fas fa-save'></i> Update</button>
						<button class="btn btn-outline-secondary btn-sm" type="reset" value="Batal"><i class='fas fa-times'></i> Batal</button>
					</div>
			</form>
	</div>	
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
	<script src="../assets/js/dp.js"></script>
</body>
</html>