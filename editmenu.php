<?php session_start();

include("connection/connection.php");



if($_SESSION['userlogged']==1 && $_SESSION['role_id']==1)
{

if(isset($_GET['menuid']))
{
    $sqlFilter = "SELECT * from menu where menu_id = '".$_GET['menuid']."' ";
    $qryFilter = mysqli_query($con, $sqlFilter);

    $dataMenu = mysqli_fetch_assoc($qryFilter);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Burgerak - Edit Menu</title>
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
            
            
            <h1>Edit Menu</h1>           
            <hr>
            <div class="main-block">
    <form action="updatemenu.php" method="post"  enctype="multipart/form-data">
    <h2 style="color:#111;">Update the details.</h2>
      <fieldset>
        <legend>
          <h3>Menu Details</h3>
        </legend>
        <div  class="account-details">
          <div><label>Menu Name</label><input type="text" name="menuname" value="<?php echo $dataMenu['menu_name']?>" required>
                                        <input type="hidden" name="menuid" value="<?php echo $dataMenu['menu_id']?>" required></div>
          <div><label>Menu Price</label><input type="text" pattern="[0-9.]*"value="<?php echo $dataMenu['menu_price']?>"  name="price" required></div>
          <div><label>Image Link</label><input type="file" name="image" value="<?php echo $dataMenu['menu_img']?>" required></div>
          <div>
              <label>Food Category</label>
              <div class="gender">

              <?php if($dataMenu['menu_type'] == 'BU'){ ?>
                <label for="burger" class="radio">Burger</label>
                <input type="radio" value="BU" id="burger" name="category" checked required/><br>
                <label for="drinks" class="radio">Drinks</label>
                <input type="radio" value="DR" id="drinks" name="category"/><br>
                <label for="sidedish" class="radio">Side Dish</label>
                <input type="radio" value="SD" id="sidedish" name="category"/><br>
                <label for="burger" class="radio">Smoothies</label>
                <input type="radio" value="SM" id="smoothies" name="category"/><br>
                <label for="drinks" class="radio">Desserts</label>
                <input type="radio" value="DE" id="desserts" name="category"/><br>
        <?php  }else if($dataMenu['menu_type'] == 'DR'){ ?>
                <label for="burger" class="radio">Burger</label>
                <input type="radio" value="BU" id="burger" name="category"/><br>
                <label for="drinks" class="radio">Drinks</label>
                <input type="radio" value="DR" id="drinks" name="category" checked /><br>
                <label for="sidedish" class="radio">Side Dish</label>
                <input type="radio" value="SD" id="sidedish" name="category" /><br>
                <label for="burger" class="radio">Smoothies</label>
                <input type="radio" value="SM" id="smoothies" name="category"/><br>
                <label for="drinks" class="radio">Desserts</label>
                <input type="radio" value="DE" id="desserts" name="category"/><br>
        <?php  }else if($dataMenu['menu_type'] == 'SD'){ ?>
                <label for="burger" class="radio">Burger</label>
                <input type="radio" value="BU" id="burger" name="category"/><br>
                <label for="drinks" class="radio">Drinks</label>
                <input type="radio" value="DR" id="drinks" name="category"/><br>
                <label for="sidedish" class="radio">Side Dish</label>
                <input type="radio" value="SD" id="sidedish" name="category" checked/><br>
                <label for="burger" class="radio">Smoothies</label>
                <input type="radio" value="SM" id="smoothies" name="category" /><br>
                <label for="drinks" class="radio">Desserts</label>
                <input type="radio" value="DE" id="desserts" name="category" /><br>
        <?php  }else if($dataMenu['menu_type'] == 'SM'){ ?>
                <label for="burger" class="radio">Burger</label>
                <input type="radio" value="BU" id="burger" name="category"/><br>
                <label for="drinks" class="radio">Drinks</label>
                <input type="radio" value="DR" id="drinks" name="category"/><br>
                <label for="sidedish" class="radio">Side Dish</label>
                <input type="radio" value="SD" id="sidedish" name="category" /><br>
                <label for="burger" class="radio">Smoothies</label>
                <input type="radio" value="SM" id="smoothies" name="category" checked /><br>
                <label for="drinks" class="radio">Desserts</label>
                <input type="radio" value="DE" id="desserts" name="category"/><br>
        <?php  }else if($dataMenu['menu_type'] == 'DS'){ ?>
                <label for="burger" class="radio">Burger</label>
                <input type="radio" value="BU" id="burger" name="category"/><br>
                <label for="drinks" class="radio">Drinks</label>
                <input type="radio" value="DR" id="drinks" name="category" /><br>
                <label for="sidedish" class="radio">Side Dish</label>
                <input type="radio" value="SD" id="sidedish" name="category"/><br>
                <label for="burger" class="radio">Smoothies</label>
                <input type="radio" value="SM" id="smoothies" name="category" /><br>
                <label for="drinks" class="radio">Desserts</label>
                <input type="radio" value="DE" id="desserts" name="category" checked /><br>
        <?php  } ?>
                
              </div>
          </div>
        </div>
        <div  class="account-details">
                  <div><label>Menu Description</label><textarea id="descr" name="descr" rows="4" cols="45"><?php echo $dataMenu['menu_desc']?></textarea></div>
                  
                
                  
                  
                  </div>
      </fieldset>
          <hr>
      <fieldset>
        <legend>
          <h3>Terms and Agreement</h3>
        </legend>
        <div  class="terms-mailing">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" required><span>I'm sure that this detail changes is real and meet the criteria and requirements from Burgerak.</a></span>
          </div>
      </fieldset>
      <button type="submit" name="update">Submit</button>
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

   
  header("Location: foodlist.php");
  
}

}else{

   
  header("Location: login-admin.html");
  
}?>