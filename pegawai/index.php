<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<style type="text/css">
		body {
			 margin: 0;
			 padding: 0;
		}
		.bg {
			 width: 100%;
			 height: 100%;
			 position: fixed;
			 z-index: 1;
			 float: left;
			 left: 0;
		}	
	</style>
</head>
<body>
	<?php
		require ('koneksi/koneksi.php');
		if (isset($_POST['login'])){
			  $user=$_POST['username'];
			  $pass=$_POST['password'];

			  //$query=$pdo->prepare("select * from users where username=:user and password=:pass");
			  $query = mysqli_query($mysqli,"SELECT * FROM users WHERE username='$user' AND password='$pass'");
			  $cek = mysqli_num_rows($query);
			  if($cek >0){
					ob_start();
					session_start();
					$data = mysqli_fetch_assoc($query);
					if($data['level']=="Admin"){
						$_SESSION['username']=$data['username'];
						$_SESSION['level']=$data['level'];
						$pesan = "<p style='color:green'>Anda Berhasil Login, Memuat...</p>"; 
						header("location:operator/");
					}else{
						$_SESSION['username']=$data['username'];
						$_SESSION['level']=$data['level'];
						$pesan = "<p style='color:green'>Anda Berhasil Login, Memuat...</p>";  
						header('location:pegawai/');
					}
			  }
			  else{
				$pesan = "<p style='color:red'>Password atau Username anda salah</p>";  
			  }
		}
	?>	
	
	<div class="bg" style="background-image: url('img/bg.jpg');">
		<div class="mask rgba-black-light d-flex justify-content-center align-items-center">
			<div class="container">
				<br>
				<br>
				<br>
				<br>
				<div class="container">
					<div class="card col-sm-6" >
						<div class="tab-content">
							<div class="tab-pane fade in show active" id="panel7" role="tabpanel">
								<div class="card-body">
								   <h3 class="card-title text-center">Silahkan Login</h5>
									<form method="POST">
										<div class="form-group">
											<label for="username">Username</label>
											<input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Username">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" id="password" name="password" placeholder="Password">
										</div>
										<hr>
										<button type="submit" class="btn btn-primary" name="login" id="login">Login</button>
										<p><?php echo isset($pesan) ? $pesan : ""?></p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>	
			<br>				
			</div>
		</div>
	</div>	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>