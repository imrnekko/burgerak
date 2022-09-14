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

  <title>Burgerak - Update Hot Selling Menu</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #111;
      }
      h1 {
      margin: 0;
      font-weight: 400;
      }
      h3 {
      margin: 12px 0;
      color: #8ebf42;
      }
      .main-block {
      display: flex;
      justify-content: center;
      align-items: center;
      background: #fff;
      }
      form {
      width: 100%;
      padding: 20px;
      }
      fieldset {
      border: none;
      border-top: 1px solid #8ebf42;
      }
      .account-details, .personal-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .account-details >div, .personal-details >div >div {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      }
      .account-details >div, .personal-details >div, input, label {
      width: 100%;
      }
      label {
      padding: 0 5px;
      text-align: right;
      vertical-align: middle;
      }
      input {
      padding: 5px;
      vertical-align: middle;
      }
      .checkbox {
      margin-bottom: 10px;
      }
      select, .children, .gender, .bdate-block {
      width: calc(100% + 26px);
      padding: 5px 0;
      }
      select {
      background: transparent;
      }
      .gender input {
      width: auto;
      } 
      .gender label {
      padding: 0 5px 0 0;
      } 
      .bdate-block {
      display: flex;
      justify-content: space-between;
      }
      .birthdate select.day {
      width: 35px;
      }
      .birthdate select.mounth {
      width: calc(100% - 94px);
      }
      .birthdate input {
      width: 38px;
      vertical-align: unset;
      }
      .checkbox input, .children input {
      width: auto;
      margin: -2px 10px 0 0;
      }
      .checkbox a {
      color: #8ebf42;
      }
      .checkbox a:hover {
      color: #82b534;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #8ebf42; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #82b534;
      }
      @media (min-width: 568px) {
      .account-details >div, .personal-details >div {
      width: 50%;
      }
      label {
      width: 40%;
      }
      input {
      width: 60%;
      }
      select, .children, .gender, .bdate-block {
      width: calc(60% + 16px);
      }
      }
    </style>
</head>

