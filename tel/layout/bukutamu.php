<?php
include "FvCkInDaY.php";
?>
<html>
</head>
	<title>Buku Tamu</title>
	<style type="text/css">
	.bukutamu{ width:450px; padding:20px 40px; margin:50px auto; border:0px solid #555; background-color:#ffffff; box-shadow:0px 0px 2px #555;
	text-align:justify;
	}
	.tabel{
	width:100%;
	}
	.tabel th{
	color: #1F35FF;
	text-align: center;
	font-size: 20;
	}
	</style>
</head>
	<table class='tabel'>
	<?php
	include "../inc/koneksi.php";
	$lihat_pesan=mysql_query("SELECT * FROM buku_tamu ORDER BY id desc");
	while($tampil=mysql_fetch_array($lihat_pesan))
	{
		echo"<div class='bukutamu'><h3>$tampil[nama]</h3>
		<p>Email	: $tampil[email]</p>
		<p>Web		: $tampil[website]</p>
		<p>Pesan	: $tampil[pesan]</p>
		<a href='bukutamu_hapus_proses.php?id=$tampil[id]'><img src='../images/delete.png' height='45px' align='right' title='hapus'/></a></div>";
	}
	?>
	</table>
</html>