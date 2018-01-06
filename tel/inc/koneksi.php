<?php
error_reporting(0);
$koneksi=mysql_connect("localhost","root","") or die("Akses ditolak");
$koneksi_database=mysql_select_db("megono",$koneksi);
?>