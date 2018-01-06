<?php
include "inc/koneksi.php";
$id = $_GET['article'];
$query = mysql_query("select * from artikel where id = '$id' ");
$show = mysql_fetch_array($query);

$file="$show[judul].pdf"; //nama file
$judul="$show[judul]";
$isi="$show[isi]";
require_once("pdf/fpdf17/fpdf.php");
$pdf=new FPDF('p','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->MultiCell(0,10,$judul,0,'C',false);
$pdf->Cell(15,15,'',0,1,'C',false);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,8,$isi,0,'J',false);

$pdf->Output($file,"D"); //untuk membuat nama file

?>