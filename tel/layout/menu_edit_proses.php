<?php
include "FvCkInDaY.php";
?>
<?php
$nama=$_POST['nama'];
$links=$_POST['links'];
$id=$_POST['id'];
$old=$_POST['old'];
include "../inc/koneksi.php";
mysql_query("UPDATE table_menu SET nama_menu='$nama', links='$links' WHERE id_menu='$id' ");
header("location:berhasil.php?admin=menu&menu=lihat");

rename("../modul/$old/$old.php","../modul/$old/$links.php");
rename("../modul/$old","../modul/$links");
?>