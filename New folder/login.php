<?php
	session_start();
	include("db_login.php");
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$type = $_GET['type'];
	$login = "Admin";
	$ids = "id_admin";
	if(isset($_POST["submit"]))
	{
		// Include our login information
		require_once('db_login.php');
		// Connect
		$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
		if (mysqli_connect_errno()){
			die ("Could not connect to the database: <br />".mysqli_connect_errno( ));
		}
		//Asign a query
		$query = " select * from $type where $ids='$_POST[name]'and password='$_POST[pw]'";
		// Execute the query
		$result = $con->query( $query );
		if (!$result){
			die ("Could not query the database: <br />". $con->error);
		}else{
			if($result->num_rows == 1){
				$row = $result->fetch_object();
				$_SESSION["sid"]=$_POST["nama"];
				$_SESSION["usrtype"]=$type;
				$_SESSION['nama']=$row->$ids;
				{
					header("Location: admin.php");
				}
			}else{
				header("location:login.php?balasan=2");
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initital-scale=1">
		<title>Login</title>
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<link href="assets/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
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
						<li><a href="index.php" > <span class="glyphicon glyphicon-home"></span> Back</a></li>
						</li>
					</ul>
				</div> 
			</div>
		</nav>
		<div class ="hallo" style="padding:50px; color: #FFFACD;">
			<center>
				<h2> Selamat Datang di Dinas Sosial Tenaga Kerja dan Transmigrasi <br> Kabupaten Kudus <br/></h2>
			</center>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-3 login-box-t">
					<legend style="color: #FFFACD;">
						<center> Login <?php echo $login;?><br>
							<img src="img/a.png" class="img-responsive img-circle margin" style="display:inline" alt="Logo" width="50" height="50">
						</center>
					</legend>
					<?php
						if(isset($_GET['balasan'])){
					?>
					<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> username/password incorrect</div>
					<?php
					}
					?>
					<div class="kotak">
						<form name="f1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?type='.$type;?>" method="post">
							<div class="form-group has-feedback">
								<i class="form-control-feedback glyphicon glyphicon-user"></i>
								<input type="text" name="name" placeholder="username" class="form-control" maxlength="30" required>
							</div>
							<div class="form-group has-feedback">
								<i class="form-control-feedback glyphicon glyphicon-lock"></i>
								<input type="password" name="pw" placeholder="password" class="form-control" maxlength="30" required>
							</div>
							<div class="checkbox">			
                                <label for="setcookie">
                                    <input type="checkbox" class="clear" id="ingat" name="ingat" value="true" /> tetap login
                                </label>
                            </div>
							<input class="btn btn-primary" type="submit" align="center" name="submit" value="Login" style="width:100%;"/>
						</form>
						
						
					<!--
<?php 
//masukkan variabel statik, variabel ini merupakan variabel yang username & password, untuk sistem pada realnya
//username dan password dapat di cek dari database.
include('statik_variabel.php');
//mulai session
session_start();
//cek cookie, dalam sistem login sederhana ini, cookie diberinama "cookielogin"
if(isset($_COOKIE['cookielogin'])){
    //cek cookie login dengan password dan username yang valid
    //$user = $_COOKIE['cookielogin']['username'];
    //print_r($user);
    if(($_COOKIE['cookielogin']['user']==$username)&&($_COOKIE['cookielogin']['pass']==$password)){
        print_r($_COOKIE);
        //jika valid set status login 1
        $_SESSION['logged']=1;
        //redirect ke halaman member area
        header('location: admin.php');  
 
    }
}
?>
<form method="post" action="login.php">
 
<p><label for="username">Username : <input type="text" name="username"  /></label></p>
<p><label for="password">Password : <input type="password" name="password" /></label></p>
<p><label for="setcookie"><input type="checkbox" name="setcookie" value="true" id="setcookie" /> Remember Me</label></p>
 
<p><input type="submit" name="submit" value="Submit" /> <input type="reset" name="reset" value="Reset" /></p>
</form>

						-->
						
						
						
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
		<nav class="navbar navbar-inverse navbar-fixed-bottom" style="color : #D0D0D0; ">
			<div class="container-fluid">
				<p align="center"><i> &copy Dinas Sosial Tenaga Kerja dan Transmigrasi Kabupaten Kudus</i> </p>
			</div>
		</nav>
	</body>
</html>