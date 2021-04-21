<?php
	require_once './includes/logincheck.php';
?>
<?php
require('fpdf/fpdf.php');


$pdf = new FPDF();
///var_dump(get_class_methods($pdf));
 $pdf->SetTitle("Grocery Plan List");  
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(145,10,'Grocery Plan List',1,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,8,'No.',1);
$pdf->Cell(45,8,'Product Image',1);
$pdf->Cell(45,8,'Product Name',1);
$pdf->Cell(45,8,'cost',1);

$conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
 $query = $conn->query("SELECT * FROM `planbill` WHERE `user_id` = '$_SESSION[user_id]' ") or die(mysqli_error());
while($row = $query->fetch_array()){
	$no=0;
	$no=$no+1;
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(10,8,$row['prod_id'],1);
	$pdf->Cell(45,8,$row['image'],1); 
	$pdf->Cell(45,8,$row['product_name'],1);
	$pdf->Cell(45,8,$row['cost'],1);
	


}


$pdf->Output('grocerplanbill.pdf', 'I');
?>