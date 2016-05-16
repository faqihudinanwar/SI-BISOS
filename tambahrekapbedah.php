<?php require_once("koneksi.php");
	 if (!isset($_SESSION)) {
        session_start();
    } 
	$error_tahun  = $error_volbedah = $error_satuanbedah = $error_jumlahbedah = $error_volrehab = $error_satuanrehab = $error_jumlahrehab =$error_total = "";
	$tahun = $volbedah = $satuanbedah = $jumlahbedah = $volrehab = $satuanrehab = $jumlahrehab = $total = ""; 
	
	if($koneksi->connect_errno){
		die ("could not connect to the database : <br/>". $koneksi->connect_error);
	}
	
	if (isset($_POST["submit"])){
		$tahun				= $_POST["tahun"];
		$volbedah			= $_POST["volbedah"];
		$satuanbedah		= $_POST["satuanbedah"];
		$jumlahbedah		= $_POST["jumlahbedah"];
		$volrehab			= $_POST["volrehab"];
		$satuanrehab		= $_POST["satuanrehab"];
		$jumlahrehab		= $_POST["jumlahrehab"];
		$total				= $_POST["total"];

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
		$volbedah = test_input($_POST['volbedah']);
			if($volbedah == ''){
				$error_volbedah = "Kolom ini harus diisi";
				$valid_volbedah = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$volbedah)) {
				$error_volbedah = "Hanya angka yang diperbolehkan";
				$valid_volbedah = FALSE;
			}else {
				$valid_volbedah = TRUE;
			}	
		$satuanbedah = test_input($_POST['satuanbedah']);
			if($satuanbedah == ''){
				$error_satuanbedah = "Kolom ini harus diisi";
				$valid_satuanbedah = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$satuanbedah)) {
				$error_satuanbedah = "Hanya angka yang diperbolehkan";
				$valid_satuanbedah = FALSE;
			}else {
				$valid_satuanbedah = TRUE;
			}	
		$jumlahbedah = test_input($_POST['jumlahbedah']);
			if($jumlahbedah == ''){
				$error_jumlahbedah = "Kolom ini harus diisi";
				$valid_jumlahbedah = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$jumlahbedah)) {
				$error_jumlahbedah = "Hanya angka yang diperbolehkan";
				$valid_jumlahbedah = FALSE;
			}else {
				$valid_jumlahbedah = TRUE;
			}
		$volrehab = test_input($_POST['volrehab']);
			if($volrehab == ''){
				$error_volrehab = "Kolom ini harus diisi";
				$valid_volrehab = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$volrehab)) {
				$error_volrehab = "Hanya angka yang diperbolehkan";
				$valid_volrehab = FALSE;
			}else {
				$valid_volrehab = TRUE;
			}
		$satuanrehab = test_input($_POST['satuanrehab']);
			if($satuanrehab == ''){
				$error_satuanrehab = "Kolom ini harus diisi";
				$valid_satuanrehab = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$satuanrehab)) {
				$error_satuanrehab = "Hanya angka yang diperbolehkan";
				$valid_satuanrehab = FALSE;
			}else {
				$valid_satuanrehab = TRUE;
			}
		$jumlahrehab = test_input($_POST['jumlahrehab']);
			if($jumlahrehab == ''){
				$error_jumlahrehab = "Kolom ini harus diisi";
				$valid_jumlahrehab = FALSE;
			}elseif (!preg_match("/^[0-9]*$/",$jumlahrehab)) {
				$error_jumlahrehab = "Hanya angka yang diperbolehkan";
				$valid_jumlahrehab = FALSE;
			}else {
				$valid_jumlahrehab = TRUE;
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
		
				
		if ($valid_tahun && $valid_volbedah && $valid_satuanbedah && $valid_jumlahbedah && $valid_volrehab && $valid_satuanrehab && $valid_jumlahrehab && $valid_total ){
			$tahun   			= $koneksi->real_escape_string($tahun);
			$volbedah			= $koneksi->real_escape_string($volbedah);
			$satuanbedah		= $koneksi->real_escape_string($satuanbedah);
			$jumlahbedah   		= $koneksi->real_escape_string($jumlahbedah);
			$volrehab   		= $koneksi->real_escape_string($volrehab);
			$satuanrehab   		= $koneksi->real_escape_string($satuanrehab);
			$jumlahrehab  		= $koneksi->real_escape_string($jumlahrehab);
			$total		   		= $koneksi->real_escape_string($total);
						
			$query = "INSERT INTO rekapbedah (tahun, volbedah, satuanbedah, jumlahbedah, volrehab, satuanrehab, jumlahrehab, total) VALUES ('".$tahun."','".$volbedah."','".$satuanbedah."','".$jumlahbedah."','".$volrehab."','".$satuanrehab."','".$jumlahrehab."','".$total."')";
			$result = $koneksi->query($query);
			if (!$result){
				die("could not query the database: <br />".$koneksi->error);
			}else{
				echo 'Data has been added.<br /><br />';
				sleep(2);
				$koneksi->close();
				header("location:rekapbedah.php");	
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
				
				<!--<div class="navbar-collapse collapse ">
					<ul class="nav navbar-nav navbar-right" style="padding-right : 10px;">
						
						<li class="dropdown">
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
			<div class="title"><h3>Data Rekapitulasi Bedah Rumah</h3></div>
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
					<td><label for="volbedah">Volume Bedah Rumah</label></td>
					<td>
						<input name="volbedah" type="text" class="required" id="volbedah" placeholder="Volume">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_volbedah;?></span></td>
				</tr>
				<tr>
					<td><label for="satuanbedah">Satuan</label></td>
					<td>
						<input name="satuanbedah" type="text" class="required" id="satuanbedah" placeholder="Satuan">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_satuanbedah;?></span></td>
				</tr>
				<tr>
					<td><label for="jumlahbedah">Jumlah Bedah</label></td>
					<td>
						<input name="jumlahbedah" type="text" class="required" id="jumlahbedah" placeholder="Jumlah Bedah">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_jumlahbedah;?></span></td>
				</tr>
				<tr>
					<td><label for="volrehab">Volume </label></td>
					<td>
						<input name="volrehab" type="text" class="required" id="volrehab" placeholder="volume">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_volrehab;?></span></td>
				</tr>
				<tr>
					<td><label for="satuanrehab">Satuan Rehab</label></td>
					<td>
						<input name="satuanrehab" type="text" class="required" id="satuanrehab" placeholder="Satuan Rehab">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_satuanrehab;?></span></td>
				</tr>
				<tr>
					<td><label for="jumlahrehab">Jumlah Rehabilitasi</label></td>
					<td>
						<input name="jumlahrehab" type="text" class="required" id="jumlahrehab" placeholder="Jumlah Rehab">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_jumlahrehab;?></span></td>
				</tr>
				<tr>
					<td><label for="total">Total</label></td>
					<td>
						<input name="total" type="text" class="required" id="total" placeholder="Total">
					</td>
					<td valign="top"><span class="error">* <?php echo $error_total;?></span></td>
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