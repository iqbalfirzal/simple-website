<head><link rel="shortcut icon" href="images/mgndev.png">
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
		if($_GET['modul']=="bukutamu"){print "Buku Tamu";}
		if($_GET['modul']=="download"){print "Unduhan";}
	}
		else
		{
			print "Megono Development";
		}
?>
</title>
</head>
<link rel="stylesheet" href="style/styles.css">
<link rel="stylesheet" href="style/upripple.css">
<link rel="stylesheet" href="style/pagination.css">
<script src="style/jquery.js"></script>
<script src="style/upripple.js"></script>
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

<header class="containerheader" id="header" class="imginv" >
	<img src="images/banner.png" id="logo" class="imginv" height="60px"/>
	<a href='mailto:iqbal.firzal@gmail.com' target='_blank'><img src='images/m.png' class="contactico" /></a>
	<a href='https://www.facebook.com/megonorom' target='_blank'><img src='images/f.png' class="secondcontactico" /></a>
</header>

<nav class="containernav" id="nav">
	<ul>
		<?php
			$kanmenu=mysql_query("SELECT * FROM table_menu ");
			while($tampil=mysql_fetch_array($kanmenu))
			{
				echo"<li><a href='?modul=$tampil[links]'>$tampil[nama_menu]</a></li>";
			}
		?>
		<li><a href='modul/about/aboutmegono'>Tentang</a></li>
		<li><a href='http://bagiin.ga/welcome'>File Host</a></li>
	 	<li><a href='layout/login'>Setelan</a></li>
	</ul>
</nav>
<div class="ripple" id='ScrollToTop'><img alt='Back to top' src='./images/upup.png' height='50px'/></div>
<section class='container' id='main'>
	<section id='content'>
		<div style="min-height:600;">
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
		 	$per_page=6;
	  		$page_query=mysql_query("select COUNT(*) from artikel");
	  		$pages = ceil(mysql_result($page_query, 0) / $per_page);
	  		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	  		$start = ($page - 1) * $per_page;
	  		$query=mysql_query("select * from artikel order by CONCAT(tgl, jm) DESC Limit $start, $per_page");
		 	while($show = mysql_fetch_array($query))
		 	{
		 		$artikel = $show['isi'];
		 		$idn=$show['id'] ;
		 		$potong_artikel = substr($artikel,0,400);
		 		echo"<article style='border-bottom:1px solid #CCCCCC;'>";
				echo"<header><h2><a href=desktop_?article=$idn>$show[judul]</a></h2></header>";
				echo"<p class='article'>$potong_artikel .... </p><a href='savedadospdf?article=$idn' class='rmore'>Unduh jadi PDF</a><span class='rmore'> | </span><a href=desktop_?article=$idn class='rmore'>Baca Selengkapnya</a>";
				echo"</article>";
		 	}
		}
	}else{
		include"kTgOreE/$_GET[modul]/$_GET[modul].php";
	}
		if(ISSET($_GET['modul'])){
		if($_GET['modul']=="forume"){include"modul/forume/forume";}
	}
		?>
		</div>
<br></br>
<br></br>		
<hr></hr>
<?php
	if($pages >= 1 && $page <= $pages){
    for($x=1; $x<=$pages; $x++){
        echo ($x == $page) ? '<tr align="center" id="containerpager">
        							<a class="page active" href="?page='.$x.'">'.$x.'</a>'
        								:
        							'<a class="page" href="?page='.$x.'">'.$x.'</a>
        					 </tr>';
	     }
	 }
 ?>
	</section>
	<aside id='sidebar'>
		<a href='modul/about/aboutmegono'><img src='images/sponsor/mgn2.png' width='90%'/></a>
	</aside>
	<aside id='sidebar2'>
		<a href='DolananBasicWebFrameworkPhaser_'><img src='images/game.png' height='3' width='6%'/></a>
	</aside>
</section>
<footer class='containerfooter' id='footer'>
	<p align="center">
	&copy;2016, Megono Development Co Ltd.
	</p>
</footer>