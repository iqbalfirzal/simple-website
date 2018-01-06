<?php
include "FvCkInDaY.php";
?>
<div>
<div>
<div>
<?php
$lihat_menunya=mysql_query("SELECT * FROM table_menu");
echo "<table class=keren>";
echo "<tr><td colspan='6' align='right'><a href='./menu_download.php'><img src='../images/dload2.png' height='30px'></img></a></td></tr>";
echo "<tr>";
echo "<th>NO</th><th>Nama Menu</th><th>Link</th><th width='50px'>Edit</th><th width='50px'>Hapus</th>";
echo "</tr>";
$no=1;
while($tampil=mysql_fetch_array($lihat_menunya))
{
	echo "<tr>";
	echo "<td>$no</td><td>$tampil[nama_menu]</td><td>$tampil[links]</td>";
	echo "<td><a href='?admin=menu&menu=edit&id=$tampil[id_menu]'><img src='../images/edit.png' height='25px' align='center' title='edit'/></a></td>";
	echo "<td><a href='menu_hapus_proses.php?id=$tampil[id_menu]'><img src='../images/delete.png' height='25px' align='center' title='edit'/></a></td>";
	echo "</form>";
	echo "</tr>";
	$no++;
}
echo "<form method='post' action='menu_tambah_proses.php'>";
echo "<tr>";
echo "<td>Tambah</td><td><input type='text' name='nama' size='20' /></td><td><input type='text' name='links' size='20'/></td><td colspan='2'><input type='submit' name='simpan' value='Buat'/>
</td>";
echo "</tr>";
echo "</table>";
?>
</div>
</div>
</div>