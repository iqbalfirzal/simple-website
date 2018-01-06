<head><title>Kelola File Pengguna</title></head>
<?php
session_start();
if(empty($_SESSION['pengguna']))
{
	header("location:index.php");
}else{
include "../inc/koneksi.php";
$lihat_data=mysql_query("SELECT * FROM user WHERE user='$_SESSION[pengguna]'");
$tampil_user=mysql_fetch_array($lihat_data);
}
?>
<style type='text/css'>
.table{
	width:100%;
	text-align:center;
}
.table th{
	background-color:#848383;
	color:#FFFFFF;
}
.table tr td{
	border: #dedede solid thin;
}
</style>
<?php
	$umpetke_berkas = array('index.php');
	$umpetke_ext   = array('php, html');
	$dir='../files/';
	$dh=opendir($dir) or die('error');
	$no=1;
	echo"<table class='table'>";
	echo"<tr><th>No.</th><th>Nama File</th><th>Simpan</th><th>Hapus</th></tr>";
	while (false !== ($file = readdir($dh))) {
		if ($file != "." && $file != ".." &&
			!in_array($file, $umpetke_berkas) &&
			!in_array(pathinfo($file, PATHINFO_EXTENSION), $umpetke_ext)) 
		{
			echo"<tr><td>$no</td><td style='text-align:left;'>$file</td><td><a href='../!!?file=$file'><img src='../images/dload2.png' height='20px'></a></td><td><a href='../dl.php?del=$file'><img src='../images/delete.png' height='20px'></a></td></tr>";
			$no++;
		}
	}
	echo"</table>";
	closedir($dh);
?>
<a href='../layout/berhasil.php'><img src='../layout/back.png' align='center' height='100px'></a>