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
 while($tampil=mysql_fetch_array($query))
{

	$worksheet->SetCellValue('A'.$nom, $no);
	$worksheet->SetCellValue('B'.$nom, $tampil['nama_menu']);
	$worksheet->SetCellValue('C'.$nom, $tampil['links']);

	$no++;
	$nom++;
}

$worksheet->getColumnDimension('A')->setWidth(5);
$worksheet->getColumnDimension('B')->setWidth(15);
$worksheet->getColumnDimension('C')->setWidth(15);

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Menu Megono Dev.xlsx"');
$objWriter->save('php://output');

?>