<?php
include "FvCkInDaY.php";
?>
<?php
include "../inc/koneksi.php";
mysql_query("DELETE FROM table_menu WHERE id_menu='$_GET[id]'");
header("location:berhasil.php?admin=menu&menu=lihat");

?>