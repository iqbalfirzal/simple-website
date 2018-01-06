<?php
include "FvCkInDaY.php";
?>
<?php
include "../inc/koneksi.php";
mysql_query("DELETE FROM user WHERE id_user='$_GET[id]'");
header("location:berhasil.php?admin=user&user=lihat");

?>