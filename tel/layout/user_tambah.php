<?php
include "FvCkInDaY.php";
?>
<h1 align="center">Tambah Admin</h1>
<form method="post" action="user_tambah_proses.php" enctype="multipart/form-data">
<table class="keren">
<tr>
<td>Username</td>
<td align="left"> <input type="text" name="user" size="30" /></td>
</tr>
<tr>
<td>Password</td>
<td align="left"> <input type="password" name="pass" size="30" /></td>
</tr>
<tr>
<td>Nama Lengkap</td>
<td align="left"> <input type="text "name="nama" size="30" /> Nama lengkap selanjutnya tidak bisa diubah, mohon gunakan nama asli Anda. <img src='../images/why.png' title='Demi ketertiban dan keamanan website.' height='15px'></img></td>
</tr>
<tr>
<td>Mail</td>
<td align="left"> <input type="text "name="mail" size="30" /></td>
</tr>
<tr>
<td>Phone</td>
<td align="left"> <input type="text "name="phone" size="30" /></td>
</tr>
<tr>
<td>Profile Photo</td>
<td align="left"><input type="file" name="fileToUpload"></td>
</tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Kirim" /></tr>
</table>
</form>