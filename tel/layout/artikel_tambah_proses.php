<?php
include "FvCkInDaY.php";
?>
<?php
$judul=$_POST['judul'];
$artikel=$_POST['artikel'];
$pengirim="";
$cek=$_POST['cek'];

include "../inc/koneksi.php";
mysql_query("INSERT INTO artikel (judul,tgl,jm,isi)
VALUES('$judul',current_date(),current_time(),'$artikel')");
header("location:berhasil.php?admin=artikel&menu=lihat");
?>