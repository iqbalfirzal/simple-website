<title>Menghapus...</title>
<?php
	session_start();
	if(empty($_SESSION['pengguna']))
	{
		header("location:index.php");
	}else{
	include "inc/koneksi.php";
	$lihat_data=mysql_query("SELECT * FROM user WHERE user='$_SESSION[pengguna]'");
	$tampil_user=mysql_fetch_array($lihat_data);
	}
	/** BATESIIIII **/
$dir = 'files/';
$file_to_delete = $_GET['del'];
  if (is_file($dir.$file_to_delete)){
    unlink($dir.$file_to_delete);
echo 	"<script language='JavaScript'>
						alert('File Berhasil Dihapus')
						window.location = 'layout/berhasil.php?admin=downloaduser';
					</script>";
  }else {
		echo 	"<script language='JavaScript'>
						alert('File Gagal Dihapus')
						window.location = 'layout/berhasil.php?admin=downloaduser';
					</script>";
	}	
?>