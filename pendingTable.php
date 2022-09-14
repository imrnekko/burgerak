<?php session_start();

include("connection/connection.php");



if($_SESSION['userlogged']==1 && $_SESSION['role_id']==1)
{

 

?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Burgerak - Order Pending List</title>
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
          }

          #radioOption td{

              padding : 40px;
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
                    <p><a href="admindashboard.php">Dashboard</a></p>
                    <p><a href="adminprofile.php">My Profile</a></p>
                    <hr>
                    <p><a href="pendingTable.php">Pending Order</a></p>
                    <p><a href="toPickupTable.php">to-Pickup Order</a></p>
                    <p><a href="toDeliverTable.php">to-Deliver Order</a></p>
                    <hr>
                    <p><a href="historyTable.php">Previous Order</a></p>
                    <hr>
                    <p><a href="addmenu.php">Add Menu</a></p>
                    <p><a href="foodlist.php">Edit Menu</a></p>
                    <p><a href="hotitem.php">Hot Item</a></p>
                    <hr>
                    <p><a href="addstaff.php">Add Staff</a></p>
                    <p><a href="stafflist.php">Staff List</a></p>
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
            
            <h1>Pending List</h1>

            <div class="table-responsive">


              <table id="table">




                          <?php

                          $sqlView = "SELECT * FROM orderstatus os join orders o on os.orderstatus_id = o.orderstatus_id WHERE o.orderstatus_id = 2";
                          $qrydataView = mysqli_query($con,$sqlView);
                          $rowView = mysqli_num_rows($qrydataView);



                          if($rowView>0)
                          {
                            $counter = 1;
                            
                            $subtotal = 0;
                            ?>
                            <thead>
                                <tr>
                                  <th>NO.</th>
                                  <th>ORDER ID</th>
                                    <th>ORDER TIME</th>
                                  <th>TOTAL PRICE</th>
                                  <th>VIEW</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                            while($res = mysqli_fetch_assoc($qrydataView))
                            {
                            
                              ?>

                              <tr>
         
                                <td><?php echo $counter;?></td>
                                <td><?php echo $res['order_id'];?></td>
                                <td><?php echo $res['order_time'];?></td>

                                <td>RM <?php echo number_format((float)$res['total_price'], 2, '.', '');?></td>
                                <td><a class="btn btn-info btn-lg" href="viewPending.php?orderid=<?php echo $res['order_id'];?>">View</a></td>

                                </tr>


                          <?php $counter++;  }
                            
                            $sstrate = 0.06;
                            $total = $subtotal + $subtotal*$sstrate;
                        
                        }else{
                            echo "THERE'S NO PENDING ORDER";
                          } ?>
                      


                    </tfoot>
                </table>

               
              </div>

          

              </div>
             </section><!-- End Hero -->

                
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

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

        <!-- JS Section -->
        <script type="text/javascript">
        $(function () {
            $('#detailTable').DataTable()
            ({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
              })
            })
        
        </script>


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

 


}

else{

   
  header("Location: login-user.html");
  
}?>