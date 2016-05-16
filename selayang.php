<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DINAS SOSIAL TENAGA KERJA DAN TRANSMIGRASI KABUPATEN KUDUS</title>
		<!--- Link bootstrap css --->
		<link rel="stylesheet" href="css1/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="css1/animate.min.css" type="text/css">
		<link rel="stylesheet" href="css1/style2.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="css1/screen.css" media="screen" />
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('#tab1').fadeIn('slow'); //tab pertama ditampilkan
			$('ul#nav li a').click(function() { // jika link tab di klik
				$('ul#nav li a').removeClass('active'); //menghilangkan class active (yang tampil)
				$(this).addClass("active"); // menambahkan class active pada link yang diklik
				$('.tab_konten').hide(); // menutup semua konten tab
				var aktif = $(this).attr('href'); // mencari mana tab yang harus ditampilkan
				$(aktif).fadeIn('slow'); // tab yang dipilih, ditampilkan
				return false;
			});

		});

		</script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type='text/javascript'>
		$(document).ready(function(){ 
			$(window).scroll(function(){ 
				if ($(this).scrollTop() > 100) { 
					$('#scroll').fadeIn(); 
				} else { 
					$('#scroll').fadeOut(); 
				} 
			}); 
			$('#scroll').click(function(){ 
				$("html, body").animate({ scrollTop: 0 }, 600); 
				return false; 
			}); 
		});
		</script>
		<!--CSS tombol back to top -->
		<style type="text/css">
		#scroll {
			position:fixed;
			right:10px;
			bottom:10px;
			cursor:pointer;
			width:50px;
			height:50px;
			background-color:#3498db;
			text-indent:-9999px;
			display:none;
			-webkit-border-radius:60px;
			-moz-border-radius:60px;
			border-radius:60px
		}
		#scroll span {
			position:absolute;
			top:50%;
			left:50%;
			margin-left:-8px;
			margin-top:-12px;
			height:0;
			width:0;
			border:8px solid transparent;
			border-bottom-color:#ffffff
		}
		#scroll:hover {
			background-color:#e74c3c;
			opacity:1;filter:"alpha(opacity=100)";
			-ms-filter:"alpha(opacity=100)";
		}
		#searchbox {
		width: 300px;
		}
		#searchbox input {
			outline: none;
		}
		input:focus::-webkit-input-placeholder {
			color: transparent;
		}
		input:focus:-moz-placeholder {
			color: transparent;
		}
		input:focus::-moz-placeholder {
			color: transparent;
		}
		#searchbox input[type="text"] {
			background: url("imgl/search.png") no-repeat 10px 13px #f2f2f2;
			border: 2px solid #f2f2f2;
			font: bold 12px Arial,Helvetica,Sans-serif;
			color: #6A6F75;
			width: 260px;
			padding: 14px 17px 12px 30px;
			-webkit-border-radius: 5px 0px 0px 5px;
			-moz-border-radius: 5px 0px 0px 5px;
			border-radius: 5px 0px 0px 5px;
			text-shadow: 0 2px 3px #fff;
			-webkit-transition: all 0.7s ease 0s;
			-moz-transition: all 0.7s ease 0s;
			-o-transition: all 0.7s ease 0s;
			transition: all 0.7s ease 0s;
		}
		#searchbox input[type="text"]:focus {
		background: #f7f7f7;
		border: 2px solid #f7f7f7;
		width: 280px;
		padding-left: 10px;
		}
		#button-submit{
		background: url("imgl/slider.png") no-repeat;
		margin-left: -40px;
		border-width: 0px;
		width: 43px;
		height: 45px;
		}
		</style>
		
		<!-- Custom Fonts -->
		 <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	</head>
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img alt="header dinas" src="imgl/header.png" style="width:300px; height:50px; padding:1px;"/>
				</div>
				
				<div class="collapse navbar-collapse" id="navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
                        <a class="page-scroll" href="index.php">Beranda</a>
                    </li>
					<li>
                        <a class="page-scroll" href="index.php #layanan">Layanan</a>
                    </li>
                    <li class="dropdown">
                        <a href="#profil" class="dropdown-toggle" data-toggle="dropdown">Profil<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="selayang.php">Selayang Pandang</a></li>
							<li><a href="tugasfungsi.php">Tugas dan Fungsi</a></li>
							<li><a href="">Struktur Organisasi</a></li>
							<li><a href="lokasi.php">Lokasi dan Denah</a></li>
						</ul>
                    </li>
                    <li class="dropdown">
                        <a href="#bidang" class="dropdown-toggle" data-toggle="dropdown">Bidang<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="">Sekretariat</a></li>
							<li><a href="">Bidang Sosial</a></li>
							<li><a href="">Bidang Pengawasan Ketenagakerjaan</a></li>
							<li><a href="">Bidang Hubungan Industrial dan Perselisihan</a>
							<li><a href="">Bidang Penempatan Tenaga Kerja dan Transmigrasi</a>
							<li><a href="">UPT BLK</a>
							</li>
						</ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="#berita">Berita</a>
                    </li>
					<li>
                        <a class="page-scroll" href="#galeri">Galeri</a>
                    </li>
					<li>
                        <a class="page-scroll" href="#tautan">Tautan</a>
                    </li>
					</ul>
				</div>
			</div>
		</nav>
		
		<!-- Section -->
		<section id="selayang">
		<div class="container">
	<br><br><h1><center>Bidang Sosial Dinsosnakertrans <br>Kab. Kudus</center></h1><br><br>
    <ul id="nav">
        <li><a href="#tab1" class="active">Home</a></li>
        <li><a href="#tab2">Bedah Rumah</a></li>
        <li><a href="#tab3">Santunan Kematian</a></li>
        <li><a href="#tab4">Galeri</a></li>
    </ul>
    <div class="clear"></div>
    <div id="konten">
		<div style="display: none;" id="tab1" class="tab_konten">
        	<h2>Beranda</h2>
           	<p>Seksi Bantuan Sosial adalah blablabla lalala yeyeye </p>
        </div>
    	<div style="display: none;" id="tab2" class="tab_konten">
        	<h2>Bedah Rumah</h2>
           	<p>Bedahrumah adalah blablabla lalala yeyeye </p>
			<i class="glyphicon glyphicon-file"></i>
			<a target='_blank' href="fronttampilbedah.php">Persyaratan Pengajuan Bedah Rumah</a>
			<i class="icon-angle-left"></i><br><br>
			<i class="glyphicon glyphicon-file"></i>
			<a href="frontbedahrumah.php">Data Penerima Bantuan Bedah Rumah</a>
			<i class="icon-angle-left"></i>
        </div>
		
        <div style="display: none;" id="tab3" class="tab_konten">
        	<h2>Santunan Kematian</h2>
           	<p>Santunan Kematian adalah blablabla lalala yeyeye icik iwir </p>
			<i class="glyphicon glyphicon-file"></i>
			<a target='_blank' href="fronttampilsantunan.php">Persyaratan Pengajuan Bedah Rumah</a>
			<i class="icon-angle-left"></i><br><br>
			<i class="glyphicon glyphicon-file"></i>
			<a href="frontkematian.php">Data Penerima Santunan Kematian</a>
			<i class="icon-angle-left"></i>
		</div>
        
        <div style="display: none;" id="tab4" class="tab_konten">
        	<h2>Galeri</h2>
           	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque ut quam. Pellentesque vestibulum, velit eget venenatis auctor, quam turpis consequat quam, et ultricies leo neque et tortor. Quisque ut nulla non neque facilisis mattis. Sed quis nibh blandit lacus laoreet feugiat. <a href="#" title="Online Store">Vestibulum</a> ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris tincidunt erat nec risus accumsan tincidunt. Nunc augue massa, accumsan a, mollis vitae, porttitor eu, leo. Vestibulum purus. </p>
			<br>
			<i class="glyphicon glyphicon-picture"></i>
			<a href="frontgaleri.php">Tampilkan Galeri</a>
			<i class="icon-angle-left"></i><br><br>
		</div>
		<br><br><br><br>
    </div><br><br><br><br><br>
   </div>
		</section>

			<section id="contact" style="background-color:#191970; color:#ffffff;">
			<div class="container">
				<div class="row">
					<div class="col-sm-4" style="margin-bottom:70px;">
						<form id="searchbox" method="get" action="/search" autocomplete="off">
								<input name="q" type="text" size="15" placeholder="Search..." />
								<input id="button-submit" type="submit" value=" "/>
						</form>
						<br /><br />
						<div class="kontakme">
							<h4>KONTAK KAMI</h4>
							<hr class="none" style="border-color:white; border-width:1px; max-width: 360px; border-color:#8f959d">
							<div>
								<i class="fa fa-home"></i>&nbsp;&nbsp;Jalan Conge Ngembalrejo No. 99 Bae Kudus
							</div>
							<hr class="none" style="border-color:white; border-width:1px; max-width: 360px; border-color:#8f959d">
							<div>
								<i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;0291&nbsp;&nbsp;4251970,4101184,438691
							</div>
							<hr class="none" style="border-color:white; border-width:1px; max-width: 360px; border-color:#8f959d">
							<div>
								<i class="fa fa-fax"></i>&nbsp;&nbsp;&nbsp;0291&nbsp;&nbsp;438691
							</div>
							<hr class="none" style="border-color:white; border-width:1px; max-width: 360px; border-color:#8f959d">
							<div>
								<i class="fa fa-envelope"></i>&nbsp;&nbsp;kudusdinsosnakertrans@gmail.com
							</div>
						</div>
					</div>

					<div class="col-sm-4" style="margin-bottom:70px;">
						<div class="tautan">
							<h4>LINK TERKAIT</h4>
							<hr class="none" style="border-color:white; border-width:1px; max-width: 360px; border-color:#8f959d">
						</div>
					</div>
				
				<div class="col-sm-4" style="margin-bottom:70px;">
					<div class="statistik" style="margin-bottom:10px;">
						<h4>STATISTIK PENGUNJUNG</h4>
						<hr class="none" style="border-color:white; border-width:1px; max-width: 360px; border-color:#8f959d">
							<?php
								$ip = $_SERVER['REMOTE_ADDR']; //mendapatkan ip user
								$tanggal = date("Ymd");
								$waktu = time();

								require_once "db_login.php";
								$db =new mysqli($db_host, $db_username, $db_password, $db_database);
								if ($db->connect_errno)
								{
									die("could not connect to the database: <br />".$db->connect_error);
								}
								//cek user yang akses berdasar ip
								$s = mysqli_query($db,"SELECT * FROM statistik WHERE ip = '$ip' AND tanggal = '$tanggal'");
								if(mysqli_num_rows($s) == 0){
									mysqli_query($db,"INSERT INTO statistik (ip, tanggal, hits, online) VALUES ('$ip', '$tanggal', '1', '$waktu') ");
								}else{
									mysqli_query($db,"UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal' ");
								}

								//jumlah pengunjung hari ini
								$query1 = mysqli_query($db,"SELECT * FROM statistik WHERE  tanggal = '$tanggal' GROUP BY ip");
								$pengunjung = mysqli_num_rows($query1);

								//total pengunjung yang pernah akses
								$query2 = mysqli_query($db,"SELECT COUNT(hits) as total FROM statistik");
								$hasil2= mysqli_fetch_array($query2);
								$totpengunjung = $hasil2['total'];

								//jumlah hits
								$query3 = mysqli_query($db,"SELECT SUM(hits) as jumlah FROM statistik WHERE tanggal = '$tanggal' GROUP BY tanggal ");
								$hasil3= mysqli_fetch_array($query3);
								$hits = $hasil3['jumlah'];

								//total hits
								$query4 = mysqli_query($db,"SELECT SUM(hits) as total FROM statistik ");
								$hasil4= mysqli_fetch_array($query4);
								$tothits = $hasil4['total'];

								$bataswaktu = time()-300;
								$pengunjungonline = mysqli_num_rows(mysqli_query($db,"SELECT * FROM statistik WHERE online > '$bataswaktu' "));
								
								//angka total pengunjung dalam gambar
								$folder = "counter";
								$ext = ".png";
								
								//digit angka 6 
								$totpengunjunggbr = sprintf("%06d", $totpengunjung);
								//ganti angka dengan gambar
								for($i=0; $i <= 9; $i++){
									$totpengunjunggbr = str_replace($i,"<img src=\"$folder/$i$ext\" alt=\"$i\">", $totpengunjunggbr);
								}
								echo "$totpengunjunggbr ";
								echo "<br />";
								echo "<table style='width:50%; padding :10px; margin-top:10px;'>
										<tbody>
											<tr>
												<td align='right' valign='middle'><i class='fa fa-user'></i>&nbsp&nbsp</td>
												<td align='left' valign='middle'> Pengunjung Hari Ini</td>
												<td align='left' valign='middle'>:  $pengunjung </td>
											</tr>
											<tr>
												<td align='right' valign='middle'><i class='fa fa-users'></i>&nbsp&nbsp</td>
												<td align='left' valign='middle'>Total Pengunjung</td>
												<td align='left' valign='middle'>: $totpengunjung </td>
											</tr> 
											<tr>
												<td align='right' valign='middle'><i class='fa fa-user'></i>&nbsp&nbsp</td>
												<td align='left' valign='middle'>Hits Hari Ini</td>
												<td align='left' valign='middle'>: $hits </td>
											</tr> 
											<tr>
												<td align='right' valign='middle'><i class='fa fa-area-chart'></i>&nbsp&nbsp</td>
												<td align='left' valign='middle'>Total Hits</td>
												<td align='left' valign='middle'>: $tothits </td>
											</tr> 
											<tr>
												<td align='right' valign='middle'><i class='fa fa-user'></i>&nbsp&nbsp</td>
												<td align='left' valign='middle'>Pengunjung Online</td>
												<td align='left' valign='middle'>: $pengunjungonline </td>
											</tr> 
										</tbody>
									</table>

								";

							?>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!--Footer-->
		<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Dinsosnakertrans Kudus 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
	<!--BACK TO TOP -->
	<a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>
	<!-- jQuery Custom -->
	<script src="js/style2.js"></script>
	</body>
</html>