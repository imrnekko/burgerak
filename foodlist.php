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

  <title>Burgerak - Menu List</title>
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
         

      <!-- ======= Portfolio Section ======= -->
      <section class="portfolio" style="width:100%;margin-left:0;">

  
        <div class="container">
          <hr>
          <center>
          <div class="section-title" data-aos="fade-down" data-aos-delay="100">
            <h2>LIST OF MENU</h2>
            <p>Here are the list of menu offered by Burgerak.</p>
          </div>
          </center>

          <div class="row" data-aos="fade-down" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active" >All</li>
                <li data-filter=".filter-burger" href="#burger">Burger</li>
                <li data-filter=".filter-drinks" href="#drinks">Drinks</li>
                <li data-filter=".filter-sidedish" href="#sidedish">Side Dish</li>
                <li data-filter=".filter-smoothie" href="#smoothie">Smoothie</li>
                <li data-filter=".filter-desserts" href="#desserts">Desserts</li>
              </ul>
            </div>
          </div>

          <div class="row portfolio-container" data-aos="fade-down" data-aos-delay="100">

          <?php 
      
          $index=0;

          $sqlMenuB="SELECT * FROM menu where menu_type = 'BU'";
          $qryMenuB = mysqli_query($con,$sqlMenuB);
          $rowMenuB=mysqli_num_rows($qryMenuB);

            if($rowMenuB>0){
              
                
                  while($dataB = mysqli_fetch_assoc($qryMenuB))
                  { ?>
                                                  
                      <div class="col-lg-4 col-md-6 portfolio-item filter-burger">
                        <div class="portfolio-wrap">
                          <img src="<?php echo $dataB['menu_img'];?>" class="img-fluid" alt="">
                          <div class="portfolio-info">
                          <input id="selectID<?php echo $index; ?>" type="hidden" value="<?php echo $dataB['menu_id']; ?>">
                          <input id="selectImg<?php echo $index; ?>" type="hidden" value="<?php echo $dataB['menu_img']; ?>">
                          <h4><p id="selectMenu<?php echo $index; ?>" value="<?php echo $dataB['menu_name']; ?>"><?php echo $dataB['menu_name']; ?></p></h4>
                          <p id="selectPrice<?php echo $index; ?>" value="<?php echo number_format((float)$dataB['menu_price'], 2, '.', ''); ?>">RM <?php echo number_format((float)$dataB['menu_price'], 2, '.', ''); ?></p>                            <div class="portfolio-links">
                          <a href="deletemenu.php?menuid=<?php echo $dataB['menu_id']; ?>"><button>DELETE</button></a>  
                              <a href="editmenu.php?menuid=<?php echo $dataB['menu_id']; ?>"><button>EDIT</button></a>          
                                                
                              </div>
                          </div>
                        </div>
                      </div>

            <?php $index++;} }
            
            $sqlMenuD="SELECT * FROM menu where menu_type = 'DR'";
            $qryMenuD = mysqli_query($con,$sqlMenuD);
            $rowMenuD=mysqli_num_rows($qryMenuD);
        
              if($rowMenuD>0){
                
    
                    while($dataD = mysqli_fetch_assoc($qryMenuD))
                    {  ?>

                      <div class="col-lg-4 col-md-6 portfolio-item filter-drinks">
                        <div class="portfolio-wrap">
                          <img src="<?php echo $dataD['menu_img']; ?>" class="img-fluid" alt="">
                          <div class="portfolio-info">
                            <input id="selectID<?php echo $index; ?>" type="hidden" value="<?php echo $dataD['menu_id']; ?>">
                            <input id="selectImg<?php echo $index; ?>" type="hidden" value="<?php echo $dataD['menu_img']; ?>">
                            <h4><p id="selectMenu<?php echo $index; ?>" value="<?php echo $dataD['menu_name']; ?>"><?php echo $dataD['menu_name']; ?></p></h4>
                            <p id="selectPrice<?php echo $index; ?>" value="<?php echo number_format((float)$dataD['menu_price'], 2, '.', ''); ?>">RM <?php echo number_format((float)$dataD['menu_price'], 2, '.', ''); ?></p>                            <div class="portfolio-links">
                            <a href="deletemenu.php?menuid=<?php echo $dataD['menu_id']; ?>"><button>DELETE</button></a>                                
                            <a href="editmenu.php?menuid=<?php echo $dataD['menu_id']; ?>"><button>EDIT</button></a>
                            </div>
                          </div>
                        </div>
                      </div>

            <?php $index++;} } 
            
              $sqlMenuS="SELECT * FROM menu where menu_type = 'SD'";
              $qryMenuS = mysqli_query($con,$sqlMenuS);
              $rowMenuS=mysqli_num_rows($qryMenuS);
            
            
              if($rowMenuS>0){
                
    
                while($dataS = mysqli_fetch_assoc($qryMenuS))
                { ?>

                      <div class="col-lg-4 col-md-6 portfolio-item filter-sidedish">
                        <div class="portfolio-wrap">
                          <img src="<?php echo $dataS['menu_img']; ?>" class="img-fluid" alt="">
                          <div class="portfolio-info">
                            <input id="selectID<?php echo $index; ?>" type="hidden" value="<?php echo $dataS['menu_id']; ?>">
                            <input id="selectImg<?php echo $index; ?>" type="hidden" value="<?php echo $dataS['menu_img']; ?>">
                            <h4><p id="selectMenu<?php echo $index; ?>" value="<?php echo $dataS['menu_name']; ?>"><?php echo $dataS['menu_name']; ?></p></h4>
                            <p id="selectPrice<?php echo $index; ?>" value="<?php echo number_format((float)$dataS['menu_price'], 2, '.', ''); ?>">RM <?php echo number_format((float)$dataS['menu_price'], 2, '.', ''); ?></p>
                            <div class="portfolio-links">
                            <a href="deletemenu.php?menuid=<?php echo $dataS['menu_id']; ?>"><button>DELETE</button></a>  
                              <a href="editmenu.php?menuid=<?php echo $dataS['menu_id']; ?>"><button>EDIT</button></a>                           
                              </div>
                          </div>
                        </div>
                      </div>

            <?php $index++;} } 
            
            $sqlMenuSM="SELECT * FROM menu where menu_type = 'SM'";
            $qryMenuSM = mysqli_query($con,$sqlMenuSM);
            $rowMenuSM=mysqli_num_rows($qryMenuSM);
          
          
            if($rowMenuSM>0){
              
  
              while($dataSM = mysqli_fetch_assoc($qryMenuSM))
              { ?>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-smoothie">
                      <div class="portfolio-wrap">
                        <img src="<?php echo $dataSM['menu_img']; ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                          <input id="selectID<?php echo $index; ?>" type="hidden" value="<?php echo $dataSM['menu_id']; ?>">
                          <input id="selectImg<?php echo $index; ?>" type="hidden" value="<?php echo $dataSM['menu_img']; ?>">
                          <h4><p id="selectMenu<?php echo $index; ?>" value="<?php echo $dataSM['menu_name']; ?>"><?php echo $dataSM['menu_name']; ?></p></h4>
                          <p id="selectPrice<?php echo $index; ?>" value="<?php echo number_format((float)$dataSM['menu_price'], 2, '.', ''); ?>">RM <?php echo number_format((float)$dataSM['menu_price'], 2, '.', ''); ?></p>
                          <div class="portfolio-links">
                          <a href="deletemenu.php?menuid=<?php echo $dataSM['menu_id']; ?>"><button>DELETE</button></a>  
                            <a href="editmenu.php?menuid=<?php echo $dataSM['menu_id']; ?>"><button>EDIT</button></a>                           
                            </div>
                        </div>
                      </div>
                    </div>

                    <?php $index++;} } 
            
            $sqlMenuDS="SELECT * FROM menu where menu_type = 'DS'";
            $qryMenuDS = mysqli_query($con,$sqlMenuDS);
            $rowMenuDS=mysqli_num_rows($qryMenuDS);
          
          
            if($rowMenuDS>0){
              
  
              while($dataDS = mysqli_fetch_assoc($qryMenuDS))
              { ?>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-desserts">
                      <div class="portfolio-wrap">
                        <img src="<?php echo $dataDS['menu_img']; ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                          <input id="selectID<?php echo $index; ?>" type="hidden" value="<?php echo $dataDS['menu_id']; ?>">
                          <input id="selectImg<?php echo $index; ?>" type="hidden" value="<?php echo $dataDS['menu_img']; ?>">
                          <h4><p id="selectMenu<?php echo $index; ?>" value="<?php echo $dataDS['menu_name']; ?>"><?php echo $dataDS['menu_name']; ?></p></h4>
                          <p id="selectPrice<?php echo $index; ?>" value="<?php echo number_format((float)$dataDS['menu_price'], 2, '.', ''); ?>">RM <?php echo number_format((float)$dataDS['menu_price'], 2, '.', ''); ?></p>
                          <div class="portfolio-links">
                          <a href="deletemenu.php?menuid=<?php echo $dataDS['menu_id']; ?>"><button>DELETE</button></a>  
                            <a href="editmenu.php?menuid=<?php echo $dataDS['menu_id']; ?>"><button>EDIT</button></a>                           
                            </div>
                        </div>
                      </div>
                    </div>

          <?php $index++;} } ?>



          </div>

        </div>
      </section><!-- End Portfolio Section -->

      <div class="modal fade" id="addtocart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add item to cart</h4>
                    <button type="button"  class="close" id="closemodal1" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mx-3">
                  <form action="" method="post" style="color:black;width:700px;">
                    <center>
                    <div class="md-form mb-5">
                      <div class="portfolio-wrap">
                          <img id="pasteImg" src="" class="img-fluid" alt="" width="200" height="200"></img>
                          <div class="portfolio-info">
                          <input type="hidden" name="menuid" id="pasteID"  required><br>
                            <p id="pasteMenu"></p>
                            <p id="pastePrice"></p>
                            <div class="portfolio-links">

                          </div>
                        </div>

                      <label for="itemqty">Quantity : </label>
                      <input type="number" placeholder="Qty" name="itemqty" id="itemqty" min="0" max="99" maxlength="2"required><br>
                      <hr>
                      <label for="itemqty">Description (Optional): </label><br>
                      <textarea  placeholder="Description (Optional)" name="itemdesc" id="itemdesc"  rows="4" cols="50" ></textarea><br>
                    </div>
                    
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <a href="javascript:void(0);" class="add_button" title="Add Item" id="btnAdd"><img src="assets/img/addbutton.png" style="height:38px;width:65px"/></a>
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

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- JS Section -->
  <script type="text/javascript">

    var subtotal = 0.00;
    var total = 0.00;
    const sstrate = 0.06;

        function copyMenu(clicked_id) {

            
              var value = (clicked_id);
              

              var selectID = "selectID"+ value;
              var selectMenu = "selectMenu"+ value;
              var selectPrice = "selectPrice"+value;
              var selectImg = "selectImg"+value;
              
              document.getElementById("pasteID").value = document.getElementById(selectID).value;
              document.getElementById("pasteMenu").innerHTML = document.getElementById(selectMenu).innerHTML;
              document.getElementById("pastePrice").innerHTML = document.getElementById(selectPrice).innerHTML;
              document.getElementById("pasteImg").src = document.getElementById(selectImg).value;

              $(document).ready(function(){

              var maxField = 1; //Input fields increment limitation
              var x = 0;

              var menuid = document.getElementById("pasteID").innerHTML;
              var menu = document.getElementById("pasteMenu").innerHTML;
              var price = document.getElementById("pastePrice").innerHTML;
              var addButton = $('.add_button');
              var wrapper = $('.field_wrapper');
            
              $('#closemodal1').click(function() {
                $('#addtocart').modal('hide');
                document.getElementById("itemqty").value = "";
                document.getElementById("itemdesc").value = "";
     
              });
              $('#closemodal2').click(function() {
                $('#addtocart').modal('hide');
                document.getElementById("itemqty").value = "";
                document.getElementById("itemdesc").value = "";
              });

              $(addButton).click(function(){

                if(x < maxField){
                    menuid = document.getElementById("pasteID").value;
                    menu = document.getElementById("pasteMenu").innerHTML;
                    price = document.getElementById("pastePrice").innerHTML;
                    var qty = document.getElementById("itemqty").value;
                    var desc = document.getElementById("itemdesc").value;
                    var sumprice = qty * price.substr(3, 3);

                    if(qty > 0)
                    {
                        var fieldHTML = '<div class="row" style="margin-bottom:5px;margin-right:0px;"><tr><td>'+ '\xa0\xa0' +  menu +'</td><td>'+'\xa0\xa0' + '/'+'\xa0\xa0' + qty +'\xa0\xa0' + '/'+'\xa0\xa0' + '</td><td> RM'+ (sumprice.toFixed(2)) +'</td><td>'+'\xa0\xa0' +'<a href="javascript:void(0);" style="padding-left:0;padding-top:0;"class="remove_button" id="removelist"><img src="assets/img/removebutton.png" style="height:20px;width:20px"/></a></td></tr><input type="hidden" name="menuid[]" value="'+menuid+'"/><input type="hidden" name="qty[]" value="'+  qty +'" /><input type="hidden" name="desc[]" value="'+  desc +'" /></div>';
                       
                        $(wrapper).append(fieldHTML);
                        subtotal += sumprice;
                 
                        x++;
                        $('#addtocart').modal('hide');
               
                        document.getElementById("itemqty").value = "";
                        document.getElementById("itemdesc").value = "";
                    }
                }
               
              });

              $(wrapper).on('click', '.remove_button', function(e){
                     e.preventDefault();
                     $(this).parent('div').remove();
              });

              }); 
            
            
                        
              


        }

        function checkout(){

          total = (subtotal*sstrate)+subtotal;
          var r = confirm("Are you sure?\nSubtotal Price: RM "+subtotal+"\nTotal Price: RM "+total);

          if (r == true) {
            header("Location: neworder.php");
          }
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
<?php



}else if($_SESSION['userlogged']==1 && $_SESSION['role_id']==1)
{
  header("Location: index.php");
}
else{

   
  header("Location: login-user.html");
  
}?>