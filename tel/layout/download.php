<?php
include ("../inc/koneksi.php");
 
$data = @mysql_query ("select * from upload where
        id=" . $_REQUEST['id']);
 
if ($row = @mysql_fetch_assoc($data))
{
   $filedata = $row['Filedata'];
   $deskripsi = $row['deskripsi'];
   $filename = $row['Filename'];
   $filetype = $row['Filetype'];
   $filesize = $row['Filesize'];
}
 
header('Content-type: ' . $filetype);
header('Content-length: ' . $filesize);
header("Content-Transfer-Encoding: binarynn");
header("Pragma: no-cache");
header("Expires: 0");
header('Content-Disposition: attachment; filename="' . $filename . '"');
echo $filedata;
exit();
?>