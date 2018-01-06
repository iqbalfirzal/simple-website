<?php
$artikel=$_POST['artikel'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$komentar=$_POST['komentar'];

include "koneksi.php";
mysql_query("INSERT INTO comment (id_article,nama,email,komentar) VALUES('$artikel','$nama','$email','$komentar')");
header("location:../desktop_?article=$artikel");
?>