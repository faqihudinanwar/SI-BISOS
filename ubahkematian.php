<?php
	$id = $_GET['id'];
	require_once("db_login.php");
	 if (!isset($_SESSION)) {
        session_start();
    } 
	$db = new mysqli($db_host, $db_username, $db_password, $db_database);
	if($db->connect_errno){
			die ("couldn not connect to the database: <br/>". $db->connect_error);
		}
	$error_nama = $error_ahliwaris = $error_alamat = $error_kecamatan = $error_volume = $error_hargasatuan = "";
	$nama = $ahliwaris = $alamat = $kecamatan = $volume = $hargasatuan = ""; 
	
	if (!isset($_POST["submit"])){
		$query = "SELECT * FROM kematian WHERE idpenerima=".$id."";
	
		//execute the query
			$result =$db->query($query);
		if(!$result){
			die("could not query to the database: <br />".$db->error);
		}else{
			while ($row = $result->fetch_object()){
				$nama		 = $row->nama;
				$ahliwaris	 = $row->ahliwaris;
				$alamat		 = $row->alamat;
				$kecamatan	 = $row->kecamatan;
				$volume		 = $row->volume;
				$hargasatuan = $row->hargasatuan;
			}
		}
		}else {
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
		
		$ahliwaris = test_input($_POST['ahliwaris']);
		if ($ahliwaris == ''){
			$error_ahliwaris = "Bagian ini Harus diisi";
			$valid_ahliwaris = FALSE;
		}elseif (!preg_match("/^[a-zA-Z ,.():\/]*$/",$ahliwaris)) {
		   $error_ahliwaris = "Hanya Huruf, Spasi dan Simbol ,.():\ yang diperbolehkan";
		   $valid_ahliwaris = FALSE;
		}else{
			$valid_ahliwaris = TRUE;
		}

		$alamat = test_input($_POST['alamat']);
			if($alamat == ''){
				$error_alamat = "Addres is required";
				$valid_alamat = FALSE;
			}else {
				$valid_alamat = TRUE;
			}
		
		$kecamatan = test_input($_POST['kecamatan']);
		if($kecamatan == '' || $kecamatan == 'none'){
			$error_kecamatan = "Kecamatan harus diisi";
			$valid_kecamatan = FALSE;
		}else {
			$valid_kecamatan = TRUE;
		}
		
		$volume = test_input($_POST['volume']);
			if($volume == ''){
				$error_volume = "Addres is required";
				$valid_volume = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$volume)) {
				$error_volume = "Hanya angka yang diperbolehkan";
				$valid_volume = FALSE;
			}else {
				$valid_volume = TRUE;
			}
			
		$hargasatuan = test_input($_POST['hargasatuan']);
			if($hargasatuan == ''){
				$error_hargasatuan = "Addres is required";
				$valid_hargasatuan = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$hargasatuan)) {
				$error_hargasatuan = "Hanya angka yang diperbolehkan";
				$valid_hargasatuan = FALSE;
			}else {
				$valid_hargasatuan = TRUE;
			}	
	
		//update data into database
		if ($valid_nama && $valid_ahliwaris  && $valid_alamat && $valid_kecamatan && $valid_volume && $hargasatuan){
			$nama   		= $db->real_escape_string($nama);
			$ahliwaris 		= $db->real_escape_string($ahliwaris);
			$alamat			= $db->real_escape_string($alamat);
			$kecamatan		= $db->real_escape_string($kecamatan);
			$volume   		= $db->real_escape_string($volume);
			$hargasatuan	= $db->real_escape_string($hargasatuan);
			
			//asign a query
			$query = "UPDATE kematian SET nama='".$nama."', ahliwaris='".$ahliwaris."', alamat='".$alamat."' idkec='".$kecamatan."', volume='".$volume."', hargasatuan='".$hargasatuan."' WHERE idpenerima=".$id."";
			
			//execute the query
			$result = $db->query($query);
			if (!$result){
				die("gabisa sayang: <br />".$db->error);
			}else {
				echo 'Data has been updated.<br /><br />';
				echo '<a href="kematian.php">Kembali</a>';
				$db->close();
				exit;
			}
		}
	}	
	function test_input($data){
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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initital-scale=1">
		<title>Admin</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<link href="css/menu.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Menu Navigasi -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid" style="background: #1e79b2;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a href="#" id="ihomebtn" class="navbar-brand" style="text-decoration : none; color : #f6ecf5"><b>Sistem Informasi Sosial</b></a>
				</div>
				
				<div class="navbar-collapse collapse ">
					<ul class="nav navbar-nav navbar-right" style="padding-right : 10px;">
						
						<!--<li class="dropdown">

							<span class="caret"></span></a>
							<ul class="dropdown-menu" style="padding: 20px 10px 5px 10px; width:220px; height:150px">
								<li>
									<form action="login.php" method="POST" autocomplete>
										<input type="email" class="form-control" name="username" placeholder="Username" required autofocus>
										<input type="password" class="form-control" name="password" placeholder="Password" required>
											<div class="checkbox">
												<td><input type="checkbox" style="text-align:right"> Remember Me <td>
											</div>
											<table>
												<tr>
													<td><button type="submit" class="btn btn-primary" name="submit">Log In</button></td>
													<td> &nbsp <label><a href="daftar.php"> Sign Up! <a></label></td>
												</tr>
											</table>
									</form>
								</li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
							</ul>
						</li>-->
						<li><a href="logout.php" > <span class="glyphicon glyphicon-off"></li>
					</ul>
				</div> 
			</div>
		</nav>
		
		
		<!-- sidebar menu -->
		<div id="wrapper">
			<div id="sidebar-wrapper" style="font-family: Comic Sans MS; ">
				<ul class="sidebar-nav nav-pills nav-stacked" id="menu">
					<li>
						<a href="#" style="color: #c6e2f4;"> <img src="img/people.png" ><?php echo $_SESSION['login_user'];?></a>
					
					</li>
					<li>
                        <a href="halaman_petugas.php"style="color: #c6e2f4;"><span class="glyphicon glyphicon-home" ></span> Beranda</a>
					</li>
					
					<li>
                        <a href="posting_artikel.php"style="color: #c6e2f4;"><span class="glyphicon glyphicon-pushpin"></span> Posting Artikel</a>
                    </li>
					
					<li>
                        <a href="kematian.php"style="color: #c6e2f4;"><span class="glyphicon glyphicon-usd"></span> Santunan Kematian</a>
                    </li>
					<li>
                        <a href="bedahrumah.php"style="color: #c6e2f4;"><span class="glyphicon glyphicon-wrench"></span> Bedah Rumah</a>
                    </li>
                </li>
				<li>
                        <a href="namapkh.php"style="color: #c6e2f4;"><span class="glyphicon glyphicon-heart-empty"></span> PKH</a>
                    </li>
				<li>
				<li>
                        <a href="galeri.php"style="color: #c6e2f4;"><span class="glyphicon glyphicon-bell"></span> Galeri</a>
                    </li>
				</ul>
			</div>
			
			<!-- start: Table -->
			<div class="table-responsive">
			<div class="title"><h3>Data Penerima Santunan Kematian</h3></div>
			<form id="formku" method="post" class="form-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table class="table table-condensed">
				<div id="loading" style="text-align: center"></div><br>
				<div class="form-group">
				
				<tr>
					<td><label for="nama">Nama</label></td>
					<td>
						<input name="nama" type="text" class="required"  autofocus id="nama" placeholder="Masukkan Nama ">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_nama;?></span></td>
				</tr>
				
				<tr>
					<td><label for="ahliwaris">Ahli Waris</label></td>
					<td>
						<input name="ahliwaris" type="text" class="required"  autofocus id="ahliwaris" placeholder="Masukkan Ahli waris">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_ahliwaris;?></span></td>
				</tr>
				
				<tr>
					<td><label for="alamat">Alamat</label></td>
					<td>
						<input name="alamat" type="text" class="required" id="alamat" placeholder="Masukkan Alamat">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_alamat;?></span></td>
				</tr>
				<tr>
					<td><label for="kecamatan">Kecamatan</label></td>
					<td valign="top">
						<select name="kecamatan" id="kecamatan" required onChange="showUser(this.value)">
							<option value="none">Pilih Kecamatan</option>
							<?php
								$query = " SELECT * FROM kecamatan";
								$result = $db->query( $query);
								if (!$result){
								   die ("Could not query the database: <br />". $db->error);
								}
								while ($row = $result->fetch_object()){
									echo '<option value='.$row->idkec.'>'.$row->kecamatan.'</option>';
								}
							?>
						</select>
					</td>
					<td valign="top"><span class="error">* <?php echo $error_kecamatan;?></span></td>
				</tr>
				<tr>
					<td><label for="volume">Volume</label></td>
					<td>
						<input name="volume" type="text" class="required" id="volume" placeholder="Volume Penerima">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_volume;?></span></td>
				</tr>
				
				<tr>
					<td><label for="hargasatuan">Harga Satuan</label></td>
					<td>
						<input name="hargasatuan" type="text" class="required" id="hargasatuan" placeholder="Harga Satuan">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_hargasatuan;?></span></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Simpan" class="btn btn-sm btn-primary" style="width: 220px" />
					</td>
				</tr>
				</div><br> 
			</table>
            </form>
		</div>
		
	<!-- j-Query -->
	<script src="assets/js/jquery.js"></script>
    <script src="assets/js/menu.js"></script>
	<!-- footer -->
	<div class="navbar-fixed-bottom"style="background-color: transparancy ">
		<p align="center"><i> Copyright&copy by :</i> <br /> 
		Dinsosnakertrans Kab. Kudus<br /></p>
	</div>
	</body>
</html>