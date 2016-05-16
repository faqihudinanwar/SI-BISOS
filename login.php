<?php
session_start();
include("db_login.php");
if(isset($_POST['submit'])){
		//definisi variable
		$username=$_POST['username'];
		$password=$_POST['password'];
		//membuat koneksi ke database
		$koneksi=mysql_connect("localhost", "root", "");
		//mencegah SQL injection
		$username=stripslashes($username);
		$password=stripslashes($password);
		$username=mysql_real_escape_string($username);
		$password=mysql_real_escape_string($password);
		//pilih database
		$db = mysql_select_db("db_dinas", $koneksi);
		//cek database
		$query=mysql_query("SELECT * FROM petugas WHERE email='$username'AND password='$password'", $koneksi);
		$rows=mysql_num_rows($query);
		$result = mysql_fetch_array($query);
		if($rows == 1){
			$_SESSION['login_user']=$username; //session
			$_SESSION['id_user']=$result['id_usr'];
				header("location:halaman_petugas.php");				
		} else { ?>
			<script language="JavaScript">alert('Username & Password Salah');
			document.location='login.php'</script><?php
			}
	mysql_close($koneksi);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initital-scale=1">
		<title>Login</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a href="#" id="ihomebtn" class="navbar-brand"; style="color:#ffffff; font-family: Comic Sans MS;" >Sistem Informasi Bidang Sosial Dinsosnakertrans Kab Kudus</a>
				</div>
			
				<div class="navbar-collapse collapse ">
					<ul class="nav navbar-nav navbar-right" style="padding-right : 10px;">
						<li><a href="index.html" style="color:#ffffff; font-family: Comic Sans MS; " > <span class="glyphicon glyphicon-home"></span> Beranda</a></li>
						</li>
					</ul>
				</div> 
			</div>
		</nav>
		<div class ="hallo" style="padding:50px; color: #000000; font-family: Comic Sans MS; ">
			<center><h2> Selamat Datang di Sistem Informasi Pelayanan Sosial</h2>
				<p>Masuk untuk melanjutkan ke halaman administrator</p>
			</center>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-3 login-box-t" >
				<legend style="color: #000000;">Login </legend>
				
				<div class="kotak">
					<form name="f1"  method="post">
						<div class="form-group has-feedback">
							<input type="email" name="username" placeholder="username" class="form-control" maxlength="30" required>
							<i class="form-control-feedback glyphicon glyphicon-user"></i>
						</div>
						<div class="form-group has-feedback">
								<input type="password" name="password" placeholder="password" class="form-control" maxlength="30" required>
								<i class="form-control-feedback glyphicon glyphicon-lock"></i>
						</div>
						<input class="btn btn-primary" type="submit" align="center" name="submit" value="Login" style="width:100%;"/>
					</form>
				</div>
			</div>
		</div>
		<!-- footer -->
		<nav class="navbar navbar-inverse navbar-fixed-bottom" style="color : #ffffff; ">
			<div class="container-fluid">
				<p align="center"><i> Copyright&copy by :</i> <br /> 
				Dinsosnakertrans Kab. Kudus<br /></p>
			</div>
		</nav>
	</body>
</html>