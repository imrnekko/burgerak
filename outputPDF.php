<?php


session_start();

function getFullDate($datetime)
{
	$date = explode(" ", $datetime);

	return $date[0];
}




if(isset($_GET['orderid']))
{
	$orderid = $_GET['orderid'];





	//require('fpdf.php');

	include("connection/connection.php");

	//require('mysql_table.php');


  require("force_justify.php");
	$pdf = new FPDF();
	$title = 'ORDER RECEIPT ,$orderid';
	$pdf->AddPage();
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(150);


	$pdf->SetMargins( 30, 65 , 20);
	//$pdf->SetXY(0, 0);


	$sql =  "SELECT * FROM shipment s JOIN orders o ON o.shipment_id=s.shipment_id JOIN order_menu om ON
						o.order_id = om.order_id WHERE o.order_id = '".$orderid."'";

	$query = mysqli_query($con,$sql) or die ("ERROR 0 :" .mysqli_error($con));

	

	$row = mysqli_num_rows($query);
	if($row == 0)
	{
		$pdf->Cell(40,5,'Data not exists!');
		//header("Location : details2.php");
	}
	else
	{
		$r = mysqli_fetch_assoc($query);

		$sqlC =  "SELECT * FROM customer c JOIN orders o ON o.cust_id=c.cust_id  WHERE o.cust_id = '".$r['cust_id']."'";

		$queryC = mysqli_query($con,$sqlC) or die ("ERROR 0 :" .mysqli_error($con));

		$rCust = mysqli_fetch_assoc($queryC);

			$image1 = "assets/img/burgeraklogo.png";
			$pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',14);
			$pdf->MultiCell(150,2,'ORDER RECEIPT','FJ');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',12);
			$pdf->MultiCell(150,5,'ORDER INVOICE','C');
			$pdf->Ln();
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(55,5, 'Order ID ',0,0);$pdf->Cell(10,5, ': ');$pdf->Cell(10,5, $r['order_id']);
			$pdf->Ln();
			$pdf->Cell(55,5, 'Date and Time ',0,0);$pdf->Cell(10,5, ': ');$pdf->Cell(10,5, $r['order_time']);
			$pdf->Ln();
			$pdf->Cell(55,5, 'Mode ',0,0);$pdf->Cell(10,5, ': ');$pdf->Cell(10,5, $r['shipment_type']);
			$pdf->Ln();
			$pdf->Cell(55,5, 'Customer Name ',0,0);$pdf->Cell(10,5, ': ');$pdf->Cell(10,5, $rCust['cust_fullname']);
			$pdf->Ln();
			$pdf->Cell(55,5, 'Phone No. ',0,0);$pdf->Cell(10,5, ': ');$pdf->Cell(10,5, $rCust['cust_phoneno']);
			$pdf->Ln(15);
			

			if($r['shipment_id'] == 2)
			{
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell(55,5, 'DELIVERY ADDRESS',0,0);
				$pdf->Ln(10);
				$pdf->SetFont('Arial','',12);
				$pdf->Cell(55,5, $r['address1'],0,0);
				$pdf->Ln();
				$pdf->Cell(55,5, $r['address2'],0,0);
				$pdf->Ln();

				if(!empty($r['address3']))
				{
					$pdf->Cell(55,5, $r['address3'],0,0);
					$pdf->Ln();

				}
				if(!empty($r['city']))
				{
					$pdf->Cell(55,5, $r['city'],0,0);
					$pdf->Ln();

				}
				$pdf->Cell(12,5, $r['postcode'],0,0);$pdf->Cell(1,1, ' ');
				$pdf->Cell(55,5, $r['state'],0,0);
				$pdf->Ln();

			}
			
			$pdf->Ln();
		

			$sql1="SELECT * FROM order_menu om JOIN menu m ON m.menu_id=om.menu_id where om.order_id = '".$orderid."' ";

					$query1= mysqli_query($con,$sql1) or die ("ERROR 1 :" .mysqli_error($con));
					$row1 = mysqli_num_rows($query1);
			// $sql1;
			$pdf->SetMargins( 30,20,30);
			$pdf->SetFont('Arial','B',12);
			$pdf->MultiCell(150,5,'Ordered List:','C');
			$pdf->Ln();
			$pdf->SetFont('Arial','',12);
			$width_cell=array(10,50,20,50,35);

			$pdf->SetFont('Arial','B',12);
			$pdf->Cell($width_cell[0],10,'No.',1,0,'C',false); // First header column
			$pdf->Cell($width_cell[1],10,'Menu',1,0,'C',false); // Second header column
			$pdf->Cell($width_cell[2],10,'Quantity',1,0,'C',false); // Third header column
			$pdf->Cell($width_cell[3],10,'Description',1,0,'C',false);
			$pdf->Cell($width_cell[4],10,'Price (RM)',1,0,'C',false); // 4th header column
			$pdf->Ln();
			$pdf->SetFont('Arial','',12);



			//for($i=1;$i<$row+1;$i++)
			//{
				$i = 1;
				while($z = mysqli_fetch_assoc($query1))
				{
				$pdf->SetFont('Arial','',10);
					// First row of data
				$pdf->Cell($width_cell[0],10,$i,1,0,'C',false); // First column of row 1
				$pdf->Cell($width_cell[1],10,$z['menu_name'],1,0,'C',false); // Second column of row 1
				$pdf->Cell($width_cell[2],10,$z['quantity'],1,0,'C',false); // Third column of row 1
				$pdf->Cell($width_cell[3],10,$z['descr'],1,0,'C',false); // Second column of row 1
				$itemprice = number_format((float)$z['menu_price'], 2, '.', '');
				$pdf->Cell($width_cell[4],10,$itemprice,1,0,'C',false); // Third column of row 1
				$pdf->Ln();
				$i++;
				}

				$width_cell=array(10,120,35);

				$pdf->SetFont('Arial','B',12);
				$pdf->Cell($width_cell[0],10,'',1,0,'C',false); // First header column
				$subtotalprice = number_format((float)$r['subtotal_price'], 2, '.', '');
				$pdf->Cell($width_cell[1],10,'SUBTOTAL PRICE',1,0,'C',false); // Second header column
				$pdf->Cell($width_cell[2],10,$subtotalprice,1,0,'C',false); // Third header column
				$pdf->Ln();
				$pdf->Cell($width_cell[0],10,'',1,0,'C',false); // First header column
				$pdf->Cell($width_cell[1],10,'TAX AMOUNT',1,0,'C',false); // Second header column
				$pdf->Cell($width_cell[2],10,$subtotalprice*0.06,1,0,'C',false); // Third header column
				$pdf->Ln();
			    $rounding = round($subtotalprice*0.06,1) - ($subtotalprice*0.06);
				$pdf->Cell($width_cell[0],10,'',1,0,'C',false); // First header column
				$pdf->Cell($width_cell[1],10,'ROUNDING',1,0,'C',false); // Second header column
				$pdf->Cell($width_cell[2],10,$rounding,1,0,'C',false); // Third header column
				$pdf->Ln();
				if($r['shipment_id'] == 2)
				{
					$pdf->Cell($width_cell[0],10,'',1,0,'C',false); // First header column
					$pdf->Cell($width_cell[1],10,'DELIVERY CHARGE',1,0,'C',false); // Second header column
					$pdf->Cell($width_cell[2],10,'5.00',1,0,'C',false); // Third header column
					$pdf->Ln();

				}
				
				$pdf->Cell($width_cell[0],10,'',1,0,'C',false); // First header column
				$totalprice = number_format((float)$r['total_price'], 2, '.', '');
				$pdf->Cell($width_cell[1],10,'TOTAL PRICE',1,0,'C',false); // Second header column
				$pdf->Cell($width_cell[2],10,$totalprice,1,0,'C',false); // Third header column
				$pdf->Ln();

				$pdf->Ln(15);
				$pdf->Ln();
				$pdf->SetMargins( 30,20,30);
				$pdf->SetFont('Arial','B',14);
				$pdf->MultiCell(150,2,'"THANK YOU AND COME AGAIN!"','FJ');

			//}


	}

	$fileName = 'Burgerak Order Invoice - ' . $_GET['orderid'] . '.pdf';
	$pdf->Output($fileName, 'D');
	$pdf->Output();



}

?>
