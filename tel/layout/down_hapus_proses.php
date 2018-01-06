<?php
include "FvCkInDaY.php";
?>
<?php
include "../inc/koneksi.php";
mysql_query("DELETE FROM upload WHERE id='$_POST[ko]'");
header("location:berhasil.php?admin=download");
?>