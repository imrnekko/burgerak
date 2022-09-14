<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


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
    include("../html/ltr/connection.php");
    $appid=$_SESSION['appid'];

    $sql = "SELECT *
      			FROM
  						students e
  				JOIN
      					applications a
  				ON
  						a.studentid = e.studentid
  				JOIN
  						groupmembers b
  				ON
  						a.applicationid = b.applicationid

  				JOIN
  						classbook_backup_jengka.course c
  				ON
  						c.id_course = a.id_course

  				JOIN
  						programmes d
  				ON
  						d.programmeid = e.programmeid
      			WHERE
      					a.applicationid = '".$appid."'" ;

    $qry = mysqli_query($con,$sql);
    $r=mysqli_fetch_assoc($qry);

    $sname = $r['studentname'];
    $sProgramName = $r['programmename'];
    $sCodeCourse = $r['code_course'];
    $sCodeName = $r['name_course'];
    $sTitle = $r['applicationprojecttitle'];

    $mail->setFrom('systemhea19@gmail.com', 'HEA UiTM');
    $mail->addAddress($r['applicationstudentemail'], 'Pelajar');     // Add a recipient


               // Name is optional
    $mail->addReplyTo('systemhea19@gmail.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'UiTM - KEPUTUSAN PERMOHONAN MENJALANKAN KAJIAN LUAR';

    $mail->Body = '<html>
                    <body>
                    <h2>UiTM - KEPUTUSAN PERMOHONAN MENJALANKAN KAJIAN LUAR</h2>
                      <div> Salam ,</div>

                      <div> sukacita dimaklumkan bahawa permohonan menjalankan aktiviti kajian luar untuk projek yang bertajuk "'.$sTitle.'",
                       kursus '.$sCodeCourse.'-'.$sCodeName.' telah diluluskan. Sila hadir ke Pejabat Hal Ehwal Akademik untuk menerima SURAT PENGESAHAN KAJIAN LUAR yang telah diluluskan, Terima Kasih.</div>

                       <div class="table-responsive">
                          <table class="table table-bordered table-striped">
                          <thead>
                              <tr>

                                <th>APPLICATION ID</th>
                                <th>COURSE CODE</th>
                                <th>COURSE CODE</th>
                                <th>TITLE</th>

                              </tr>
                            </thead>

                            <tbody>
                              <tr>

                              <td>'.$appid.'</td>
                              <td>'.$sCodeCourse.'</td>
                              <td>'.$sCodeName.'</td>
                              <td>'.$sTitle.'</td>


                              </tr>
                            </tfoot>
                          </table>
                        </div>

                    </body>
                    </html>';

    $mail->send();

    if($_SESSION['roleid']==1)
    {
      echo"<script language = 'javascript'>
      alert('Message has been sent!');
      window.location='../html/ltr/historyapp.php';</script>";
    }
    else if($_SESSION['roleid']==3)
    {
      echo"<script language = 'javascript'>
      alert('Message has been sent!');
      window.location='../html/ltr/adminhistoryapp.php';</script>";
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
