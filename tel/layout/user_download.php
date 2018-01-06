<?php
include "FvCkInDaY.php";
?>
<?php
require_once "../excel/classes/PHPExcel.php";
include '../excel/classes/PHPExcel/Writer/Excel2007.php';
include "../inc/koneksi.php";
$query = mysql_query("SELECT * FROM user");
$nom=2;
$no=1;

$excel = new PHPExcel();
$excel->setActiveSheetIndex(0);
$worksheet = $excel->getActiveSheet();
 
$worksheet->SetCellValue('A1', 'No.');
$worksheet->SetCellValue('B1', 'Username');
$worksheet->SetCellValue('C1', 'Fullname');
$worksheet->SetCellValue('D1', 'Email');
$worksheet->SetCellValue('E1', 'Phone');
 while($tampil=mysql_fetch_array($query))
{

	$worksheet->SetCellValue('A'.$nom, $no);
	$worksheet->SetCellValue('B'.$nom, $tampil['user']);
	$worksheet->SetCellValue('C'.$nom, $tampil['nama']);
	$worksheet->SetCellValue('D'.$nom, $tampil['mail']);
	$worksheet->SetCellValue('E'.$nom, $tampil['phone']);

	$no++;
	$nom++;
}

$worksheet->getColumnDimension('A')->setWidth(5);
$worksheet->getColumnDimension('B')->setWidth(20);
$worksheet->getColumnDimension('C')->setWidth(25);
$worksheet->getColumnDimension('D')->setWidth(35);
$worksheet->getColumnDimension('E')->setWidth(20);

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Admin Megono Dev.xlsx"');
$objWriter->save('php://output');

?>