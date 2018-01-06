<?php
include "FvCkInDaY.php";
?>
<?php
$judul=$_POST['judul'];
$artikel=$_POST['artikel'];
$id=$_POST['id'];
include "../inc/koneksi.php";
mysql_query("UPDATE artikel SET judul='$judul',tgl=current_date(),jm=current_time(),isi='$artikel' WHERE id='$id' ");
header("location:berhasil.php?admin=artikel&menu=lihat");
//echo"$judul $artikel";
?>