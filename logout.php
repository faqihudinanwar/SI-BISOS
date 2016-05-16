<?php
	session_start();
	//menghapus session
	if(session_destroy()){
		header("location:login.php");//kembali ke halaman login
	}
?>