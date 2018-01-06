<?php
include "FvCkInDaY.php";
?>
<style type="text/css">
.dome{
	width:89%;
}

.dome tr td{
	border:0px;
}

.dome h2{
	color:#000000;
	font-family: Helvetica,Arial;
	font-weight: bold;
	text-shadow: 0 1px 0 #000;
	font-size: 18px;
	margin:0px;
	background-color:#dedede;
}

.dome h2 a{
color: #000000;
text-decoration:none;
}

.dome h2 a:hover{
color:#D294EB;
text-decoration:none;
}

</style>

<?php
$lihat_menunya=mysql_query("SELECT * FROM artikel ORDER BY CONCAT(tgl, jm) desc");
echo "<table class=dome>";
while($tampil=mysql_fetch_array($lihat_menunya))
{
	$lihat_pengirim=mysql_query("SELECT * FROM user WHERE id_user='$tampil[pengirim]'");
	$pengirim=mysql_fetch_array($lihat_pengirim);
	$artikel=substr($tampil['isi'],0,700);
	echo"<tr>";
	echo"<td colspan='3'><h2><a href='#'>$tampil[judul]</a></h2></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td colspan='3'>$artikel</td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td><font color='#AF0DEF'>$pengirim[nama] | $tampil[tgl] $tampil[jm]</font></td>";
	if($tampil['pengirim']==$_SESSION['cek']){
	echo "<td><a href='?admin=artikel&menu=edit&id=$tampil[id]'><img src='../images/edit.png' height='25px' align='center' title='edit'/></a></td>";
	echo "<td><a href='artikel_hapus_proses.php?id=$tampil[id]'><img src='../images/delete.png' height='25px' align='center' title='hapus'/></a></td>";
	}else{
	echo "<td width='25px'><img src='../images/unable.png' height='25px' align='center' title='unable'/></td><td width='25px'><img src='../images/unable.png' height='25px' align='center' title='unable'/></td>";}
	echo"</tr>";
	echo"<tr><td colspan='3'>&nbsp;</td></tr>";
}
echo "</tr>";
echo "</table>";
?>