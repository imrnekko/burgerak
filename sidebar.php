<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title></title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Custom CSS -->
<link href="sidebarcss.css" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
   <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <![endif]-->

<script type="text/javascript">
    var map;
        function initialize(){
            google.maps.visualRefresh = true;

          var  initial =  new google.maps.LatLng(35, -105);
            map   = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 5,
                center: initial,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl:false,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE
                },
                scaleControl: false,
                rotateControl:false,
                panControl:false

            });

        }
        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
<style>
html, body {
	height: 100%;
	margin: 0px;
	padding: 0px;
}
/*!
 * Start Bootstrap - Simple Sidebar HTML Template (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

/* Toggle Styles */

#wrapper {
	padding-left: 0;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}
#wrapper.toggled {
	padding-left: 250px;
}
#sidebar-wrapper {
	z-index: 1000;
	position: fixed;
	left: 0px;
	width: 0;
	height: 100%;
	overflow-y: auto;
	background: #000;
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}
#wrapper.toggled #sidebar-wrapper {
	width: 250px;
}
#page-content-wrapper {
	width: 100%;
	padding: 15px;
}
#wrapper.toggled #page-content-wrapper {
	position: absolute;
}
/* Sidebar Styles */

.sidebar-nav {
	position: absolute;
	top: 0;
	width: 250px;
	margin: 0;
	padding: 0;
	list-style: none;
}
.sidebar-nav li {
	text-indent: 20px;
	line-height: 40px;
}
.sidebar-nav li a {
	display: block;
	text-decoration: none;
	color: #999999;
}
.sidebar-nav li a:hover {
	text-decoration: none;
	color: #fff;
	background: rgba(255,255,255,0.2);
}
.sidebar-nav li a:active, .sidebar-nav li a:focus {
	text-decoration: none;
}
.sidebar-nav > .sidebar-brand {
	height: 65px;
	font-size: 18px;
	line-height: 60px;
}
.sidebar-nav > .sidebar-brand a {
	color: #999999;
}
.sidebar-nav > .sidebar-brand a:hover {
	color: #fff;
	background: none;
}
 @media(min-width:768px) {
#wrapper {
	padding-left: 250px;
}
#wrapper.toggled {
	padding-left: 0;
}
#sidebar-wrapper {
	width: 250px;
}
#wrapper.toggled #sidebar-wrapper {
	width: 0;
}
#page-content-wrapper {
	padding: 20px;
}
#wrapper.toggled #page-content-wrapper {
	position: relative;
	margin-right: 0;
}
}
</style>
</head>

<body >
<div id="wrapper" class="toggled">
		
		<!-- Sidebar -->
		<div id="sidebar-wrapper"> </div>
		<!-- /#sidebar-wrapper -->
		
		<!-- Page Content -->
		<div id="page-content-wrapper">
				<div class="container-fluid">
						<div class="row">
								<div class="col-lg-12">
										<div id="map_canvas" style="height:600px; width: 100%;"></div>
										<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a> </div>
						</div>
				</div>
		</div>
		<!-- /#page-content-wrapper -->
		
</div>
<!-- /#wrapper -->

<script src="bootstrap.min.js"></script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>
