<link rel="shortcut icon" href="../images/mgndev.png" type="image/x-icon" />
<?php
session_start();
if(!empty($_SESSION['pengguna']))
{
	header("location:berhasil.php");
}else{
?>
<title>Login to MGN Dev Site</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
<section class="container">
<div class="login">
<h1>Masuk Dulu</h1>
<form method="post" action="proses_login.php">
<p><input type="text" name="pengguna" value="" placeholder="Nama Pengguna" autofocus></p>
<p><input type="password" name="kunci" value="" placeholder="Kata Sandi"></p>
		<p class="remember_me">
          Bosan? Coba <a href="../loginform/1/index.html">Ganti Tampilan</a>
        </p>
<p class="submit">
	<td><input type="submit" value="Masuk" ></td>
</p>
</form>
</div>
</section>
</body>
</html>
<?php
}
?>