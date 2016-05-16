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
				<!-- start: Content -->
				<div id="content" class="span10">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="beranda.php">Home</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-picture"></i>
							<a href="#">Galeri</a>
						</li>
					</ul>
					
					<div class="row-fluid sortable">
						<div class="box span12">
							<div class="box-header" data-original-title>
								<h2><i class="halflings-icon picture"></i><span class="break"></span>Upload Gambar</h2>
								<div class="box-icon">
									<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
									<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
								</div>
							</div>
							<div id="content" class="span10">
								<h1>Upload new picture</h1>
								<form action="upload.php" method="post" enctype="multipart/form-data"/>
									<div>
										File allowed : jpg, jpeg, png or gif<br /><br /> 
										<input type="hidden" name="MAX_FILE_SIZE" value="200000" /> 
										<label for="userfile">Upload a file:</label>
										<input type="file" name="userfile" id="userfile"/>
									</div>
									<div class="control-group">
										<label class="control-label" for="keterangan">Keterangan</label>
										<div class="controls">
											<textarea class="span6 typeahead" id="keterangan" rows="3"></textarea>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" id="submit" value="unggah" class="btn btn-primary">Unggah</button>
										<button type="reset" class="btn">Batal</button>
									</div>
								</form>
							</div><!--/.fluid-container-->
						</div><!--/span-->
					</div><!--/row-->	
				</div><!--/.fluid-container-->
			</div>
		</div><!--/fluid-row-->
		
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