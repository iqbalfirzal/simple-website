<?php
include "FvCkInDaY.php";
?>
<h2>Unggah File</h2>
<form enctype="multipart/form-data" method="post">
<table border="0" class="keren">
<tbody>
<tr>
<td>File</td>
<td><input type="file" name="berkas" /></td>
</tr>
<tr>
<td>Keterangan</td>
<td><textarea cols="30" name="keterangan" rows="6"></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Upload" /></td>
</tr>
</tbody>
</table>
</form>
<?php
include ("../inc/koneksi.php");
if ($_POST) {
$filedata = addslashes(fread(fopen($_FILES['berkas']['tmp_name'], 'r'), $_FILES['berkas']['size']));
$tipe  = $_FILES['berkas']['type'];
$ukuran = $_FILES['berkas']['size'];
$nama_file = $_FILES['berkas']['name'];
$keterangan = $_POST['keterangan'];
$result = mysql_query ("insert into upload values ('','$keterangan','$tipe','$filedata','$nama_file',$ukuran)") or die(mysql_error());
if ($result)echo"	<script language='JavaScript'>
						alert('File Berhasil Diupload')
						window.location = '?admin=download';
					</script>";
	
} 
?>


