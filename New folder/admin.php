<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initital-scale=1">
		<title><?php echo "Selamat Datang ".$_SESSION['nama']; ?></title>
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<link href="assets/css/menu.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!-- Menu Navigasi -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a href="#" id="ihomebtn" class="navbar-brand"></a>
				</div>
				
				<div class="navbar-collapse collapse ">
					<ul class="nav navbar-nav navbar-right" style="padding-right : 10px;">
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" data-target= "#myNavbar"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nama']; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
								<li><a href="account_setting.php"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
								<li><a href="form_ganti_password.php"><span class="glyphicon glyphicon-lock"></span> Security</a></li>
								<li class="divider"></li>
								<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
							</ul>
						</li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-off"><a/></li>
					</ul>
				</div> 
			</div>
		</nav>
		
		<!-- sidebar menu -->
		<div id="wrapper">
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav nav-pills nav-stacked" id="menu">
					<li class="active">
                        <a href="#"><span class="glyphicon glyphicon-home"></span> Beranda</a>
					</li>
					<li>
                        <a href="post.php"><span class="glyphicon glyphicon-pushpin"></span> Post</a>
					</li>
					<li>
                        <a href="media.php"><span class="glyphicon glyphicon-picture"></span> Media</a>
					</li>
					<li>
                        <a href="setting.php"><span class="glyphicon glyphicon-cog"></span> Setting</a>
                    </li>
					<li>
                        <a href="users.php"><span class="glyphicon glyphicon-user"></span> Users</a>
                    </li>
                </ul>
			</div>
			<!-- Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid xyz">
					<div class="row">
						<div class="col-lg-12">
							<h2><?php echo "Selamat Datang ".$_SESSION['nama']; ?> di Dinas Sosial Tenaga Kerja dan Transmigrasi <br> Kabupaten Kudus</h2>
							<hr>
						</div>
					</div>
				</div>
			</div>
		<div/>
		<!-- j-Query -->
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/menu.js"></script>
		<!-- footer -->
		<nav class="navbar navbar-inverse navbar-fixed-bottom" style="color : #D0D0D0; ">
			<div class="container-fluid">
				<p align="center"><i>  &copy Dinas Sosial Tenaga Kerja dan Transmigrasi Kabupaten Kudus</i></p>
			</div>
		</nav>
	</body>
</html>