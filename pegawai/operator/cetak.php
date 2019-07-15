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
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
				<input class="form-control mr-sm-2" type="search"  name="cari" id="cari" placeholder="Cari Disini" aria-label="Search">
				<button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
			</form>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../koneksi/logout.php"><i class='fas fa-power-off'></i> Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<br>
	<br>
	<br>
	<div class="container">		
		<?php
			include_once("../koneksi/koneksi.php");
			$nip = $_GET['nip'];
			$result = mysqli_query($mysqli, "SELECT * FROM pegawai WHERE nip=$nip");
		?>		
		<ul class="list">
			<h4 class="text-center">Data Pegawai</h4>
			<table>
			<?php  
				while($user_data = mysqli_fetch_array($result)) {     
			?> 
					<div class="card">
						<div class="card-body">
						<tr>
							<td>NIP</td>
							<td>: <?php echo $user_data['nip'];?></td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>: <?php echo $user_data['nama'];?></td>
						</tr>
						<tr>	
							<td>Tanggal Lahir</td>
							<td>: <?php echo $user_data['tanggal_lahir'];?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>: <?php echo $user_data['j_kelamin'];?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>: <?php echo $user_data['alamat'];?></td>
						</tr>
						<tr>	
							<td>Jabatan</td>
							<td>: <?php echo $user_data['jabatan'];?></td>
						</tr>
						<tr>
							<td>Pendidikan Terakhir</td>
							<td>: <?php echo $user_data['pendidikan'];?></td>
						</tr>
						<tr>
							<td>Pengalaman Kerja</td>
							<td>: <?php echo $user_data['p_kerja'];?></td>
						</tr>
						</tr>
					</div>
				<?php
				}
			?>
			</table>
		</ul>
		<script>
			window.print();
		</script>		
	</div>		
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
	<script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
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