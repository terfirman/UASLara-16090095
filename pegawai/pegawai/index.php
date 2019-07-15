<?php
	require ('../koneksi/koneksi.php');
	session_start();

	if(!isset($_SESSION['username'])) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
		header('Location: ../'); 
	}
?>
<?php
	// Include / load file koneksi.php
	include '../koneksi/koneksi.php';
	$username=$_SESSION['username'];
	$result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE username='$username';");
	while($user_data = mysqli_fetch_array($result))
		{
			$nama = $user_data['nama'];
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
					<a class="nav-link" href="../koneksi/logout.php"><i class='fas fa-user'></i> <?php echo $nama?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../koneksi/logout.php"><i class='fas fa-power-off'></i> Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<div id="mycarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
			<li data-target="#mycarousel" data-slide-to="1"></li>
			<li data-target="#mycarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img class="d-block w-100" src="../img/bg7.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="../img/bg5.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="../img/bg6.JPEG" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="../assets/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript">
		var $item = $('.carousel .carousel-item');
		var $wHeight = $(window).height();
		$item.eq(0).addClass('active');
		$item.height($wHeight);
		$item.addClass('full-screen');

		$('.carousel img').each(function() {
			var $src = $(this).attr('src');
			var $color = $(this).attr('data-color');
			$(this).parent().css({
				'background-image' : 'url(' + $src + ')',
				'background-color' : $color
			});
			$(this).remove();
		});

		$(window).on('resize', function (){
			$wHeight = $(window).height();
			$item.height($wHeight);
		});

		$('.carousel').carousel({
			interval: 6000,
			pause: "false"
		});
	</script>
</body>
</html>