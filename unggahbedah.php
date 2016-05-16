<?php
	require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
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
			
			<!-- Page Content -->
			<div id="page-content-wrapper" style="background-color:#e8ecf0; font-family: Comic Sans MS;  ">
			
			
							
				<!-- start: Table -->
            <!--Konten-->
		<section>
			<form>
				<h3><center>Unggah Berkas</center></h3><br>
				<ul>
						<td>
							<i class="glyphicon glyphicon-home"></i>
							<a href="beranda.php">Home</a>
							<i class="icon-angle-right"></i> 
						</td>
						<td>
						<i class="glyphicon glyphicon-chevron-left"></i>
						<a href="bedahrumah.php">Kembali</a>
						<i class="icon-angle-left"></i> 
						</td>
				</ul>
				<table>
					<table class="table table-hover table-condensed" >
				<tr>
					<th><center>Jenis Berkas</center></th>
					<th><center>Status</center></th>
					<th><center>Aksi</center></th>
				</tr>
				
					<?php
						// connect database
						$id=$_GET['id'];
						require_once('db_login.php');
						$db = new mysqli($db_host, $db_username, $db_password, $db_database);
						if ($db->connect_errno){
							die ("Could not connect to the database: <br />". $db->connect_error);
						}
						//Asign a query
						$query = "SELECT bedahrumah.idbedah, bedahrumah.nama, bedahrumah.alamat, kecamatan.kecamatan AS kecamatan, bedahrumah.bantuan, bedahrumah.sebelum, bedahrumah.sesudah FROM bedahrumah, kecamatan WHERE bedahrumah.idkec=kecamatan.idkec AND idbedah = '".$id."' ";
						// Execute the query
						$result = $db->query( $query );
						if (!$result){
							die ("Could not query the database: <br />". $db->error);
						}
						// Fetch and display the results
						$row = $result->fetch_object();
						if($row->sebelum == ''){
							$sebelum = 'Belum diunggah';
							$aksi_sebelum = "<a href= 'form_upload.php?tar=sebelum'>Unggah</a>";
						} else{
							$sebelum = "<img src = 'uploads/".$id."/".$row->sebelum."'width=\"400px\" height=\"250px\"  />";
							$aksi_sebelum = " <a href= 'delete_upload.php?tar=sebelum'>Hapus</a>";
						}
						if($row->sesudah == ''){
							$sesudah = 'Belum diunggah';
							$aksi_sesudah = "<a href= 'form_upload.php?tar=sesudah'>Unggah</a>";
						} else{
							$sesudah = "<img src = 'uploads/".$id."/".$row->sesudah."' width=\"400px\" height=\"250px\" />";
							$aksi_sesudah = " <a href= 'delete_upload.php?tar=sesudah'>Hapus</a>";
						}
							echo '<tr>';
							echo '<td><center>Sebelum Bedah</center></td>';
							echo '<td><center>'.$sebelum.'</center></td>'; 
							echo '<td><center>'.$aksi_sebelum.'</center></td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td><center>Sesudah Bedah</center></td>';
							echo '<td><center>'.$sesudah.'</center></td>'; 
							echo '<td><center>'.$aksi_sesudah.'</center></td>';
							echo '</tr>';
			
						
							
						$_SESSION['id']=$id;
						$result->free();
						$db->close();
					?>
					
				</table>
			</form>
			
		</section>
		
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