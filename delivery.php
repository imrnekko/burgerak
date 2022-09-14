<?php session_start();

include("connection/connection.php");



if($_SESSION['userlogged']==1 && $_SESSION['role_id']==2)
{

  if(isset($_GET['orderid']))
  {

    $sqlFilter = "SELECT * from orders where order_id = '".$_GET['orderid']."' ";
    $qryFilter = mysqli_query($con, $sqlFilter);

    $rowFilter = mysqli_num_rows($qryFilter);

    if($rowFilter > 0)
    { 
      $dataO=mysqli_fetch_assoc($qryFilter);
      $delprice = 5.00;
?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Burgerak - Order Delivery</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/burgeraklogo.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
          <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
        <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">


        <!-- J-Query -->
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">



      </head>

      <body>
        
        <style>
          
          #radioOption{

            background: transparent;
            font-family : 'trebuchet ms';
            font-size: 13pt;
            font-family: 'Poppins';
            color: white;
            margin: auto;
          }

          #radioOption td{

              padding : 20px;
          }
        
        </style>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
          <div class="container">
            <div class="header-container d-flex align-items-center">
              <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.php"><span>Burgerak</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
              </div>

              <nav class="nav-menu d-none d-lg-block">
                <ul>
                  <li><a>Welcome, <?php echo $_SESSION['username'];?></a></li>
                  <li><div class="dropdown">
                    <span class="iconify" data-icon="bx:bxs-user-circle" data-inline="false" width="30" style="margin:5px;"></span>
                    <div class="dropdown-content">
                    <p><a href="menu.php">&#127828 New Order</a></p>
                    <hr>
                    <p><a href="myprofile.php">My Profile</a></p>
                    <p><a href="listorder.php">Order History</a></p>
                    <hr>
                    <p class="get-started" style="margin:5px;" align="center"><a href="logout.php">Logout</a></p>
                    </div>
                  </div>
                </li>
                
                </ul>
              </nav><!-- .nav-menu -->
            </div><!-- End Header Container -->
          </div>
        </header><!-- End Header -->


        <main id="main">
 
        <section id="preview" class="d-flex align-items-center">
          <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            
            <h1>Choose Delivery</h1>
            <p>Please choose the option for delivery.</p>

         
              <hr>
              <table id="radioOption" >
                <tr>
                  <td><button type="button" data-toggle="modal" data-target="#pickupModal" style="width:250px;height:150px;font-size:26pt;font-weight:bold;" >PICK UP</button></td>
                  <td><button type="button" data-toggle="modal" data-target="#deliveryModal" style="width:250px;height:150px;font-size:26pt;font-weight:bold;" >CASH ON DELIVERY</button></td>
                </tr>
              </table>
             
          </div>
        </section><!-- End Preview -->

        <div class="modal fade" id="deliveryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Delivery Details</h4>
                    <button type="button"  class="close" id="closemodal1" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                  <form action="confirmform.php?orderidD=<?php echo $_GET['orderid'];?>" method="post" style="color:black;width:100%;">
                    <center>
                    <div class="md-form mb-5">
                      <div class="portfolio-wrap">

                      
                         
                      <div class="portfolio-info">
                          <img src="assets/img/burgeraklogo.png" class="img-fluid" alt="" width="200" height="200"></img></br>
                         
                        </div>
                      </div>
                      <table>
                      <tr>
                           <td colspan = "4"><b>SUBTOTAL : </b></td>
                           <td><b>RM <?php echo number_format((float)$dataO['subtotal_price'], 2, '.', '');?></b></td>
                        </tr>
                        <tr>
                           <td colspan = "4"><b>TAX RATE (6%) : </b></td>
                           <td><b>RM <?php echo number_format((float)$dataO['subtotal_price']*0.06, 2, '.', '');?></b></td>
                        </tr>
                        <tr>
                          <?php $rounding = round($dataO['subtotal_price']*0.06,1) - ($dataO['subtotal_price']*0.06); ?>
                           <td colspan = "4"><b>ROUNDING : </b></td>
                           <td><b>RM <?php echo number_format((float)$rounding, 2, '.', '');?></b></td>
                        </tr>
                        <tr>
                           <td colspan = "4"><b>DELIVERY PRICE : </b></td>
                           <td><b>RM <?php echo number_format((float)$delprice, 2, '.', '');?></b></td>
                        </tr>
                        <tr>
                          <td colspan = "4"><b>TOTAL PRICE: </b></td>
                          <td><b>RM <?php echo number_format((float)$dataO['total_price']+$delprice, 2, '.', '');?></b></td>
                        </tr>
                      </table>
                      <hr>
                        <p>Note : Your order will be delivered based this location address.</p>
                      <hr>
                    <label for="deliveraddress">Delivery Address : </label><br>
                    <input type="hidden" name="totalprice" value="<?php echo $dataO['total_price']+$delprice; ?>"required>
                    <input type="text" placeholder="Address Line 1" name="deliveraddress1" required><br>
                    <input type="text" placeholder="Address Line 2" name="deliveraddress2"><br>
                    <input type="text" placeholder="Address Line 3" name="deliveraddress3"><br>
                    <input type="text" placeholder="Postal/Zip Code" name="postcode" maxlength="5" pattern="[0-9]*"required><br>
                    <input type="text" placeholder="City" name="city"><br>
                    <select name="state" id="state" style="height:40px;width:60%;margin-top:10px;margin-bottom:10px;" required>
                                                <option value="">- State</option>
                                                <option value="KUALA LUMPUR">Kuala Lumpur</option>
                                                <option value="SELANGOR">Selangor</option>
                                                <option value="PERAK">Perak</option>
                                                <option value="PAHANG">Pahang</option>
                                                <option value="TERENGGANU">Terengganu</option>
                                                <option value="KELANTAN">Kelantan</option>
                                                <option value="MELAKA">Melaka</option>
                                                <option value="NEGERI SEMBILAN">Negeri Sembilan</option>
                                                <option value="JOHOR">Johor</option>
                                                <option value="SABAH">Sabah</option>
                                                <option value="SARAWAK">Sarawak</option>
                                                <option value="KEDAH">Kedah</option>
                                                <option value="PERLIS">Perlis</option>
                                                <option value="PULAU PINANG">Pulau Pinang</option>
                                                <option value="WILAYAH PERSEKUTUAN LABUAN">Wilayah Persekutuan Labuan</option>
                                                <option value="WILAYAH PERSEKUTUAN PUTRAJAYA">Wilayah Persekutuan Putrajaya</option>
                      </select></br>
                      <hr>
                      <label for="addmessage">Additional Message (Optional) : </label><br>
                      <textarea id="addmessage" name="addmessage" placeholder="Your Message Here..." rows="4" cols="50"></textarea></br>
                    </div>
                    

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-primary" aria-label="Close">Confirm</button>
                      <button class="btn btn-danger" id="closemodal2" data-dismiss="modal" aria-label="Close">Back</button>
                    </div>
                    </center>
                  </form>
                </div>
              </div>
            </div>
        </main><!-- End #main -->

          


        <!-- ======= Footer ======= -->
        <footer id="footer">

        
          <div class="container d-md-flex py-4">

            <div class="mr-md-auto text-center text-md-left">
              <div class="copyright">
                Copyright <strong><span>&copy; 2020 Poro</span></strong>. All Rights Reserved
              </div>
              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

 
        </footer><!-- End Footer -->

        


        <div class="modal fade" id="pickupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Pickup Details</h4>
                    <button type="button"  class="close" id="closemodal1" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                  <form action="confirmform.php?orderidP=<?php echo $_GET['orderid'];?>" method="post" style="color:black;width:100%;">
                    <center>
                    <div class="md-form mb-5">
                      <div class="portfolio-wrap">
                         
                        <div class="portfolio-info">
                          <img src="assets/img/burgeraklogo.png" class="img-fluid" alt="" width="200" height="200"></img>

                        </div>
                      </div>
                      <table>
                      <tr>
                           <td colspan = "4"><b>SUBTOTAL : </b></td>
                           <td><b>RM <?php echo number_format((float)$dataO['subtotal_price'], 2, '.', '');?></b></td>
                        </tr>
                        <tr>
                           <td colspan = "4"><b>TAX RATE (6%) : </b></td>
                           
                           <td><b>RM <?php echo number_format((float)$dataO['subtotal_price']*0.06, 2, '.', '');?></b></td>
                        </tr>
                        <tr>
                           <td colspan = "4"><b>ROUNDING : </b></td>
                           <?php $rounding = round($dataO['subtotal_price']*0.06,1) - ($dataO['subtotal_price']*0.06); ?>
                           <td><b>RM <?php echo number_format((float)$rounding, 2, '.', '');?></b></td>
                        </tr>
                        <tr>
                          <td colspan = "4"><b>TOTAL PRICE: </b></td>
                          <td><b>RM <?php echo number_format((float)$dataO['total_price'], 2, '.', '');?></b></td>
                        </tr>
                      </table>
                      <hr>
                        <p>Note : Your order can be picked up after 30 minutes</p>
                      <hr>
                      <input type="hidden" name="totalprice" value="<?php echo $dataO['total_price']; ?>"required>
                      <label for="estpickupdate">Estimated Pick Up Date : </label>
                      <input type="date" name="estpickupdate" id="estpickupdate" style="width:350px;" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur');echo date("Y-m-d") ;?>" min="<?php date_default_timezone_set('Asia/Kuala_Lumpur');echo date("Y-m-d") ;?>"  max="<?php echo date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));?>" required></br> 
                      <label for="estpickuptime">Estimated Pick Up Time : </label>
                      <input type="time"  name="estpickuptime" id="estpickuptime" style="width:350px;" 
                            <?php 
                            $currentTime = date('Hi',time());   
                            
                            if (((int) date('Hi', time())) < 1000)
                            { ?>
                              min="10:15"

                      <?php }else if (((int) date('Hi', time())) >= 1000 && ((int) date('Hi', time())) < 1030)
                            { ?>

                              min="10:45"
                      <?php }else if (((int) date('Hi', time())) >= 1030 && ((int) date('Hi', time())) < 1100)
                            { ?>

                              min="11:15"
                      <?php }else if (((int) date('Hi', time())) >= 1100 && ((int) date('Hi', time())) < 1130)
                            { ?>

                              min="11:45"
                      <?php }else if (((int) date('Hi', time())) >= 1130 && ((int) date('Hi', time())) < 1200)
                            { ?>

                              min="12:15"
                      <?php }else if (((int) date('Hi', time())) >= 1200 && ((int) date('Hi', time())) < 1230)
                            { ?>

                              min="12:45"
                      <?php }else if (((int) date('Hi', time())) >= 1230 && ((int) date('Hi', time())) < 1300)
                            { ?>

                              min="13:15"
                      <?php }else if (((int) date('Hi', time())) >= 1300 && ((int) date('Hi', time())) < 1330)
                            { ?>

                              min="13:45"
                      <?php }else if (((int) date('Hi', time())) >= 1330 && ((int) date('Hi', time())) < 1400)
                            { ?>

                              min="14:15"
                      <?php }else if (((int) date('Hi', time())) >= 1400 && ((int) date('Hi', time())) < 1430)
                            { ?>

                              min="14:45"
                      <?php }else if (((int) date('Hi', time())) >= 1430 && ((int) date('Hi', time())) < 1500)
                            { ?>

                              min="15:15"
                      <?php }else if (((int) date('Hi', time())) >= 1500 && ((int) date('Hi', time())) < 1530)
                            { ?>

                              min="15:45"
                      <?php }else if (((int) date('Hi', time())) >= 1530 && ((int) date('Hi', time())) < 1600)
                            { ?>

                              min="16:15"
                      <?php }else if (((int) date('Hi', time())) >= 1600 && ((int) date('Hi', time())) < 1630)
                            { ?>

                              min="16:45"
                      <?php }else if (((int) date('Hi', time())) >= 1630 && ((int) date('Hi', time())) < 1700)
                            { ?>

                              min="17:15"
                      <?php }else if (((int) date('Hi', time())) >= 1700 && ((int) date('Hi', time())) < 1730)
                            { ?>

                              min="17:45"
                      <?php }else if (((int) date('Hi', time())) >= 1730 && ((int) date('Hi', time())) < 1800)
                            { ?>

                              min="18:15"
                      <?php }else if (((int) date('Hi', time())) >= 1800 && ((int) date('Hi', time())) < 1830)
                            { ?>

                              min="18:45"
                      <?php }else if (((int) date('Hi', time())) >= 1830 && ((int) date('Hi', time())) < 1900)
                            { ?>

                              min="19:15"
                      <?php }else if (((int) date('Hi', time())) >= 1900 && ((int) date('Hi', time())) < 1930)
                            { ?>

                              min="19:45"
                      <?php }else if (((int) date('Hi', time())) >= 1930 && ((int) date('Hi', time())) < 2000)
                            { ?>

                              min="20:15"
                      <?php }else if (((int) date('Hi', time())) >= 2000 && ((int) date('Hi', time())) < 2030)
                            { ?>

                              min="20:45"
                      <?php }else if (((int) date('Hi', time())) >= 2030 && ((int) date('Hi', time())) < 2100)
                            { ?>

                              min="21:15"
                      <?php } ?>
                            
                          value="<?php echo date("H:i", strtotime("+30 minutes")); ?>"  max="21:30" required></br>
                          <hr>
                           <label for="addmessage">Additional Message (Optional) : </label><br>
                           <textarea id="addmessage" name="addmessage" placeholder="Your Message Here..." rows="4" cols="50"></textarea></br> 
                    </div>
                    

                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                      <button class="btn btn-primary" aria-label="Close">Confirm</button>
                      <button class="btn btn-danger" id="closemodal2" data-dismiss="modal" aria-label="Close">Back</button>
                  </div>
                  </center>
                </form>
                </div>
              </div>
            </div>

            

         

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

        <!-- JS Section -->
        <script type="text/javascript">

            function cardmodal(){
              document.getElementById("cardModal").showModal();

            }

            function onlinemodal(){


            }

        
        </script>
        
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-e89c34cb-d886-4790-9cb5-33875dc311f6"></div>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/vendor/counterup/counterup.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/venobox/venobox.min.js"></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
      
      

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

      </body>

      </html>
<?php

  }else{

   
    header("Location: menu.php");
    
  }

}

}else{

   
  header("Location: login-user.html");
  
}?>