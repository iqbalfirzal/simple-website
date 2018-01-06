<?php
include "FvCkInDaY.php";
?>
<?php
$nama=$_POST['nama'];
$links=$_POST['links'];
$posisi=$_POST['posisi'];
include "../inc/koneksi.php";
mysql_query("INSERT INTO table_menu (nama_menu,links,posisi)
VALUES('$nama','$links','$posisi')");
header("location:berhasil.php?admin=menu&menu=lihat");
//echo"$nama $links $posisi";
?>