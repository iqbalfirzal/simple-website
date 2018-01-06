<?php
error_reporting(0);
if(isset($_POST['kirim'])){
if($_FILES['uploaded']['error'] > 0 )
	{
	echo "<div align=center> Anda belum memilih file</div>";
	echo "<div align=center><a href=index.php>Back</a></div>";
	}else{
		include "excel_reader2.php";
		include "../../inc/koneksi.php";
		//membaca file yang diupload
		$data = new Spreadsheet_Excel_Reader($_FILES['uploaded']['tmp_name']);
		//menghitung jumlah baris
		$baris=$data->rowcount($sheet_index=0);

		//echo"$baris baris <br>";
		for($i=2;$i<=$baris;$i++){
		$ii=$i-1;
		$nama=$data->val($i,3);
		$nis=$data->val($i,2);
		//echo "$ii. $nis $nama <br>";
		
		mysql_query("INSERT INTO excel (NIS,Nama) VALUES('$nis','$nama')");
		}
	}

}
?>