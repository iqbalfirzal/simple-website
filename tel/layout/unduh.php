<?php
include "FvCkInDaY.php";
?>
<?php
include ("../inc/koneksi.php");
$data = mysql_query("select * from upload");
?>
 
<html>
<head>
</head>
 
<body>
<h2>Daftar File</h2>
<table border="0" class="keren">
   <tr>
   	  <td>ID</td>
      <td>Nama file</td>
      <td>Tipe</td>
      <td>Ukuran</td>
      <td>Deskripsi</td>
      <td>Download</td>
      <td>Hapus</td>
   </tr>
   <?php while ($row =mysql_fetch_assoc($data)) { ?>
   <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['Filename'] ?></td>
      <td><?php echo $row['Filetype'] ?></td>
      <td><?php echo $row['Filesize'] ?></td>
      <td><?php echo $row['deskripsi'] ?></td>
      <td><a href="download.php?id=<?php echo $row['id'] ?>"><img src='../drawable-mdpi/donlot.png' width='35' height='30'></a></td>
      <?php echo "<form method=post action=down_hapus_proses.php>"; ?>
      <td> <?php 
	  echo "<input type=hidden name=\"ko\" value='$row[id]'>
<input type=image name=x src='../drawable-mdpi/busak.png' width='30' height='30'/>";
	  ?></td>
   </tr>
   <?php } ?>
</table>
</body>
</html>