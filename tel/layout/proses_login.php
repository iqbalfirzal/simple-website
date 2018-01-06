<?php
include "FvCkInDaY.php";
?>
<?php
function randomString($length = 6) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}
$jukok=randomString();
$jukok_maneh=randomString();
$user=$_POST['pengguna'];
$pass1=$_POST['kunci'];
$pass=(MD5(MD5($pass1)));
include "../inc/koneksi.php";
$cek_terdaftar=mysql_query("SELECT * FROM user WHERE user='$user' && password='$pass'");
$jumlah=mysql_num_rows($cek_terdaftar);
if($jumlah==1)
{
	session_start();
	$_SESSION['pengguna']=$user;
	$_SESSION['cek']=$lihat_id;
	header("location:berhasil.php");
}else{
	header("location:login?/error?:-d=$jukok?id/$jukok_maneh/!");
}
?>