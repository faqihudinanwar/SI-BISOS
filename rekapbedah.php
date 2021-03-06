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
            <div class="title" align="center"><h3>Data Rekapitulasi Bantuan Rehabilitasi Sosial Daerah Kumuh<br> Bedah Rumah dan Rehabilitasi Rumah Tidak Layak Huni Melalui APBD Kab.Kudus<br>  </h3></div>
				<br>
				<ul>
						<i class="glyphicon glyphicon-plus"></i>
						<a href="tambahrekapbedah.php">Tambah Data</a>
						<i class="icon-angle-left"></i> 
				</ul>
				
			<table class="table table-hover table-condensed" >
				<tr>
					<th rowspan="2"><center>No</center></th>
					<th rowspan="2"><center>Tahun</center></th>
					<th colspan="3"><center>Bedah Rumah</center></th>
					<th colspan="3"><center>Rehabilitasi Rumah Tidak Layak Huni</center></th>
					<th rowspan="2"><center>Total</center></th>
					<th colspan="2"><center>Aksi</center></th>
				</tr>
				<tr>
					<th ><center>Volume</center></th>
					<th ><center>Harga Satuan</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Volume</center></th>
					<th><center>Volume</center></th>
					<th><center>Volume</center></th>
				</tr>
				<?php
		//connect database
		require_once('db_login.php');
		$db = new mysqli($db_host, $db_username, $db_password, $db_database);
		if ($db->connect_errno){
			die("Could not connect to database: <br/>".$db->connect_errno);
		}
		//assign a query
		$query = "SELECT rekapbedah.idrekap, rekapbedah.tahun, rekapbedah.volbedah, rekapbedah.satuanbedah, rekapbedah.jumlahbedah, rekapbedah.volrehab, rekapbedah.satuanrehab, rekapbedah.jumlahrehab, rekapbedah.total FROM rekapbedah ORDER BY idrekap ";
		//execute the query
		$result = $db->query($query);
		if(!$result){
			die("Could not connect to database: <br/>".$db->error);
		}
		//fetch and display the result
		$i = 1;
		while($row = $result->fetch_object()){
		echo'<tr>';
		echo '<td><center>'.$i.'</center></td>';
		echo '<td><center>'.$row->tahun.'</center></td>';
		echo '<td><center>'.$row->volbedah.'</center></td>';
		echo '<td><center>'.$row->satuanbedah.'</center></td>';
		echo '<td><center>'.$row->jumlahbedah.'</center></td>';
		echo '<td><center>'.$row->volrehab.'</center></td>';
		echo '<td><center>'.$row->satuanrehab.'</center></td>';
		echo '<td><center>'.$row->jumlahrehab.'</center></td>';
		echo '<td><center>'.$row->total.'</center></td>';
		echo '<td><center><a href="ubahkematian.php?id='.$row->idrekap.'">ubah </center></a></td>';
		echo '<td><center><a href="hapusrekapbedah.php?id='.$row->idrekap.'">Hapus </center></a></td>';
		echo '</tr>';
		$i++;
}
echo '</table>';
echo '</br>';
echo 'Jumlah Data = '.$result->num_rows;
$result->free();
$db->close();
		?>
				
		</div>
		
	<!-- j-Query -->
	<script src="assets/js/jquery.js"></script>
    <script src="assets/js/menu.js"></script>
	<!-- footer -->
	<nav class="navbar navbar-inverse navbar-fixed-bottom" style="color : #D0D0D0; ">
	<div class="navbar-fixed-bottom"style="background-color: transparancy ">
		<p align="center"><i> Copyright&copy by :</i> <br /> 
		Dinsosnakertrans Kab. Kudus<br /></p>
	</div>
	</body>
</html>