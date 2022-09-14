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


    $sqlStaff = "SELECT * from admin" ;
    $qryStaff = mysqli_query($con,$sqlStaff);
    $rowStaff = mysqli_num_rows($qryStaff);


    $mail->setFrom('misuigames@gmail.com', 'Burgerak');
    if($rowStaff > 0)
    {
    	while($rStaff = mysqli_fetch_assoc($qryStaff))
    	{
    			$mail->addAddress($rStaff['admin_email'], 'Staff');

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
	$mail->Body = '<html>
					<meta charset="utf-8">
					<meta content="width=device-width, initial-scale=1.0" name="viewport">
					<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

						
									<body>
									<style>


							#table {
								border-collapse: collapse;
								width: 100%;
								color: #000000;
							  }
							  
							  #table td, #table th {
								border: 1px solid #ddd;
								padding: 8px;
							  }
							  
							  #table tr:nth-child(even){background-color: #f2f2f2;}
							  #table tr{background-color: #f1f0f2;}
							  
							  #table tr:hover {background-color: #ddd;}
							  
							  #table th {
								padding-top: 12px;
								padding-bottom: 12px;
								text-align: left;
								background-color: #4CAF50;
								color: white;
							  }
							
						</style>
    								<h2>BURGERAK - ORDER NOTIFICATION</h2>
    									<div> Hi ,</div>

    									<div> You have new order. Please complete the order given.</div>
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
																		 <a href="https://burgerak.online/login-admin.html" class="btn btn-primary">GO</a>
																		 
																		 </center>

    								</body>
    								</html>';

	$mail->send();
	
	echo"<script language = 'javascript'>
      
      window.location='../success.php?orderid=$orderid';</script>";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}
?>
