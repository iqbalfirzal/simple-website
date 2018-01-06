<?php
include "FvCkInDaY.php";
?>
<?php
include "../inc/koneksi.php";
mysql_query("DELETE FROM buku_tamu WHERE id='$_GET[id]'");
header("location:berhasil.php?admin=tamu");

?>