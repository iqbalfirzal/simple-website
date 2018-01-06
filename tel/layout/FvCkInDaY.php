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