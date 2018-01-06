<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/mgndev.svg">
<link rel="stylesheet" href="style/styles.css">
<link rel="stylesheet" href="style/upripple.css">
<script src="style/jquery.js"></script>
<script src="style/upripple.js"></script>
<script type="text/javascript">
function validasi_input_koment(form){
  if (form.nama.value == ""){
    alert("Username masih kosong!");
    form.nama.focus();
    return (false);
  }
  pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (!pola_email.test(form.email.value)){
    alert ('Penulisan Email tidak benar');
    form.email.focus();
    return false;
  }
  var mincar = 5;
  if (form.komentar.value.length < mincar){
    alert("Isikan minimal 5 karakter komentar!");
    form.komentar.focus();
    return (false);
  }
return (true);
}
</script>
<script type="text/javascript">
jQuery("document").ready(function($){
    
    var nav = $('.nav');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            nav.addClass("f-nav");
        } else {
            nav.removeClass("f-nav");
        }
    });
 
});

$(function() { $(window).scroll(function() { if($(this).scrollTop()>0) { $('#ScrollToTop').fadeIn()} else { $('#ScrollToTop').fadeOut();}});
$('#ScrollToTop').click(function(){$('html,body').animate({scrollTop:0},1000);return false})});

</script>
<title>
<?php
include "inc/koneksi.php";
	$ac=$_GET['article'];
	if(isset($ac)){
	$query1 = "select * from artikel where id='$ac'";
	$runquery1 = mysql_query($query1);
	$judule = mysql_fetch_array($runquery1);
		print "$judule[judul] | Megono Development";
	}else
		if(ISSET($_GET['modul'])){
		if($_GET['modul']=="home"){print "Megono Development";}
		else	{
					print "404 | Error : Page Not Found";
				}
	}
	else
	{
		print "Megono Development";
	}
?>
</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<nav class="w3-sidenav w3-card-2 w3-white" id="mySidenav">
<div class="w3-container w3-theme-d2">
  <span onclick="w3_close()" class="w3-closenav w3-right w3-large">X</span>
  <br>
  <br>
  <div class="w3-padding w3-center">
    <img class="w3-circle" src="images/mgndev.svg" alt="avatar" style="width:75%">
  </div>
</div>
<br>
<a href='../'>Beranda</a>
<a href='modul/forume'>Forum</a>
<a href='#'>---------------------</a>
<a href='#'>For completely open :</a>
<a href="desktop_">Desktop Version</a>
</nav>
<header class="w3-container w3-card-4 w3-theme w3-top">
  <h1>
  <i class="w3-opennav fa fa-bars" onclick="w3_open()"></i>
  Megono Development
  </h1>
</header>
<div class="ripple" id='ScrollToTop'><img alt='Back to top' src='./images/up.png' height='50px'/></div>
<div class="w3-container" onclick="w3_close()">
<section class='mobile_container' id='main'>
<br>
<br>
<section id='mobile_content'>
<?php
	if(!isset($_GET['modul']) OR $_GET['modul']=="home"){
		if(isset($_GET['article'])){
			 $id = $_GET['article'];
			 $query = mysql_query("select * from artikel where id = '$id' ");
			 $get = mysql_query("SELECT * FROM comment WHERE id_article = '$id' ORDER BY id DESC");
			while($show = mysql_fetch_array($query))
			{
				echo"<article style='border-bottom:1px solid #CCCCCC;'>";
				echo"<header><h2>$show[judul]</h2></header>";
				echo"<p class='article'>$show[isi]</p>";
				echo"</article>";
			}
			echo"KOMENTAR<br><hr>";
			echo"<div id=formkomen> Tambah Komentar :<br>";
			echo "<form method='post' action='inc/koment_proses.php' onsubmit='return validasi_input_koment(this)'>";
			echo "	<table>
						<input type='hidden' name='artikel' value='$id'>
						<tr><td>Nama</td><td><input type='text' name='nama' size='20' /></td></tr>
						<tr><td>Email</td><td><input type='text' name='email' size='20'/></td></tr>
						<tr><td>Komentar</td><td><textarea name='komentar' size='20'></textarea></td></tr>
						<td></td>
						<td align=right><input type='submit' name='simpan' value='Kirim'/></td>
						</table>
						</div>
					</form>";
			
			while($tamp = mysql_fetch_array($get))
			{
				 echo"<div id=tampilkomen><h4>$tamp[nama]</h4><p>$tamp[email]</p><p>$tamp[komentar]</p></div>";
			}
		}else{
	  		$query=mysql_query("select * from artikel order by CONCAT(tgl, jm) DESC ");
		 	while($show = mysql_fetch_array($query))
		 	{
		 		$artikel = $show['isi'];
		 		$idn=$show['id'] ;
		 		$potong_artikel = substr($artikel,0,400);
		 		echo"<article style='border-bottom:1px solid #CCCCCC;'>";
				echo"<header><h2><a href=mobile_?article=$idn>$show[judul]</a></h2></header>";
				echo"<p class='article'>$potong_artikel .... </p><a href='savedadospdf?article=$idn' class='rmore'>Unduh jadi PDF</a><span class='rmore'> | </span><a href=mobile_?article=$idn class='rmore'>Baca Selengkapnya</a>";
				echo"</article>";
		 	}
		}
	}
		?>
</section>
</section>
</div>
<footer class="w3-bottom">
  <p align="center">
	&copy;2016, Megono Development Co Ltd.
	</p>
</footer>
<script>
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
}
</script>
</body>
</html>