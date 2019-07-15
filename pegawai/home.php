<!DOCTYPE html>
<html lang="en">
	<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

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
	<div id="mycarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
			<li data-target="#mycarousel" data-slide-to="1"></li>
			<li data-target="#mycarousel" data-slide-to="2"></li>
			<li data-target="#mycarousel" data-slide-to="3"></li>
			<li data-target="#mycarousel" data-slide-to="4"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item">
				<img src="https://unsplash.it/2000/1250?image=397" data-color="lightblue" alt="Gambar Pertama">
				<div class="carousel-caption">
				<h3>Gambar Pertama</h3>
				</div>
			</div>
			<div class="item">
				<img src="https://unsplash.it/2000/1250?image=689" data-color="firebrick" alt="Gambar Kedua">
				<div class="carousel-caption">
				<h3>Gambar Kedua</h3>
				</div>
			</div>
			<div class="item">
				<img src="https://unsplash.it/2000/1250?image=675" data-color="violet" alt="Gambar Ketiga">
				<div class="carousel-caption">
				<h3>Gambar Ketiga</h3>
				</div>
			</div>
			<div class="item">
				<img src="https://unsplash.it/2000/1250?image=658" data-color="lightgreen" alt="Gambar Keempat">
				<div class="carousel-caption">
				<h3>Gambar Keempat</h3>
				</div>
			</div>
			<div class="item">
				<img src="https://unsplash.it/2000/1250?image=638" data-color="tomato" alt="Gambar Kelima">
				<div class="carousel-caption">
				<h3>Gambar Kelima</h3>
				</div>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
		</a>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		var $item = $('.carousel .item');
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