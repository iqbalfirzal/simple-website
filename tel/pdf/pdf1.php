<?php
#latihan pdf pertama
$file="latihan 1 pdf.pdf"; //nama file
require_once("fpdf17/fpdf.php");
$pdf=new FPDF('p','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(15,15,'A',1,0,'C',false);
$pdf->Cell(15,15,'B',1,1,'C',false);
$pdf->Ln(15);
$pdf->Cell(100);
$pdf->Cell(15,15,'C',1,1,'C',false);

$pdf->Output($file,"D"); //untuk membuat nama file
$pdf->Output();
?>