<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

if(isset($_GET['orderid']))
{
	$orderid = $_GET['orderid'];


// Load Composer's autoloader
require 'PHPMailer-master/PHPMailerAutoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = NULL;                     // SMTP username
    $mail->Password   = NULL;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients

    session_start();
    include("../connection/connection.php");

	$orderid =$_GET['orderid'];
    $sqlCust = "SELECT * from customer c join orders o on c.cust_id=o.cust_id where o.order_id = '".$orderid."'" ;
    $qryCust = mysqli_query($con,$sqlCust);
    $rowCust = mysqli_num_rows($qryCust);


    $mail->setFrom('misuigames@gmail.com', 'Burgerak');
    if($rowCust > 0)
    {
    	while($rCust = mysqli_fetch_assoc($qryCust))
    	{
    			$mail->addAddress($rCust['cust_email'], 'Customer');

    	}

    }


    //------------------------------------------------------------------------------------------------------------------------------

    $sqlOrder =  "SELECT *
      			FROM
				  		shipment s
				JOIN
  						orders o
				ON
  						o.shipment_id = o.shipment_id
  				JOIN
      					orderstatus os
  				ON
  						o.orderstatus_id = os.orderstatus_id
  				
      			WHERE
      					o.order_id = '".$_GET['orderid']."'  ";

    $qryOrder = mysqli_query($con,$sqlOrder);


    $rOrder=mysqli_fetch_assoc($qryOrder);

     // Add a recipient



    // Attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Burgerak Notification - You have new order.';
	
	if($rOrder['shipment_id']==1){
	$mail->Body = '<html>
					<meta charset="utf-8">
					<meta content="width=device-width, initial-scale=1.0" name="viewport">
					<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

						
									<body>
									
    								<h2>BURGERAK - ORDER NOTIFICATION</h2>
    									<div> Hi ,</div>
									  
										
    									<div> Your order now is ready to pickup. Please come to our restaurant to take your order.</div>
														  <center>
														  <img src="" width="200" height="200">
    																	<div class="table-responsive">
    							 											<table id="table" class="table table-bordered table-striped">
    							 											<thead>
    							 													<tr>
    							 														<th>ORDER ID</th>
    							 														<th>TIME</th>
    							 														

    							 													</tr>
    							 												</thead>

    							 												<tbody>
    							 													<tr>

    																				<td>'.$rOrder['order_id'].'</td>
    							 													<td>'.$rOrder['order_time'].'</td>


    							 													</tr>
    							 												</tfoot>
    							 											</table>
																		 </div>
																		 <a href="https://burgerak.online/login-user.html" class="btn btn-primary">LOGIN</a>
																		 
																		 </center>

    								</body>
									</html>';
	}else if($rOrder['shipment_id']==2){
		$mail->Body = '<html>
						<meta charset="utf-8">
						<meta content="width=device-width, initial-scale=1.0" name="viewport">
						<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	
							
										<body>
										
										<h2>BURGERAK - ORDER NOTIFICATION</h2>
											<div> Hi ,</div>
										  
											
											<div> Your order now is ready to be delivered. Please wait while our rider come to your destination.</div>
															  <center>
															  <img src="" width="200" height="200">
																			<div class="table-responsive">
																				 <table id="table" class="table table-bordered table-striped">
																				 <thead>
																						 <tr>
																							 <th>ORDER ID</th>
																							 <th>TIME</th>
																							 
	
																						 </tr>
																					 </thead>
	
																					 <tbody>
																						 <tr>
	
																						<td>'.$rOrder['order_id'].'</td>
																						 <td>'.$rOrder['order_time'].'</td>
	
	
																						 </tr>
																					 </tfoot>
																				 </table>
																			 </div>
																			 <a href="https://burgerak.online/login-user.html" class="btn btn-primary">LOGIN</a>
																			 
																			 </center>
	
										</body>
										</html>';
		}

	$mail->send();
	
	echo"<script language = 'javascript'>
    window.location='../pendingTable.php';</script>";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}
?>
