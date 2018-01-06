<?php
include "FvCkInDaY.php";
?>
<h2>Unggah File</h2>
<form enctype="multipart/form-data" action="../uploadfiles_proses.php" method="post">
<table border="0" class="keren">
<tbody>
<tr><td>Pilih file untuk diunggah:</td></tr>
<tr>
<td><input name="uploadfile" id="uploadfile" type="file" /></td>
</tr>
<td>------------------------------------</td>
<tr>
<td><input type="submit" value="Upload" name="submit" /></td>
</tr>
</tbody>
</table>
</form>