<body>

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

  <main>

  <section id="preview" class="d-flex align-items-center">
          <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            
            
            <h1>Hot Selling Menu</h1>           
            <hr>
            <div class="main-block">
    <form action="updatehotitem.php" method="post">
      <h2 style="color:#111;">Please update the current hot selling items.</h2>
      <fieldset>
        <legend>
          <h3>Menu Details</h3>
        </legend>
        <div  class="account-details">
          <div><label>Hot Menu 1</label>
           <select class="select2 form-control custom-select" name="hotmenu1" id="hotmenu1" style="width: 100%; height:35px;" required>
                    <option value="">SELECT MENU</option>

                    <?php

                      $sqlHM1 = "SELECT * FROM menu  ";
                      $sqlSelect1 = "SELECT menu_id from hotitem where hotitem_id = 1";

                      $qryHM1 = mysqli_query($con, $sqlHM1);
                      $qrySelect1 = mysqli_query($con, $sqlSelect1);

                      $rowHM1 = mysqli_num_rows($qryHM1);

                      if(mysqli_num_rows($qrySelect1)==0){

                              if($rowHM1 > 0 )
                              {
                                    while($rHM1 = mysqli_fetch_assoc($qryHM1))
                                    {
                                            echo'<option value = "'.$rHM1['menu_id'].'">
                                            '.$rHM1['menu_type']." - ".$rHM1['menu_name'].'</option>';

                                  }

                            }
                      }else{

                        $r1 = mysqli_fetch_assoc($qrySelect1);
                        
                            if($rowHM1 > 0 )
                            {
                                  while($rHM1 = mysqli_fetch_assoc($qryHM1))
                                  {
                                      if($r1['menu_id'] == $rHM1['menu_id']){
                                        echo'<option value = "'.$rHM1['menu_id'].'" selected>
                                        '.$rHM1['menu_type']." - ".$rHM1['menu_name'].'</option>';

                                      }
                                      else{
                                        echo'<option value = "'.$rHM1['menu_id'].'">
                                        '.$rHM1['menu_type']." - ".$rHM1['menu_name'].'</option>';

                                      }
                                          

                                }

                          }

                      }

                      

                      ?>



            </select>
          </div>
          <div><label>Hot Menu 2</label>
          <select class="select2 form-control custom-select" name="hotmenu2" id="hotmenu2" style="width: 100%; height:35px;" required>
                    <option value="">SELECT MENU</option>

                    <?php

                      $sqlHM2 = "SELECT * FROM menu  ";
                      $sqlSelect2 = "SELECT menu_id from hotitem where hotitem_id = 2";

                      $qryHM2 = mysqli_query($con, $sqlHM2);
                      $qrySelect2 = mysqli_query($con, $sqlSelect2);

                      $rowHM2 = mysqli_num_rows($qryHM2);

                      if(mysqli_num_rows($qrySelect2)==0){

                              if($rowHM2 > 0 )
                              {
                                    while($rHM2 = mysqli_fetch_assoc($qryHM2))
                                    {
                                            echo'<option value = "'.$rHM2['menu_id'].'">
                                            '.$rHM2['menu_type']." - ".$rHM2['menu_name'].'</option>';

                                  }

                            }
                      }else{

                        $r2 = mysqli_fetch_assoc($qrySelect2);
                        
                            if($rowHM2 > 0 )
                            {
                                  while($rHM2 = mysqli_fetch_assoc($qryHM2))
                                  {
                                      if($r2['menu_id'] == $rHM2['menu_id']){
                                        echo'<option value = "'.$rHM2['menu_id'].'" selected>
                                        '.$rHM2['menu_type']." - ".$rHM2['menu_name'].'</option>';

                                      }
                                      else{
                                        echo'<option value = "'.$rHM2['menu_id'].'">
                                        '.$rHM2['menu_type']." - ".$rHM2['menu_name'].'</option>';

                                      }
                                          

                                }

                          }

                      }

                      

                      ?>



            </select>
          </div>
          <div><label>Hot Menu 3</label>
          <select class="select2 form-control custom-select" name="hotmenu3" id="hotmenu3" style="width: 100%; height:35px;" required>
                    <option value="">SELECT MENU</option>

                    <?php

                            $sqlHM3 = "SELECT * FROM menu  ";
                            $sqlSelect3 = "SELECT menu_id from hotitem where hotitem_id = 3";

                            $qryHM3 = mysqli_query($con, $sqlHM3);
                            $qrySelect3 = mysqli_query($con, $sqlSelect3);

                             $rowHM3 = mysqli_num_rows($qryHM3);

                             if(mysqli_num_rows($qrySelect3)==0){

                                    if($rowHM3 > 0 )
                                    {
                                          while($rHM3 = mysqli_fetch_assoc($qryHM3))
                                          {
                                                  echo'<option value = "'.$rHM3['menu_id'].'">
                                                  '.$rHM3['menu_type']." - ".$rHM3['menu_name'].'</option>';
      
                                        }
      
                                  }
                             }else{

                              $r3 = mysqli_fetch_assoc($qrySelect3);
                               
                                  if($rowHM3 > 0 )
                                  {
                                        while($rHM3 = mysqli_fetch_assoc($qryHM3))
                                        {
                                            if($r3['menu_id'] == $rHM3['menu_id']){
                                              echo'<option value = "'.$rHM3['menu_id'].'" selected>
                                              '.$rHM3['menu_type']." - ".$rHM3['menu_name'].'</option>';

                                            }
                                            else{
                                              echo'<option value = "'.$rHM3['menu_id'].'">
                                              '.$rHM3['menu_type']." - ".$rHM3['menu_name'].'</option>';

                                            }
                                                

                                      }

                                }

                             }

                             

                   ?>



            </select>
          </div>
          <div><label>Hot Menu 4</label>
          <select class="select2 form-control custom-select" name="hotmenu4" id="hotmenu4" style="width: 100%; height:35px;" required>
                    <option value="">SELECT MENU</option>

                    <?php

                            $sqlHM4 = "SELECT * FROM menu  ";
                            $sqlSelect4 = "SELECT menu_id from hotitem where hotitem_id = 4";

                            $qryHM4 = mysqli_query($con, $sqlHM4);
                            $qrySelect4 = mysqli_query($con, $sqlSelect4);

                             $rowHM4 = mysqli_num_rows($qryHM4);

                             if(mysqli_num_rows($qrySelect4)==0){

                                    if($rowHM4 > 0 )
                                    {
                                          while($rHM4 = mysqli_fetch_assoc($qryHM4))
                                          {
                                                  echo'<option value = "'.$rHM4['menu_id'].'">
                                                  '.$rHM4['menu_type']." - ".$rHM4['menu_name'].'</option>';
      
                                        }
      
                                  }
                             }else{

                              $r4 = mysqli_fetch_assoc($qrySelect4);
                               
                                  if($rowHM4 > 0 )
                                  {
                                        while($rHM4 = mysqli_fetch_assoc($qryHM4))
                                        {
                                            if($r4['menu_id'] == $rHM4['menu_id']){
                                              echo'<option value = "'.$rHM4['menu_id'].'" selected>
                                              '.$rHM4['menu_type']." - ".$rHM4['menu_name'].'</option>';

                                            }
                                            else{
                                              echo'<option value = "'.$rHM4['menu_id'].'">
                                              '.$rHM4['menu_type']." - ".$rHM4['menu_name'].'</option>';

                                            }
                                                

                                      }

                                }

                             }

                             

                   ?>



            </select>
          </div>
        </div>
      </fieldset>
    
      <fieldset>
        <legend>
          <h3>Terms and Agreement</h3>
        </legend>
        <div  class="terms-mailing">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" required><span>I'm sure that this detail changes is real and meet the criteria and requirements from Burgerak.</a></span>
          </div>
      </fieldset>
      <button type="submit" name="submit">Submit</button>
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

   
  header("Location: login-admin.html");
  
}?>