<?php
include "FvCkInDaY.php";
?>
<?php
$lihat_usernya=mysql_query("SELECT * FROM user");
echo "<table class=keren>";
echo "<tr><td colspan='8' align='right'><a href='?admin=user&user=tambah'><img src='../images/add.png' height='30px'></img></a><a href='./user_download.php'><img src='../images/dload2.png' height='30px'></img></a></td></tr>";
echo "<tr>";
echo "<th>No.</th><th>Foto</th><th>Username</th><th>Nama lengkap</th><th>Email</th><th>HP</th><th width='50px' colspan='2'>Opsi</th>";
echo "</tr>";
$no=1;
while($tampil=mysql_fetch_array($lihat_usernya))
{
	echo "<tr>";
	echo "<td>$no</td><td style='height:5px; width:100px; border-radius:50px; background-image:url(../images/admin/$tampil[foto]); background-repeat:no-repeat; background-size:cover; background-position:center;'></td><td>$tampil[user]</td><td>$tampil[nama]</td><td><a href='mailto:$tampil[mail]'>$tampil[mail]</a></td><td>$tampil[phone]</td>";
	echo "<td><a href='?admin=user&user=edit&id=$tampil[id_user]'><img src='../images/edit.png' height='25px' align='center' title='edit'/></a></td>";
	echo "<td><a href='user_hapus_proses.php?id=$tampil[id_user]'><img src='../images/delete.png' height='25px' align='center' title='hapus'/></a></td>";
	echo "</form>";
	echo "</tr>";
	$no++;
}
echo "</table>";
?>