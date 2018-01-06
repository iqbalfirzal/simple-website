<?php
include "FvCkInDaY.php";
?>
<?php
$lihat_menunya=mysql_query("SELECT * FROM table_menu WHERE id_menu='$_GET[id]'");
$tampil=mysql_fetch_array($lihat_menunya);
?>
<h1 align="center">Edit Menu</h1>
<form method="post" action="menu_edit_proses.php">
<table class="keren">
<tr>
<td>Nama Menu</td>
<td align="left"><input type="text"name="nama" size="30" value="<?php echo $tampil['nama_menu'];?>"  /></td>
</tr>
<tr>
<td>Link</td>
<td align="left"><input type="text"name="links" value="<?php echo $tampil['links'];?>"/></td>
</tr>
<tr><td colspan="2">
<input type="hidden" name="old" value="<?php echo $tampil['links'];?>" />
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" /><input type="submit" name="simpan" value="Simpan" />
</td></tr>
</table>
</form>