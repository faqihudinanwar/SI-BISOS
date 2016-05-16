<?php
	session_start();
	
	
	//koneksi ke MySQL
	require_once('db_login.php');
	$db = new mysqli($db_host, $db_username, $db_password, $db_database);
	if ($db->connect_errno){
		die ("Could not connect to the database: <br />". $db->connect_error);
	}
	
	//Buat konfigurasi upload
	//Folder tujuan upload file
	$error       = false;
	$folder     = './gambar/';
	
	//type file yang bisa diupload
	$file_type  = array('jpg','jpeg','png','gif','bmp');
	//tukuran maximum file yang dapat diupload
	$max_size   = 1000000; // 1MB
	if(isset($_POST['Upload'])){
		//Mulai memorises data
		$file_name  = $_FILES['data_upload']['name'];
		$file_size  = $_FILES['data_upload']['size'];
		
		$tmp_name = $_FILES["data_upload"]["tmp_name"];
		$deskripsi = $_POST['deskripsi'];
	
		//cari extensi file dengan menggunakan fungsi explode
		$explode    = explode('.',$file_name);
		$extensi    = $explode[count($explode)-1];
		 
		//check apakah type file sudah sesuai
		if(!in_array($extensi,$file_type)){
			$error   = true;
			$pesan .= 'Type file yang anda upload tidak sesuai<br />';
		}
		if($file_size > $max_size){
			$error   = true;
			$pesan .= 'Ukuran file melebihi batas maximum<br />';
		}
		//check ukuran file apakah sudah sesuai
	 
		if($error == true){
			echo '<div id="error">'.$pesan.'</div>';
		}
		else{
			//mulai memproses upload file
			$db = mysqli_connect("localhost", "root", "", "dinsosnakertrans");
			if(move_uploaded_file($tmp_name, $folder.$file_name)){
				//catat nama file ke database
				$query = "INSERT INTO galeri VALUES (null, '$file_name', '$deskripsi')";
				mysqli_query($db, $query);
				header("location: lihat_gambar.php");
				echo '<div>Berhasil mengupload file '.$file_name.'</div>';				
			} else{
				echo "Proses upload error";
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="icon" href="img/logokab.png" type="image/x-icon"/>
		<title><?php echo "Selamat Datang ".$_SESSION['username']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link id="base-style" href="css/style.css" rel="stylesheet">
		<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<link href="css/menu.css" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
		<!-- end: CSS -->
	</head>
	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="admin.php"><span><img alt="header dinas" src="img/header.png" style="width:300px; height:45px; padding:1px;"/></span></a>
					
					<!-- Menu Header -->
					<div class="nav-no-collapse header-nav">
						<ul class="nav pull-right">
							<li class="dropdown">
								<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<a class="btn dropdown-toggle" data-toggle="dropdown" data-target= "#myNavbar"><span class="halflings-icon white user"></span><?php echo $_SESSION['username']; ?>
										<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="dropdown-menu-title">
										<span>Account Settings</span>
									</li>
									<li><a href="profile_admin.php"> <i class="halflings-icon user"></i> Profile</a></li>
									<li><a href="ubah_password.php"><i class="halflings-icon lock"></i> Security</a></li>
									<li><a href="logout.php"><i class="halflings-icon off"></i>Logout</a></li>
								</ul>
							</li>
							<!-- end: User Dropdown -->
						</ul>
					</div>
					<!-- end: Header Menu -->
				</div>
			</div>
		</div>
		
		<!-- start: Header -->
	
		<div class="container-fluid-full">
			<div class="row-fluid">
				<!-- start: Main Menu -->
				<div id="sidebar-left" class="span2">
					<div class="nav-collapse sidebar-nav">
						<ul class="nav nav-tabs nav-stacked main-menu">							
							<li><a href="admin.php"><i class="icon-home"></i><span class="hidden-tablet"> Beranda</span></a></li>
							<li>
								<a class="dropmenu"><i class="icon-edit"></i><span class="hidden-tablet"> Post </span></a>
								<ul>
									<li><a class="post" href="lihat_post.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Lihat Post</span></a></li>
									<li><a class="newpost" href="new_post.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> New Post</span></a></li>
									<li><a class="newpost" href="upload_file.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Upload File</span></a></li>
									<li><a class="posting" href="posting.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Posting</span></a></li>
									<li><a class="draft" href="draft.php"><i class="icon-file-alt"></i><span class="hidden-tablet"> Draft</span></a></li>
								</ul>	
							</li>	
							<li>
								<a class="dropmenu"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Galeri</span></a>
								<ul>
									<li><a class="submenu" href="upload_gambar.php"><i class="icon-upload"></i><span class="hidden-tablet"> Upload Gambar</span></a></li>
									<li><a class="submenu" href="lihat_gambar.php"><i class="icon-camera"></i><span class="hidden-tablet"> Lihat Gambar</span></a></li>
								</ul>	
							</li>	
							<li>
								<a class="dropmenu"><i class="icon-user"></i><span class="hidden-tablet"> Users</span></a>
								<ul>
									<li><a class="submenu" href="lihat_admin.php"><i class="icon-user"></i><span class="hidden-tablet"> Lihat Admin</span></a></li>
								</ul>	
							</li>	
						</ul>
					</div>
				</div>
				<!-- end: Main Menu -->
				<div id="content" class="span10">
					<form method="post" enctype="multipart/form-data" action="">
						<table class="table" cellpadding="0" cellspacing="0" align="center">
							<tr>
								<td colspan="2" height="25" class="title">Form Upload File</td>
							</tr>
							<tr>
								<td width="100">File</td>
								<td><input type="file" name="data_upload" /></td>
							</tr>
							<tr>
								<td width="100" valign="top">Deskripsi</td>
								<td><textarea name="deskripsi" cols="30" rows="3"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="Upload" value="Upload" /></td>
							</tr>
						</table>
					</form>
				</div><!--/.fluid-container-->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
		<div class="clearfix"></div>
		<footer>
			<p>
				<span style="text-align:left;float:left">&copy; 2016 Dinas Sosial Tenaga Kerja dan Transmigrasi Kabupaten Kudus</a></span>		
			</p>
		</footer>
	
		<!-- start: JavaScript-->
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
		<script src="js/jquery.flot.js"></script>
		<script src="js/jquery.flot.pie.js"></script>
		<script src="js/jquery.flot.stack.js"></script>
		<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
		<!-- end: JavaScript-->
	</body>
</html>


	
