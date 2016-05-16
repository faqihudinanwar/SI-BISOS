<?php require_once("koneksi.php");
	 if (!isset($_SESSION)) {
        session_start();
    } 
	$error_tahun  = $error_triwulan = $error_kecamatan = $error_rtsm1 = $error_nominal1 = $error_rtsm2 = $error_nominal2  = "";
	$tahun = $triwulan = $kecamatan = $rtsm1 = $nominal1 = $rtsm2 = $nominal2 = ""; 
	
	if($koneksi->connect_errno){
		die ("could not connect to the database : <br/>". $koneksi->connect_error);
	}
	
	if (isset($_POST["submit"])){
		$tahun				= $_POST["tahun"];
		$triwulan			= $_POST["triwulan"];
		$kecamatan			= $_POST["kecamatan"];
		$rtsm1				= $_POST["rtsm1"];
		$nominal1			= $_POST["nominal1"];
		$rtsm2				= $_POST["rtsm2"];
		$nominal2			= $_POST["nominal2"];


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
		$triwulan = test_input($_POST['triwulan']);
			if($triwulan == ''){
				$error_triwulan = "Kolom ini harus diisi";
				$valid_triwulan = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$triwulan)) {
				$error_triwulan = "Hanya angka yang diperbolehkan";
				$valid_triwulan = FALSE;
			}else {
				$valid_triwulan = TRUE;
			}	
		$kecamatan = test_input($_POST['kecamatan']);
			if($kecamatan == '' || $kecamatan == 'none'){
				$error_kecamatan = "Kecamatan harus diisi";
				$valid_kecamatan = FALSE;
			}else {
				$valid_kecamatan = TRUE;
			}
		$rtsm1 = test_input($_POST['rtsm1']);
			if($rtsm1 == ''){
				$error_rtsm1 = "Kolom ini harus diisi";
				$valid_rtsm1 = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$rtsm1)) {
				$error_rtsm1 = "Hanya angka yang diperbolehkan";
				$valid_rtsm1 = FALSE;
			}else {
				$valid_rtsm1 = TRUE;
			}	
			$nominal1 = test_input($_POST['nominal1']);
			if($nominal1 == ''){
				$error_nominal1 = "Kolom ini harus diisi";
				$valid_nominal1 = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$nominal1)) {
				$error_nominal1 = "Hanya angka yang diperbolehkan";
				$valid_nominal1 = FALSE;
			}else {
				$valid_nominal1 = TRUE;
			}
			$rtsm2 = test_input($_POST['rtsm2']);
			if($rtsm2 == ''){
				$error_rtsm2 = "Kolom ini harus diisi";
				$valid_rtsm2 = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$rtsm2)) {
				$error_rtsm2 = "Hanya angka yang diperbolehkan";
				$valid_rtsm2 = FALSE;
			}else {
				$valid_rtsm2 = TRUE;
			}	
			$nominal2 = test_input($_POST['nominal2']);
			if($nominal2 == ''){
				$error_nominal2 = "Kolom ini harus diisi";
				$valid_nominal2 = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$nominal2)) {
				$error_nominal2 = "Hanya angka yang diperbolehkan";
				$valid_nominal2 = FALSE;
			}else {
				$valid_nominal2 = TRUE;
			}
		
				
		if ($valid_tahun && $valid_triwulan && $valid_kecamatan && $valid_rtsm1 && $valid_nominal1 && $valid_rtsm2 && $valid_nominal2 ){
			$tahun   				= $koneksi->real_escape_string($tahun);
			$triwulan				= $koneksi->real_escape_string($triwulan);
			$kecamatan				= $koneksi->real_escape_string($kecamatan);
			$rtsm1   				= $koneksi->real_escape_string($rtsm1);
			$nominal1   			= $koneksi->real_escape_string($nominal1);
			$rtsm2  				= $koneksi->real_escape_string($rtsm2);
			$nominal2 			 	= $koneksi->real_escape_string($nominal2);
			
			$query = "INSERT INTO rekappkh (tahun, triwulan, idkec, rtsm1, nominal1, rtsm2, nominal2) VALUES ('".$tahun."','".$triwulan."','".$kecamatan."','".$rtsm1."','".$nominal1."','".$rtsm2."','".$nominal2."')";
			$result = $koneksi->query($query);
			if (!$result){
				die("could not query the database: <br />".$koneksi->error);
			}else{
				echo 'Data has been added.<br /><br />';
				sleep(2);
				$koneksi->close();
				header("location:rekappkh.php");	
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
                </li>
				<li>
                        <a href="galeri.php"style="color: #c6e2f4;"><span class="glyphicon glyphicon-bell"></span> Galeri</a>
                    </li>
				
				</ul>
			</div>
			
			<!-- start: Table -->
			<div class="table-responsive">
			<div class="title"><h3>Data Realisasi Pembayaran Bantuan Program keluarga Harapan (PKH)</h3></div>
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
					<td><label for="triwulan">Triwulan</label></td>
					<td>
						<input name="triwulan" type="text" class="required" id="triwulan" placeholder="triwulan">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_triwulan;?></span></td>
				</tr>
				<tr>
					<td><label for="kecamatan">Kecamatan</label></td>
					<td valign="top">
						<select name="kecamatan" id="kecamatan" required onChange="showUser(this.value)">
							<option value="none">Pilih Kecamatan</option>
							<?php
								$query = " SELECT * FROM kecamatan";
								$result = $koneksi->query( $query);
								if (!$result){
								   die ("Could not query the database: <br />". $koneksi->error);
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
					<td><label for="rtsm1">Jumlah RTSM</label></td>
					<td>
						<input name="rtsm1" type="text" class="required" id="rtsm1" placeholder="Jumlah RTSM">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_rtsm1;?></span></td>
				</tr>
				<tr>
					<td><label for="nominal1">Nominal </label></td>
					<td>
						<input name="nominal1" type="text" class="required" id="nominal1" placeholder="nominal">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_nominal1;?></span></td>
				</tr>
				<tr>
					<td><label for="rtsm2">Jumlah RTSM</label></td>
					<td>
						<input name="rtsm2" type="text" class="required" id="rtsm2" placeholder="Jumlah RTSM">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_rtsm2;?></span></td>
				</tr>
				<tr>
					<td><label for="nominal2">Nominal </label></td>
					<td>
						<input name="nominal2" type="text" class="required" id="nominal2" placeholder="nominal">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_nominal2;?></span></td>
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