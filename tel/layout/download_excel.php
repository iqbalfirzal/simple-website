<?php
include "FvCkInDaY.php";
?>
<?php
require_once "../excel/classes/PHPExcel.php";
include '../excel/classes/PHPExcel/Writer/Excel2007.php';
include "../inc/koneksi.php";
$query = mysql_query("SELECT * FROM menu");
$nom=2;
$no=1;

$excel = new PHPExcel();
$excel->setActiveSheetIndex(0);
$worksheet = $excel->getActiveSheet();
 
$worksheet->SetCellValue('A1', 'No.');
$worksheet->SetCellValue('B1', 'Nama Menu');
$worksheet->SetCellValue('C1', 'Link');
$worksheet->SetCellValue('D1', 'Posisi');
 while($tampil=mysql_fetch_array($query))
{
	if($tampil['posisi']==1){$posisi="Atas";}else{$posisi="Kanan";}

	$worksheet->SetCellValue('A'.$nom, $no);
	$worksheet->SetCellValue('B'.$nom, $tampil['nama_menu']);
	$worksheet->SetCellValue('C'.$nom, $tampil['links']);
	$worksheet->SetCellValue('D'.$nom, $posisi);

	$no++;
	$nom++;
}

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="menu.xlsx"');
$objWriter->save('php://output');

?>