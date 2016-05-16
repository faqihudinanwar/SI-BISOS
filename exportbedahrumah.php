<?PHP
include("koneksi.php");
include("excel.class.php");
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_error . ') ');
}
if (isset($_SERVER['HTTP_REFERER'])){ //cek referal url situs
//lakukan covert data ke excel
	$query = "select * from bedahrumah";
	$ip = $_SERVER['REMOTE_ADDR'];
	$nama_file = "databedahrumah$ip.xls";
	$sql = $mysqli->query($query);
	$arrmhs = array();
	while ($row = $sql->fetch_assoc()) {
	array_push($arrmhs, $row);
	}
	$excel = new Excel();
	$excel->setHeader("$nama_file");
	$excel->BOF();
	$excel->writeLabel(0, 0, "NAMA");
	$excel->writeLabel(0, 1, "ALAMAT");
	$excel->writeLabel(0, 2, "ID KECAMATAN");
	$excel->writeLabel(0, 3, "BANTUAN");
	$i = 1;
	foreach ($arrmhs as $baris) {
		$j = 0;
		foreach ($baris as $value) {
			$excel->writeLabel($i, $j, $value);
			$j++;
		}
		$i++;
	}
	$excel->EOF();
	exit();
}else{
header("location:bedahrumah.php");
}
?>