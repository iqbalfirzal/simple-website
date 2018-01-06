<?php
include "FvCkInDaY.php";
?>
<?php
$target_dir = "../images/admin/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File yang Anda upload adalah file gambar - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File yang Anda upload bukan sebuah gambar.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "File sudah ada di direktori!";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "File terlalu besar!";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo " Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " File tidak bisa di upload.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File ". basename( $_FILES["fileToUpload"]["name"]). " telah diupload";
    } else {
        echo "Kesalahan saat mengupload file.";
    }
}


$user=$_POST['user'];
$pass1=$_POST['pass'];
$nama=$_POST['nama'];
$mail=$_POST['mail'];
$phone=$_POST['phone'];
$photo=basename( $_FILES["fileToUpload"]["name"]);
$pass=MD5(MD5($pass1));
include "../inc/koneksi.php";
$cek=mysql_query("SELECT * FROM user WHERE user='$user'");
$jumlah=mysql_num_rows($cek);
echo "$user $pass $photo $nama $mail $phone";
if ($jumlah==0)
{
	mysql_query("INSERT INTO user (user,password,nama,foto,phone,mail)
	VALUES('$user','$pass','$nama','$photo','$phone','$mail')");
	header("location:berhasil.php?admin=user&user=lihat");
}
else
{
	echo "Username sudah Digunakan";
}
?>