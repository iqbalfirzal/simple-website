<?php
include "FvCkInDaY.php";
?>
<head>
<script type="text/javascript" src="../values/ckeditor/ckeditor.js"></script>
</head>
<h1 align="center">TAMBAH ARTIKEL</h1>
<form method="post" action="artikel_tambah_proses.php">
<table class="keren">
<td width="1000"></td>
<tr>
<?php
echo"<input type=hidden name=cek value='$_SESSION[cek]'>";
?>
<td width="273" align="left"><input name="judul" type="text" size="80" maxlength="120" /></td>
</tr>
<tr>
<td align="left"><textarea class="ckeditor" name="artikel" cols="80" rows="10"></textarea></td>
</tr>
<tr><td colspan="2"><input type="submit" name="simpan" value="Buat" />
<input type="reset" name="hapus" value="Batal" /></td></tr>
</table>
</form>