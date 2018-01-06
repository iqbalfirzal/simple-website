<html>
<head>
<title>Mengunggah File...</title>
</head>
<body>
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

$target_path = "files/";
$file_path = $target_path . basename( $_FILES['uploadfile']['name']); 
if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file_path)) {
	echo "<script language='JavaScript'>
			alert('File berhasil diupload')
			window.location = 'layout/berhasil.php?admin=downloaduser';
		</script>";
} else{
    echo "<script language='JavaScript'>
			alert('Terjadi kesalahan, file gagal diupload')
			window.location = 'layout/berhasil.php?admin=uploaduser';
		</script>";
}
?>
</body>
</html>