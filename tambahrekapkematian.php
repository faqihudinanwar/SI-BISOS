<?php require_once("koneksi.php");
	 if (!isset($_SESSION)) {
        session_start();
    } 
	$error_tahun  = $error_sakit = $error_satuansakit = $error_jumlahsakit = $error_kecelakaan = $error_satuankecelakaan = $error_jumlahkecelakaan = $error_total = $error_anggaran = "";
	$tahun = $sakit = $satuansakit = $jumlahsakit = $kecelakaan = $satuankecelakaan = $jumlahkecelakaan = $total = $anggaran = ""; 
	
	if($koneksi->connect_errno){
		die ("could not connect to the database : <br/>". $koneksi->connect_error);
	}
	
	if (isset($_POST["submit"])){
		$tahun				= $_POST["tahun"];
		$sakit				= $_POST["sakit"];
		$satuansakit		= $_POST["satuansakit"];
		$jumlahsakit		= $_POST["jumlahsakit"];
		$kecelakaan			= $_POST["kecelakaan"];
		$satuankecelakaan	= $_POST["satuankecelakaan"];
		$jumlahkecelakaan	= $_POST["jumlahkecelakaan"];
		$total				= $_POST["total"];
		$anggaran			= $_POST["anggaran"];

		$tahun = test_input($_POST['tahun']);
			if($tahun == ''){
				$error_tahun = "Kolom ini harus diisi";
				$valid_tahun = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$tahun)) {
				$error_tahun = "Hanya angka yang diperbolehkan";
				$valid_tahun = FALSE;
			}else {
				$valid_tahun = TRUE;
			}	
		$sakit = test_input($_POST['sakit']);
			if($sakit == ''){
				$error_sakit = "Kolom ini harus diisi";
				$valid_sakit = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$sakit)) {
				$error_sakit = "Hanya angka yang diperbolehkan";
				$valid_sakit = FALSE;
			}else {
				$valid_sakit = TRUE;
			}	
		$satuansakit = test_input($_POST['satuansakit']);
			if($satuansakit == ''){
				$error_satuansakit = "Kolom ini harus diisi";
				$valid_satuansakit = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$satuansakit)) {
				$error_satuansakit = "Hanya angka yang diperbolehkan";
				$valid_satuansakit = FALSE;
			}else {
				$valid_satuansakit = TRUE;
			}	
		$jumlahsakit = test_input($_POST['jumlahsakit']);
			if($jumlahsakit == ''){
				$error_jumlahsakit = "Kolom ini harus diisi";
				$valid_jumlahsakit = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$jumlahsakit)) {
				$error_jumlahsakit = "Hanya angka yang diperbolehkan";
				$valid_jumlahsakit = FALSE;
			}else {
				$valid_jumlahsakit = TRUE;
			}
		$kecelakaan = test_input($_POST['kecelakaan']);
			if($kecelakaan == ''){
				$error_kecelakaan = "Kolom ini harus diisi";
				$valid_kecelakaan = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$kecelakaan)) {
				$error_kecelakaan = "Hanya angka yang diperbolehkan";
				$valid_kecelakaan = FALSE;
			}else {
				$valid_kecelakaan = TRUE;
			}
		$satuankecelakaan = test_input($_POST['satuankecelakaan']);
			if($satuankecelakaan == ''){
				$error_satuankecelakaan = "Kolom ini harus diisi";
				$valid_satuankecelakaan = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$satuankecelakaan)) {
				$error_satuankecelakaan = "Hanya angka yang diperbolehkan";
				$valid_satuankecelakaan = FALSE;
			}else {
				$valid_satuankecelakaan = TRUE;
			}
		$jumlahkecelakaan = test_input($_POST['jumlahkecelakaan']);
			if($jumlahkecelakaan == ''){
				$error_jumlahkecelakaan = "Kolom ini harus diisi";
				$valid_jumlahkecelakaan = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$jumlahkecelakaan)) {
				$error_jumlahkecelakaan = "Hanya angka yang diperbolehkan";
				$valid_jumlahkecelakaan = FALSE;
			}else {
				$valid_jumlahkecelakaan = TRUE;
			}
		$total = test_input($_POST['total']);
			if($total == ''){
				$error_total = "Kolom ini harus diisi";
				$valid_total = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$total)) {
				$error_total = "Hanya angka yang diperbolehkan";
				$valid_total = FALSE;
			}else {
				$valid_total = TRUE;
			}
		$anggaran = test_input($_POST['anggaran']);
			if($anggaran == ''){
				$error_anggaran = "Kolom ini harus diisi";
				$valid_anggaran = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$anggaran)) {
				$error_anggaran = "Hanya angka yang diperbolehkan";
				$valid_anggaran = FALSE;
			}else {
				$valid_anggaran = TRUE;
			}
		
				
		if ($valid_tahun && $valid_sakit && $valid_satuansakit && $valid_jumlahsakit && $valid_kecelakaan && $valid_satuankecelakaan && $valid_jumlahkecelakaan && $valid_total && $valid_anggaran ){
			$tahun   			= $koneksi->real_escape_string($tahun);
			$sakit				= $koneksi->real_escape_string($sakit);
			$satuansakit		= $koneksi->real_escape_string($satuansakit);
			$jumlahsakit   		= $koneksi->real_escape_string($jumlahsakit);
			$kecelakaan   		= $koneksi->real_escape_string($kecelakaan);
			$satuankecelakaan  	= $koneksi->real_escape_string($satuankecelakaan);
			$jumlahkecelakaan  	= $koneksi->real_escape_string($jumlahkecelakaan);
			$total		   		= $koneksi->real_escape_string($total);
			$anggaran	   		= $koneksi->real_escape_string($anggaran);
						
			$query = "INSERT INTO rekapkematian (tahun, sakit, satuansakit, jumlahsakit, kecelakaan, satuankecelakaan, jumlahkecelakaan, total, anggaran) VALUES ('".$tahun."','".$sakit."','".$satuansakit."','".$jumlahsakit."','".$kecelakaan."','".$satuankecelakaan."','".$jumlahkecelakaan."','".$total."','".$anggaran."')";
			$result = $koneksi->query($query);
			if (!$result){
				die("could not query the database: <br />".$koneksi->error);
			}else{
				echo 'Data has been added.<br /><br />';
				sleep(2);
				$koneksi->close();
				header("location:rekapkematian.php");	
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
						<a class="dropdown-toggle" data-toggle="dropdown" ><img src="img/people.png" ><span style="text-decoration : none; color : #f6ecf5"></span><?php if (isset($result['username'])){echo '<td>'.$result['username'].'</td>';}?>
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
					<li>
                        <a href="namapkh.php"style="color: #c6e2f4;"><span class="glyphicon glyphicon-heart-empty"></span> PKH</a>
                    </li>
				<li>
                </li>
				<li>
                        <a href="galeri.php"style="color: #c6e2f4;"><span class="glyphicon glyphicon-bell"></span> Galeri</a>
                    </li>
				
				</ul>
			</div>
			
			<!-- start: Table -->
			<div class="table-responsive">
			<div class="title"><h3>Data Rekapitulasi Santunan Kematian</h3></div>
			<form id="formku" method="post" class="form-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table class="table table-condensed">
				<div id="loading" style="text-align: center"></div><br>
				<div class="form-group">
				
				<tr>
					<td><label for="tahun">Tahun</label></td>
					<td>
						<input name="tahun" type="text" class="required" id="Tahun" placeholder="Tahun">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_tahun;?></span></td>
				</tr>
				<tr>
					<td><label for="sakit">Sakit / Tua</label></td>
					<td>
						<input name="sakit" type="text" class="required" id="sakit" placeholder="Sakit">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_sakit;?></span></td>
				</tr>
				<tr>
					<td><label for="satuansakit">Satuan</label></td>
					<td>
						<input name="satuansakit" type="text" class="required" id="satuansakit" placeholder="Satuan">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_satuansakit;?></span></td>
				</tr>
				<tr>
					<td><label for="jumlahsakit">Jumlah</label></td>
					<td>
						<input name="jumlahsakit" type="text" class="required" id="jumlahsakit" placeholder="Jumlah">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_jumlahsakit;?></span></td>
				</tr>
				<tr>
					<td><label for="kecelakaan">Kecelakaan </label></td>
					<td>
						<input name="kecelakaan" type="text" class="required" id="kecelakaan" placeholder="kecelakaan">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_kecelakaan;?></span></td>
				</tr>
				<tr>
					<td><label for="satuankecelakaan">Satuan</label></td>
					<td>
						<input name="satuankecelakaan" type="text" class="required" id="satuankecelakaan" placeholder="Satuan kecelakaan">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_kecelakaan;?></span></td>
				</tr>
				<tr>
					<td><label for="jumlahkecelakaan">Jumlah</label></td>
					<td>
						<input name="jumlahkecelakaan" type="text" class="required" id="jumlahkecelakaan" placeholder="Jumlah kecelakaan">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_jumlahkecelakaan;?></span></td>
				</tr>
				<tr>
					<td><label for="total">Total</label></td>
					<td>
						<input name="total" type="text" class="required" id="total" placeholder="Total">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_total;?></span></td>
				</tr>
				<tr>
					<td><label for="anggaran">Anggaran</label></td>
					<td>
						<input name="anggaran" type="text" class="required" id="anggaran" placeholder="anggaran">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_anggaran;?></span></td>
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