<?php
require_once "Classes/PHPExcel.php";
include 'Classes/PHPExcel/Writer/Excel2007.php';
 
$excel = new PHPExcel();
$excel->setActiveSheetIndex(0);
$worksheet = $excel->getActiveSheet();
 
$worksheet->SetCellValue('A1', 'Student Report');
$worksheet->SetCellValue('B1', 'NIM');
$worksheet->SetCellValue('B2', 'Nama');
$worksheet->SetCellValue('B3', 'Alamat');
$worksheet->SetCellValue('B4', 'Tempat');
$worksheet->SetCellValue('B5', 'Tanggal Lahir');
 
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Tes.xlsx"');
$objWriter->save('php://output');

?>