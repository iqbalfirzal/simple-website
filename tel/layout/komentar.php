<?php
include "FvCkInDaY.php";
?>
<html>
</head>
	<title>Buku Tamu</title>
	<style type="text/css">
	.bukutamu{ width:450px; padding:6px 10px; margin:10px 6px; border:0px solid #555; background-color:#ffffff; box-shadow:0px 0px 2px #555;
	text-align:justify;
	}
	.tabel{
	width:100%;
	}
	.tabel th{
	color: #1F35FF;
	text-align: center;
	font-size: 10;
	}
	</style>
</head>
	<table class='tabel'>
	<?php
	include "../inc/koneksi.php";
	$lihat_pesan=mysql_query("SELECT * FROM comment ORDER BY id desc");
	while($tampil=mysql_fetch_array($lihat_pesan))
	{
		echo"<div class='bukutamu'><h3>$tampil[nama]</h3>
		<h4>ID Artikel	: $tampil[id_article]</h4>
		<p>Email	: $tampil[email]</p>
		<p>Komentar	: $tampil[komentar]</p>
		<a href='komentar_hapus_proses.php?id=$tampil[id]'><img src='../images/delete.png' height='45px' align='right' title='hapus'/></a></div>";
	}
	?>
	</table>
</html>