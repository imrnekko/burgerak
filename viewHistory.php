<?php session_start();

include("connection/connection.php");



if($_SESSION['userlogged']==1 && $_SESSION['role_id']==1)
{

  if(isset($_GET['orderid']))
  {

    $sqlFilter = "SELECT * from shipment s join orders o on s.shipment_id=o.shipment_id join orderstatus os on o.orderstatus_id=os.orderstatus_id where order_id = '".$_GET['orderid']."'  ";
    $qryFilter = mysqli_query($con, $sqlFilter);

    $sqlCust = "SELECT * from customer c join orders o on c.cust_id=o.cust_id where o.order_id = '".$_GET['orderid']."' ";
    $qryCust = mysqli_query($con, $sqlCust);

    $rowFilter = mysqli_num_rows($qryFilter);

    if($rowFilter > 0)
    {
      $dataF = mysqli_fetch_assoc($qryFilter);
      $dataC = mysqli_fetch_assoc($qryCust);
      
      $delivery = 0.00;

?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Burgerak - View To Deliver</title>
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

                 * {
              box-sizing: border-box;
            }

            input[type=text], select, textarea {
              width: 100%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
              resize: vertical;
            }

            label {
              padding: 12px 12px 12px 0;
              display: inline-block;
            }

            input[type=submit] {
              background-color: #4CAF50;
              color: white;
              padding: 12px 20px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
              float: right;
            }

            input[type=submit]:hover {
              background-color: #45a049;
            }

            .container2 {
              border-radius: 5px;
              background-color:;
              padding: 20px;
            }

            .col-25 {
              float: left;
              width: 25%;
              margin-top: 6px;
            }

            .col-75 {
              float: left;
              width: 75%;
              margin-top: 6px;
            }

            /* Clear floats after the columns */
            .row:after {
              content: "";
              display: table;
              clear: both;
            }

            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
              .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
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
            
            
            <h1>Order Details</h1>           
            <hr>
              
              <div class="container2">
  <form>
  <div class="row">
    <div class="col-25">
      <label for="order_id">Order ID</label>
    </div>
    <div class="col-75">
      <input type="text" id="order_id" name="order_id" value="<?php echo $dataF['order_id']?>" readonly required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="custName">Customer Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="custName" name="custName" value="<?php echo $dataC['cust_fullname']?>" readonly required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="custName">Phone Number</label>
    </div>
    <div class="col-75">
      <input type="text" id="phoneNo" name="phoneNo" value="<?php echo $dataC['cust_phoneno']?>" readonly required>
    </div>
  </div>
      <div class="row">
    <div class="col-25">
      <label for="shipment">Shipment</label>
    </div>
    <div class="col-75">
      <input type="text" id="shipment" name="shipment" value="<?php echo $dataF['shipment_type']?>" readonly required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="shipment">Status</label>
    </div>
    <div class="col-75">
      <input type="text" id="shipment" name="shipment" value="<?php echo $dataF['orderstatus_name']?>" readonly required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="shipment">Received Time</label>
    </div>
    <div class="col-75">
      <input type="text" id="shipment" name="shipment" value="<?php echo $dataF['receive_time']?>" readonly required>
    </div>
  </div>

  <?php if($dataF['shipment_id'] == 2){ 
      
    $delivery = 5.00;
    
    ?>
     <div class="row">
    <div class="col-25">
      <hr>
       <label for="fname" >LOCATION ADDRESS</label>
        <hr>
    </div>
    <div class="col-75">
       <p style="font-size:12pt;font-family:Poppins;"><?php echo $dataF['address1']?></p>
       <p style="font-size:12pt;font-family:Poppins;"><?php echo $dataF['address2']?></p>
       <p style="font-size:12pt;font-family:Poppins;"><?php echo $dataF['address3']?></p>
       <p style="font-size:12pt;font-family:Poppins;"><?php echo $dataF['postcode']?> <?php echo $dataF['city']?></p>
       <p style="font-size:12pt;font-family:Poppins;"><?php echo $dataF['state']?></p>
    </div>
  </div>
                <?php

              } ?>
              

        
              

              <hr><h1>Menu Ordered</h1><hr>

            <div class="table-responsive">


                 <table id="table">




                              <?php

                              $sqlView = "SELECT * FROM menu m join order_menu om on om.menu_id=m.menu_id
                                          join orders o on om.order_id = o.order_id
                                          where o.order_id='".$_GET['orderid']."' ";
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
                                      <th>MENU</th>
                                      <th>QUANTITY</th>
                                      <th>DESCRIPTION</th>
                                      <th>PRICE</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                while($res = mysqli_fetch_assoc($qrydataView))
                                {
                                  $itemprice = $res['quantity'] * $res['menu_price'];
                                  $subtotal += $itemprice;
                                  ?>

                                  <tr>

                                    <td><?php echo $counter;?></td>
                                    <td><?php echo $res['menu_name'];?></td>
                                    <td><?php echo $res['quantity'];?></td>

                                    <td><?php echo $res['descr'];?></td>
                                    
                                     <td>RM <?php echo number_format((float)$itemprice, 2, '.', '');?></td>
                                    </tr>


                              <?php $counter++; }
                                
                                $sstrate = 0.06;
                                $total = $subtotal + $subtotal*$sstrate;
                            
                            } ?>
                            <tr>
                              <td colspan = "4"><b>SUBTOTAL : </b></td>
                              <td><b>RM <?php echo number_format((float)$subtotal, 2, '.', '');?></b></td>
                            </tr>
                            <tr>
                              <td colspan = "4"><b>TAX RATE (6%) : </b></td>
                              <td><b>RM <?php echo number_format((float)$subtotal*$sstrate, 2, '.', '');?></b></td>
                            </tr>
                            <tr>
                            <td colspan = "4"><b>ROUNDING : </b></td>
                           <?php $rounding = round($subtotal*0.06,1) - ($subtotal*0.06); ?>
                           <td><b>RM <?php echo number_format((float)$rounding, 2, '.', '');?></b></td>
                           </tr>
                           <?php if($delivery == 5.00){?>
                           <tr>
                              <td colspan = "4"><b>DELIVERY : </b></td>
                              <td><b>RM <?php echo number_format((float)$delivery, 2, '.', '');?></b></td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td colspan = "4"><b>TOTAL : </b></td>
                              <td><b>RM <?php echo number_format((float)$total+$rounding+$delivery, 2, '.', '');?></b></td>
                            </tr>




                        </tfoot>
                    </table>

                  
              </div>
              <hr>
            
              <a href="historyTable.php"><button  type="button" style="width:120px;height:60px;font-size:14pt;font-weight:bold;">BACK</button></a>

          </form>
</div>
              </div>
             </section><!-- End Preview -->

                
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


}else{

   
  header("Location: menu.php");
  
}

}



}else{

 
header("Location: login-user.html");

}?>