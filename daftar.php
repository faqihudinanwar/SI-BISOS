<?php
require_once("koneksi.php");
	 if (!isset($_SESSION)) {
        session_start();
    } 
	$error_nip  = $error_nama = $error_email = $error_password =  "";
	$nip = $nama = $email = $password =  ""; 
	
	if($koneksi->connect_errno){
		die ("could not connect to the database : <br/>". $koneksi->connect_error);
	}
	
	if (isset($_POST["submit"])){
		$nip			= $_POST["nip"];
		$nama			= $_POST["nama"];
		$email			= $_POST["email"];
		$password		= $_POST["password"];

		$nip = test_input($_POST['nip']);
			if($nip == ''){
				$error_nip = "Kolom ini harus diisi";
				$valid_nip = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$nip)) {
				$error_nip = "Hanya angka yang diperbolehkan";
				$valid_nip = FALSE;
			}else {
				$valid_nip = TRUE;
			}
		$nama = test_input($_POST['nama']);
		if ($nama == ''){
			$error_nama = "Name is required";
			$valid_nama = FALSE;
		}elseif (!preg_match("/^[a-zA-Z ,.():\/]*$/",$nama)) {
		   $error_nama = "Only letters, white space, and symbols ,.():\ allowed";
		   $valid_nama = FALSE;
		}else{
			$valid_nama = TRUE;
		}
		
		$email = $_POST['email'];
		if ($email == ''){
			$error_email = "Email harus diisi";
			$valid_email = FALSE;
		}elseif (!preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/",$email)) {
			$error_email = "Sesuaikan format email xxx@xx.xx";
			$valid_email = FALSE;
		}else{
			$valid_email = TRUE;
		}
		$password = test_input($_POST['password']);
		if($password == ''){
			$error_password = "Kolom Ini Harus Diisi";
			$valid_password = FALSE;
		}else {
			$valid_password = TRUE;
		}
				
		if ($valid_nip && $valid_nama&& $valid_email && $valid_password ){
			$nip   			= $koneksi->real_escape_string($nip);
			$nama   		= $koneksi->real_escape_string($nama);
			$email			= $koneksi->real_escape_string($email);
			$password		= $koneksi->real_escape_string($password);
						
			$query = "INSERT INTO petugas (nip, nama, email, password) VALUES ('".$nip."','".$nama."','".$email."','".$password."')";
			$result = $koneksi->query($query);
			if (!$result){
				die("could not query the database: <br />".$koneksi->error);
			}else{
				echo 'Data has been added.<br /><br />';
				sleep(2);
				$koneksi->close();
				header("location:login.php");	
				return;
			}
		}
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initital-scale=1">
		<title>Login</title>
		<link href="bootstrap/css/bootstrap2.min.css" rel="stylesheet" type="text/css">
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<script src="js/jquery.js" type="text/javascript"></script>
	<script>		
		function checkPass(){
			//Store the password field objects into variables ...
			var pass1 = document.getElementById('password');
			var pass2 = document.getElementById('password2');
			//Store the Confimation Message Object ...
			var message = document.getElementById('confirmMessage');
			//Set the colors we will be using ...
			var goodColor = "#66cc66";
			var badColor = "#ff6666";
			//Compare the values in the password field 
			//and the confirmation field
			if(pass1.value == pass2.value){
				//The passwords match. 
				//Set the color to the good color and inform
				//the user that they have entered the correct password 
				pass2.style.backgroundColor = goodColor;
				message.style.color = goodColor;
				message.innerHTML = "Password Match!"
			}else{
				//The passwords do not match.
				//Set the color to the bad color and
				//notify the user.
				pass2.style.backgroundColor = badColor;
				message.style.color = badColor;
				message.innerHTML = "Password Do Not Match!"
			}
		}  
	</script>
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
					<a href="#" id="ihomebtn" class="navbar-brand"; style="color:#ffffff; font-family: Comic Sans MS;" >Sistem Informasi Bantuan Sosial Dinsosnakertrans Kab. Kudus</a>
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
			<center><h2> Pendaftaran Administrator</h2>	</center>
		</div>
		<div>
			<div >
				<div class="table-responsive">
				<form id="formku" method="post" class="form-login">
				<table class=" table-condensed" >
				<div class="form-group">
				<tr>
					<td><label for="nip">Nip</label></td>
					<td>
						<input name="nip" type="text" size = "36" style="text-align:center;" class="required" minlength="18" autofocus id="nip" placeholder="NIP ">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_nip;?></span></td>
				</tr>
				<tr>
					<td><label for="nama">Nama</label></td>
					<td>
						<input name="nama" type="text"size = "36" style="text-align:center;" class="required"  autofocus id="nama" placeholder="Masukkan Nama ">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_nama;?></span></td>
				</tr>
					
				<tr>
					<td><label for="email">Email</label></td>
					<td>
						<input type="email" id="email" name="email" class="form-control" class="email required">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_email;?></span></td>
				</tr>
				<tr>
					<td><label for="password">Password</label></td>
					<td width=180px;>
						<input type="password" id="password" name="password" class="form-control" class="required" minlength="6" >
					</td>
					<td valign="top"><span class="error">* <?php echo $error_password;?></span></td>
				</tr>
				<tr>
					<td><label for="password2">Confirm Password</label></td>
					<td>
						<input type="password" id="password2" name="password2" class="form-control" class="required" minlength="6" onkeyup="checkPass(); return false;">
					<td><span id="confirmMessage" class="confirmMessage"></span></td>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Simpan" class="btn btn-sm btn-primary" style="width: 220px" />
					</td>
				</tr>
						
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