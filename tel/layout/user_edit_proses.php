<?php
include "FvCkInDaY.php";
?>
<?php
$phone=$_POST['phone'];
$mail=$_POST['mail'];
$user=$_POST['user'];
$pass1=$_POST['pass'];
$pass=MD5(MD5($pass1));
$id=$_POST['id'];
include "../inc/koneksi.php";
mysql_query("UPDATE user SET user='$user', password='$pass', phone='$phone', mail='$mail' WHERE id_user='$id' ");
header("location:berhasil.php?admin=user&user=lihat");
//echo"$nama $links $posisi";
?>