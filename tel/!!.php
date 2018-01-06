<?php
set_time_limit(0);
error_reporting(0);
if(empty($_GET['files'])){
 echo "<script language='JavaScript'>
			alert('Mau ngapain gan?, klik ok aja ya.')
			window.location = 'policy';
		</script>";
}
$filepath = "files/";
$filename=$_GET['file'];
$file=realpath($filepath .'/'. $filename );
$len=filesize($file);
if(!empty($file) && file_exists($file)){
ob_clean();
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public"); 
header("Content-Description: File Transfer");
header("Content-Type:application/octet-stream");
$header="Content-Disposition: attachment; filename=$filename;";
header("Accept-Ranges: bytes");
header($header );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".$len);
@readfile($file);
exit;
}else{
      echo "<script language='JavaScript'>
						alert('File Tidak Ditemukan')
						window.location = 'policy';
					</script>";
    }

?>