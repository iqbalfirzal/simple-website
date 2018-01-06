<?php
include "FvCkInDaY.php";
?>
<head>
<script type="text/javascript" src="../values/ckeditor/ckeditor.js"></script>
</head>
<?php
$lihat_artikelnya=mysql_query("SELECT * FROM artikel WHERE id='$_GET[id]'");
$tampil=mysql_fetch_array($lihat_artikelnya);
?>
<h1 align="center"> EDIT ARTIKEL</h1>
<form method="post" action="artikel_edit_proses.php">
<table class="keren">
<tr>
<td></td>
<td align="left">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>
" />
<input type="text" name="judul" size="30" value="<?php echo $tampil['judul'];?>" /></td>
</tr>
<tr>
<td></td>
<td align="left"><textarea class="ckeditor" cols="80"  rows="5" name="artikel" value="" ><?php echo $tampil['isi'];?></textarea></td>
</tr>
<tr><td colspan="2"><input type="submit" name="ubah" value="kirim" />
</td></tr>
</table>
</form>
