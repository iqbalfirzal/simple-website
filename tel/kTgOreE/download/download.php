<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=1766412590291533";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style type='text/css'>
.table{
	width:100%;
	text-align:center;
}
.table th{
	background-color:#848383;
	color:#FFFFFF;
}
.table tr td{
	border: #dedede solid thin;
}
</style>

<?php
	$umpetke_berkas = array('index.php');
	$umpetke_ext   = array('php, html');
	$dir='./files/';
	$dh=opendir($dir) or die('error');
	$no=1;
	echo"<table class='table'>";
	echo"<tr><th>No.</th><th>Nama File</th><th>Simpan</th></tr>";
	while (false !== ($file = readdir($dh))) {
		if ($file != "." && $file != ".." &&
			!in_array($file, $umpetke_berkas) &&
			!in_array(pathinfo($file, PATHINFO_EXTENSION), $umpetke_ext)) 
		{
			echo"<tr><td>$no</td><td style='text-align:left;'>$file</td><td><a href='!!?file=$file'><img src='./images/dload2.png' height='20px'></a></td></tr>";
			$no++;
		}
	}
	echo"</table>";
	closedir($dh);
?>
<br></br>
<hr></hr>
KOMENTARI FILE KAMI.
<hr></hr>
<div class="fb-comments" data-href="http://megonodev.ga/tel/desktop_.php?modul=download" data-width="470" data-numposts="2"></div>