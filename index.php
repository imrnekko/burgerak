<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Burgerak - Home</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/burgeraklogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header  id="header" style="height:65px;"  class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light" style="margin-top:0px;"  ><a href="index.php"><span>Burgerak</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block" >
          <ul >
            <li class="active"><a href="#header">Home</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#aboutus">About Us</a></li>
            <li><a href="#contact">Contact</a></li>

            <?php session_start();
             
              include("connection/connection.php");

              if ((isset($_SESSION['userlogged']))&&($_SESSION['role_id']==1)){  ?>
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
                    <p><a href="historyList.php">Previous Order</a></p>
                    <hr>
                    <p><a href="addmenu.php">Add Menu</a></p>
                    <p><a href="foodlist.php">Edit Menu</a></p>
                    <p><a href="hotitem.php">Hot Item</a></p>
                    <hr>
                    <p class="get-started" style="margin:5px;" align="center"><a href="logout.php">Logout</a></p>
                    </div>
                  </div>
                </li>

            <?php  } else if ((isset($_SESSION['userlogged']))&&($_SESSION['role_id']==2))
              { ?>
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
            <?php
              }else{
                ?>
                <li class="get-started"><a href="login-user.html">Login</a></li>
                <?php
              }
              
              ?>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <img alt="Logo" src="assets/img/burgeraklogo.png" width="400" height="400">
      <h1>Bring the enjoyment in your mouth</h1>
      <a href="viewmenu.php" class="btn-get-started scrollto">VIEW MENU</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

 

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="services section-bg">
          <div class="container">
              <h1 align="center" style="font-family:Poppins;font-weight:bold;">HOT SELLING ITEM</h1><br>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

    <?php 
    
    $sqlHotItem1 = "select * from hotitem h join menu m on h.menu_id = m.menu_id where h.hotitem_id = 1";
    $qry1 = mysqli_query($con,$sqlHotItem1);
    
    while($r1 = mysqli_fetch_assoc($qry1)){ ?>
      <div class="item active">
        <img src="assets/img/stagewood.jpg" alt="Los Angeles" style="width:100%;height:90%;">
        <div class="carousel-caption">
        <img src="<?php echo $r1['menu_img']; ?>" class="avatar" style="width:300px;height:300px;" >
        <h1 class="mb-1" style="color:black;font-weight:bold;font-family:Poppins; text-shadow: 2px 2px 5px white;"><?php echo $r1['menu_name']; ?> - RM <?php echo  number_format((float)$r1['menu_price'], 2, '.', ''); ?></h1>
          <h3 class="mb-5" style="color:black;font-weight:bold; text-shadow: 2px 2px 5px white;">
            <a href="menu.php" style="font-family:Poppins;" class="btn btn-danger btn-lg">Order Now</a>
          </h3></div>
      </div><?php } 
      
      $sqlHotItem2 = "select * from hotitem h join menu m on h.menu_id = m.menu_id where h.hotitem_id = 2";
      $qry2 = mysqli_query($con,$sqlHotItem2);


      while($r2 = mysqli_fetch_assoc($qry2)){
      ?>

      <div class="item">
        <img src="assets/img/stagewood.jpg" alt="Chicago" style="width:100%;height:90%;">
        <div class="carousel-caption">
        <img src="<?php echo $r2['menu_img']; ?>" class="avatar" style="width:300px;height:300px;" >
        <h1 class="mb-1" style="color:black;font-weight:bold;font-family:Poppins; text-shadow: 2px 2px 5px white;"><?php echo $r2['menu_name']; ?> - RM <?php echo  number_format((float)$r2['menu_price'], 2, '.', ''); ?></h1>
          <h3 class="mb-5" style="color:black;font-weight:bold; text-shadow: 2px 2px 5px white;">
          <a href="menu.php" style="font-family:Poppins;" class="btn btn-danger btn-lg">Order Now</a>
          </h3></div>
      </div>
      <?php } 

    $sqlHotItem3 = "select * from hotitem h join menu m on h.menu_id = m.menu_id where h.hotitem_id = 3";
    $qry3 = mysqli_query($con,$sqlHotItem3);
    
    while($r3 = mysqli_fetch_assoc($qry3)){
      ?>
      <div class="item">
        <img src="assets/img/stagewood.jpg" alt="New york" style="width:100%;height:90%;">
        <div class="carousel-caption">
        <img src="<?php echo $r3['menu_img']; ?>" class="avatar" style="width:300px;height:300px;"  >
        <h1 class="mb-1" style="color:black;font-weight:bold;font-family:Poppins; text-shadow: 2px 2px 5px white;"><?php echo $r3['menu_name']; ?> - RM <?php echo  number_format((float)$r3['menu_price'], 2, '.', ''); ?></h1>
          <h3 class="mb-5" style="color:black;font-weight:bold; text-shadow: 2px 2px 5px white;">
          <a href="menu.php" style="font-family:Poppins;" class="btn btn-danger btn-lg">Order Now</a>
          </h3></div>
      </div><?php } 

      $sqlHotItem4 = "select * from hotitem h join menu m on h.menu_id = m.menu_id where h.hotitem_id = 4";
      $qry4 = mysqli_query($con,$sqlHotItem4);

      while($r4 = mysqli_fetch_assoc($qry4)){
        ?>

      <div class="item">
        <img src="assets/img/stagewood.jpg" alt="New york" style="width:100%;height:90%;">
        <div class="carousel-caption">
        <img src="<?php echo $r4['menu_img']; ?>" class="avatar" style="width:300px;height:300px;"  >
        <h1 class="mb-1" style="color:black;font-weight:bold;font-family:Poppins; text-shadow: 2px 2px 5px white;"><?php echo $r4['menu_name']; ?> - RM <?php echo  number_format((float)$r4['menu_price'], 2, '.', ''); ?></h1>
          <h3 class="mb-5" style="color:black;font-weight:bold; text-shadow: 2px 2px 5px white;">
          <a href="menu.php" style="font-family:Poppins;" class="btn btn-danger btn-lg">Order Now</a>
          </h3></div>
      </div><?php } ?>


    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    
          </div>
        </section><!-- End Menu Section -->

    <!-- ======= About Us Section ======= -->
    <section id="aboutus" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <h2>About us</h2>
            <h3>"Bring the enjoyment in your mouth"</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <p>Vision: To be the best local fast-food restaurant in Malaysia.</p><br>
            <p>Mission: Bring high-quality food and offer reasonable price, in an attractive way.
            </p><br>
            <p>Objectives : </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Being a socially responsible company</li>
              <li><i class="ri-check-double-line"></i> Provide the best service to customers</li>
              <li><i class="ri-check-double-line"></i> Provide the high-quality online business platform</li>
              <li><i class="ri-check-double-line"></i> Bring fun and comfortable environment.</li>
            </ul>
           
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="aboutus" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">12</span><br>
            <p>Hours Operation</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">21</span><br>
            <p>Menu Provided</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">10</span>am
            <p>Open Time</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">10</span>pm
            <p>Closed Time</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

 

    <!-- ======= Cta Section ======= -->
    <section id="aboutus" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
          <h3>Send Us Feedback</h3>
          <p> Please send you feedback to us so we can make an improvement for our customers satisfaction.</p>
          <a class="cta-btn" href="mailto:burgerak@gmail.com">SEND FEEDBACK</a>
        </div>

      </div>
    </section><!-- End Cta Section -->



  
    <!-- ======= Testimonials Section ======= -->
    <section id="aboutus" class="testimonials section-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Testimonials</h2>
              <p>Some good review and feedback from our beloved Burgerak customers.</p>
            </div>
          </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <div class="owl-carousel testimonials-carousel">

              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Aroma yang rangup dan mengasyikkan, daging yang empuk dan lazat, keseleraan yang tiada tandingan.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Customer</h4>
              </div>

              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  ハンバーガーは本当に美味しいです。 スゴイ!!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sakuragi Hanamichi</h3>
                <h4>Customer</h4>
              </div>

              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  It’s a great experience. The ambiance is very welcoming and charming. Amazing wines, food and service. Staff are extremely knowledgeable and make great recommendations.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Customer</h4>
              </div>

              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  This cozy restaurant has left the best impressions! Hospitable hosts, delicious dishes, beautiful presentation, wide wine list and wonderful dessert. I recommend to everyone! I would like to come back here again and again.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Customer</h4>
              </div>

              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Excellent food. Menu is extensive and seasonal to a particularly high standard. Definitely fine dining. It can be expensive but worth it and they do different deals on different nights so it’s worth checking them out before you book. Highly recommended.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Customer</h4>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

 

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
              <h2>Contact</h2>
            
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2111.869598834832!2d102.44264960523536!3d2.273046204192203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1dd640863cf33%3A0x7b308e5c7fd1b42a!2sTaman%20Lipat%20Kajang%20Perdana%2C%20Kampung%20Lipat%20Kajang%2C%2077000%20Jasin%2C%20Melaka!5e0!3m2!1sen!2smy!4v1606797739551!5m2!1sen!2smy" frameborder="0" allowfullscreen></iframe>
            <div class="info mt-4">
              <i class="icofont-google-map"></i>
              <h4>Location:</h4>
              <p> JC2043 Jalan LKP 5, Taman Lipat Kajang Perdana, 77000 Jasin, Melaka</p>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="info">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>burgerak@gmail.com</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info w-100 mt-4">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>+6018-318 1059
                  </p>
                </div>
              </div>
            </div>

            
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
            <h3>Burgerak Sdn Bhd</h3>
            <p>
              JC2043 Jalan LKP 5 <br>
              Taman Lipat Kajang Perdana<br>
              77000 Jasin <br>Melaka<br>
              <strong>Phone:</strong> +6018-318 1059<br>
              <strong>Email:</strong> burgerak@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#header">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#menu">Menu</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#aboutus">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
          
            </ul>
          </div>

        


        </div>
      </div>
    </div>

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
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-e89c34cb-d886-4790-9cb5-33875dc311f6"></div>
  <!-- JS -->
  <script type="text/javascript">
    
    function showNav()
    {
      document.getElementById("userNav").showModal();
    }
  </script>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
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