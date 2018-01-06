<?php
include "FvCkInDaY.php";
?>
<?php
$lihat_usernya=mysql_query("SELECT * FROM user WHERE id_user='$_GET[id]'");
$tampil=mysql_fetch_array($lihat_usernya);
?>
<h1 align="center">Edit Admin Web</h1>
<form method="post" action="user_edit_proses.php">
<table class="keren">
<tr>
<td>Username</td>
<td align="left"><input type="text" name="user" size="30" \
value="<?php echo $tampil['user'];?>" title="yang digunakan untuk login"/></td>
</tr>
<tr>
<td>Password</td>
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" /><td align="left"><input type="password" name="pass" value="<?php echo $tampil['password'];?>" title="yang digunakan untuk login"  size="30"/></td>
</tr>
<tr>
<td>Nama Lengkap</td>
<td align="left">
<input type="text" name="nama" value="<?php echo $tampil['nama'];?>" disabled  title="yang akan ditampilkan pada artikel" size="30"/></td>
</tr>
<tr>
<td>Email</td>
<td align="left">
<input type="text" name="mail" value="<?php echo $tampil['mail'];?>"  title="Alamat email yang dapat dihubungi"  size="30"/></td>
</tr>
<tr>
<td>Nomor telepon</td>
<td align="left">
<input type="text" name="phone" value="<?php echo $tampil['phone'];?>"  title="Nomor telepon yang dapat dihubungi"  size="30"/></td>
</tr>
<tr><td colspan="2"><input type="submit" name="simpan" value="Simpan" />
</td></tr>
</table>
</form>