<?php
session_start();
if(!empty($_SESSION['pengguna']))
{
	header("location:../../layout/berhasil.php");
}else{
?>
<!DOCTYPE html>
<html class="no-js">
<head>
<link rel="shortcut icon" href="../../drawable-mdpi/Androidi.ico">

<meta charset="utf-8" />
<title>ADMINISTRATOR LOGIN</title>
<link href="stylesheets/screen.css" rel="stylesheet" media="screen,projection" />
<style>
.forms li {
  position: relative;
}
.show-password-link {
  display: block;
  position: absolute;
  z-index: 11;
}
.password-showing {
  position: absolute;
  z-index: 10;
}
</style>
</head>

<body>
<div class="head">
<br>
<marquee direction="left" loop="-1">
SILAHKAN LOGIN TERLEBIH DAHULU SEBELUM MASUK KE ADMINISTRATOR - MASUKKAN USERNAME DAN PASSWORD ANDA DI FORM YANG DISEDIAKAN -</marquee>
</div>
<body>
<div class="sor">
<br>
</div>
 <form class="forma" method="post" action="../../layout/proses_login.php" >
<font face="Comic Sans MS, cursive"  ADMIN LOGIN</font>

     <ol class="forms">
      <li>
        <label for="username">Username</label>
        <input type="text" name="pengguna" id="username" />
      </li>
      <li>
        <label for="password">Password</label>
        <input type="password" name="kunci" id="password" class="password" />
      </li>
      <li class="buttons">
        <button type="submit">Submit</button>
			<p>Back to The First LoginForm <a href="../../layout/login.php">Here!</a>.</p>
		</li>
    </ol>
  </form>
  
  
<script src="scripts/jquery.js"></script>
<script src="scripts/jquery.showPassword.js"></script>
<script>
$(document).ready(function() {
  $(':password').showPassword({
    linkRightOffset: 5,
    linkTopOffset: 11
  });
});
</script>
</body>
</html>
<?php
}
?>