<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

if(isset($_GET['adminid']))
{
	$adminid = $_GET['adminid'];


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


    $sqlStaff = "SELECT * from admin where admin_id = '".$adminid."'" ;
    $qryStaff = mysqli_query($con,$sqlStaff);
    $rowStaff = mysqli_num_rows($qryStaff);


    $mail->setFrom('misuigames@gmail.com', 'Burgerak');
    if($rowStaff > 0)
    {
    	while($rStaff = mysqli_fetch_assoc($qryStaff))
    	{
    			$mail->addAddress($rStaff['admin_email'], 'Staff');

    	


    //------------------------------------------------------------------------------------------------------------------------------

  

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Burgerak Notification - Your new staff account have been created.';
	$mail->Body = '<html>
					<meta charset="utf-8">
					<meta content="width=device-width, initial-scale=1.0" name="viewport">
					<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

						
									<body>
								
    								<h2>BURGERAK - ACCOUNT VERIFICATION</h2>
    									<div> Hi ,</div>

    									<div> Your new staff account have been created.The details of account shown below.</div>
														  <center>
														  <img src="" width="200" height="200">
    																	<div class="table-responsive">
    							 											<table id="table" class="table table-bordered table-striped">
    							 											<thead>
    							 													<tr>
    							 														<th>USERNAME</th>
    							 														<th>PASSWORD</th>
    							 														

    							 													</tr>
    							 												</thead>

    							 												<tbody>
    							 													<tr>

    																				<td>'.$rStaff['admin_username'].'</td>
    							 													<td>'.$rStaff['admin_password'].'</td>


    							 													</tr>
    							 												</tfoot>
    							 											</table>
																		 </div>
																		 <a href="https://burgerak.online/login-admin.html" class="btn btn-primary">GO</a>
																		 
																		 </center>

    								</body>
									</html>';
									
								}

							}

	$mail->send();
	
	echo"<script language = 'javascript'>
      window.location='../stafflist.php';</script>";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}
?>
