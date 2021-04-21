<?php
session_start();
include_once("../fpdf/fpdf.php");


if (isset($_POST["id"])) {
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->setFont("Arial","B",16);
	$pdf->Cell(190,10,"Inventory System=",0,1,"C");
	$pdf->setFont("Arial",null,12);
	

	$pdf->Cell(50,10,"",0,1);


	$pdf->Cell(10,10,"#",1,0,"C");
	$pdf->Cell(70,10,"Product Name",1,0,"C");
	$pdf->Cell(30,10,"Item No",1,0,"C");
	$pdf->Cell(40,10,"Cost",1,0,"C");
	

	for ($i=0; $i < count($_POST["id"]) ; $i++) { 
		$pdf->Cell(10,10, ($i+1) ,1,0,"C");
		$pdf->Cell(70,10, $_POST["product_name"][$i],1,0,"C");
		$pdf->Cell(30,10, $_POST["item_no"][$i],1,0,"C");
		$pdf->Cell(40,10, $_POST["cost"][$i],1,0,"C");
		
	}

	$pdf->Cell(50,10,"",0,1);




	$pdf->Output("../PDF_INVOICE/PDF_INVOICE",".pdf", "F");
	$pdf->Output();	

}





?>