<?php
include "FvCkInDaY.php";
?>
<?php
include "../inc/koneksi.php";
mysql_query("DELETE FROM artikel WHERE id='$_GET[id]'");
header("location:berhasil.php?admin=artikel&menu=lihat");

?>