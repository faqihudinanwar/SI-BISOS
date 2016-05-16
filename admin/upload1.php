<?php
//koneksi ke MySQL
require_once('db_login.php');
	$db = new mysqli($db_host, $db_username, $db_password, $db_database);
	if ($db->connect_errno){
		die ("Could not connect to the database: <br />". $db->connect_error);
	}

	$nama = $_POST['nama'];
	$folder = "files";
	$tmp_name = $_FILES["file_file"]["tmp_name"];
	$name = $folder."/".$_FILES["file_file"]["name"];

	//kode untuk upload ke folder gambar
	move_uploaded_file($tmp_name, $name);

	//masukkan datanya ke database
	$input = mysqli_query($db, "INSERT INTO files VALUES(null,'$nama','$name')");

	if($input){
		//jika berhasil kita redirect ke halaman untuk menampilkan foto
		header("location: lihat_files.php");
	}else{
		echo "gagal";
	}
?>