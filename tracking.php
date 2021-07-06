<?php


include_once("assets/Crud.php");

$crud = new Crud();

$track = $_GET['trackno'];

$result = $crud->execute("SELECT * FROM orders WHERE order_id = '$track'");

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $track_id = $row['order_id'];
        $desc = $row['description'];
        $height = $row['height'];
        $width = $row['width'];
        $depth = $row['depth'];
        $weight = $row['weight'];
        $order_date = date("M j, Y",strtotime($row['created_at']));
        $package = $row['package'];
        $pickup = $row['pickup'];
        $destination = $row['destination'];
        $originLat = $row['pickup_lat'];
        $originLng = $row['pickup_lng'];
        $start = $originLat.','.$originLng;
        $detLat = $row['destination_lat'];
        $detLng = $row['destination_lng'];
        $end = $detLat.','.$detLng; 

        if($package == 'cost') $package = 'Basic';
        else if($package == 'cost + 25') $package = 'Standard Delivery';
        else $package = 'Premium Delivery';
    }
}


?>

<!DOCTYPE html>
<html>
    

<head>
<title>GO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Css -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-3.3.6/css/bootstrap.min.css">        
        <!-- Bootstrap Select Css -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css">
        <!-- Fonts Css -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/plugins/font-elegant/elegant.css">
        <!-- OwlCarousel2 Slider Css -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/owl.carousel.2/assets/owl.carousel.css">


        <!-- Animate Css -->       
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

        <!-- Main Css -->
        <link rel="stylesheet" type="text/css" href="assets/css/theme.css">

     
        <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.js"></script>
        <![endif]-->
    </head>
    <body id="home">

        <!-- Main Wrapper -->        
        <main class="wrapper">

            <!-- Header -->
            <header class="header-main">

                <!-- Header Topbar -->
                <div class="top-bar font2-title1 white-clr">
                    <div class="theme-container container">
                        <div class="row">
                            <div class="col-md-6 col-sm-5">
                                <ul class="list-items fs-10">
                                    <li><a href="#">sitemap</a></li>
                                    <li class="active"><a href="#">Privacy</a></li>
                                    <li><a href="#">Pricing</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-7 fs-12">
                                <p class="contact-num">  <i class="fa fa-phone"></i> Call us now: <span class="theme-clr"> +880-1756-390-370 </span> </p>
                            </div>
                        </div>
                    </div>
                    <a data-toggle="modal" href="#login-popup" class="sign-in fs-12 theme-clr-bg"> sign in </a>
                </div>
                <!-- /.Header Topbar -->

                <!-- Header Logo & Navigation -->
                <nav class="menu-bar font2-title1">
                    <div class="theme-container container">
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-logo" href="#"> <img src="assets/img/logo/logo-black.png" alt="logo" /> </a>
                            </div>
                            <div class="col-md-10 col-sm-10 fs-12">
                                <div id="navbar" class="collapse navbar-collapse no-pad">
                                <ul class="navbar-nav theme-menu"> 
                                        <li class="dropdown active">
                                            <a href="."  role="button">Home </a>
                                        </li>
                                        <li> <a href=".#about">About</a> </li>
                                        <li> <a href=".#cost"> Cost Estimation </a> </li>
                                        <li> <a href=".#pricing"> Pricing </a> </li>
                                        <li> <a data-toggle="modal" href="#login-popup" >Login </a> </li>
                                        <li> <a href=".#contact">Contact </a> </li>
                                         
                                
                                    </ul>                                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- /.Header Logo & Navigation -->

            </header>
            <!-- /.Header -->

            <!-- Content Wrapper -->
            <article> 
                <!-- Breadcrumb -->
                <section class="theme-breadcrumb pad-50">                
                    <div class="theme-container container ">  
                        <div class="row">
                            <div class="col-sm-8 pull-left">
                                <div class="title-wrap">
                                    <h2 class="section-title no-margin"> product tracking </h2>
                                    <p class="fs-16 no-margin"> Track your product & see the current condition </p>
                                </div>
                            </div>
                            <div class="col-sm-4">                        
                                <ol class="breadcrumb-menubar list-inline">
                                    <li><a href="#" class="gray-clr">Home</a></li>                                   
                                    <li class="active">Track</li>
                                </ol>
                            </div>  
                        </div>
                    </div>
                </section>
                <!-- /.Breadcrumb -->

                <!-- Tracking -->
                <section class="pt-50 pb-120 tracking-wrap">    
                    <div class="theme-container container ">  
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                
                        
                        ?>
                   
                        <div class="row">
                            <div class="col-md-7 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s"> 
                                <img alt="" src="assets/img/package.jpeg" />
                            </div>
                            <div class="col-md-5 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s"> 
                                <div class="prod-info white-clr">
                                    <ul>
                                    <li> <span class="title-2">Tracking ID:</span> <span class="fs-16"><?php echo $track_id ?></span> </li>
                                    <li> <span class="title-2">Item Description:</span> <span class="fs-16"><?php echo $desc ?></span> </li>
                                        <li> <span class="title-2">Height:</span> <span class="fs-16"><?php echo $height ?></span> </li>
                                        <li> <span class="title-2">Width:</span> <span class="fs-16"><?php echo $width ?></span> </li>
                                        <li> <span class="title-2">Depth:</span> <span class="fs-16"><?php echo $depth ?></span> </li>
                                        <li> <span class="title-2">Weight (kg):</span> <span class="fs-16"><?php echo $weight ?></span> </li>
                                        <li> <span class="title-2">Order date:</span> <span class="fs-16"><?php echo $order_date ?></span> </li>
                                        <li> <span class="title-2">order status:</span> <span class="fs-16 theme-clr">In Progress</span> </li>
                                        <li> <span class="title-2">order type:</span> <span class="fs-16"><?php echo $package ?></span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="progress-wrap">
                            <div class="progress-status">
                                <span class="border-left"></span>
                                <span class="border-right"></span>
                                <span class="dot dot-left wow fadeIn" data-wow-offset="50" data-wow-delay=".40s"></span>
                                <span class="themeclr-border wow fadeIn" data-wow-offset="50" data-wow-delay=".50s">  <span class="dot dot-center theme-clr-bg"></span> </span>
                                <span class="dot dot-right wow fadeIn" data-wow-offset="50" data-wow-delay=".60s"></span>
                            </div>
                            <div class="row progress-content upper-text">
                                <div class="col-md-3 col-xs-8 col-sm-2">
                                    <p class="fs-12 no-margin"> FROM </p>
                                    <h2 class="title-1 no-margin"><?php echo $pickup ?></h2>
                                </div>
                                <div class="col-md-7 col-xs-8 col-sm-8 text-center">
                                    <p class="fs-12 no-margin"> Estimated Duration </p>
                                    <h2 class="title-1 no-margin" id="duration"> </h2>
                                </div>
                              
                                <div class="col-md-2 col-xs-8 col-sm-2 text-right">
                                    <p class="fs-12 no-margin"> to </p>
                                    <h2 class="title-1 no-margin"><?php echo $destination ?></h2>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div id="map"></div>

                        <?php 
                        }
                        else {

                            echo "<h2 style='text-align: center'>Tracking ID not found</h4>";
                        }
                        ?>

                    </div>
                </section>
                <!-- /.Tracking -->

            </article>
            <!-- /.Content Wrapper -->

            <!-- Footer -->
            <footer>
                <div class="footer-main pad-120 white-clr">
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <a href="#"> <img class="logo" alt="#" src="assets/img/logo/logo-white.png" />  </a>
                            </div>
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900">quick links</h2>
                                <ul>
                                    <li> <a href="#">sitemap</a> </li>
                                    <li> <a href="#">pricing</a> </li>
                                    <li> <a href="#">payment method</a> </li>
                                    <li> <a href="#">support</a> </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900">important links</h2>
                                <ul>
                                    <li> <a href="#">Privacy</a> </li>
                                    <li> <a href="#">Support</a> </li>
                                    <li> <a href="#">Policy</a> </li>
                                    <li> <a href="#">Chat</a> </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900">get in touch</h2>
                                <ul class="social-icons list-inline">
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"> <a href="#" class="fa fa-facebook"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"> <a href="#" class="fa fa-twitter"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".30s"> <a href="#" class="fa fa-google-plus"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"> <a href="#" class="fa fa-linkedin"></a> </li>
                                </ul>
                                <ul class="payment-icons list-inline">
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"> <a href="#"> <img alt="#" src="assets/img/icons/payment-1.png" /> </a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"> <a href="#"> <img alt="#" src="assets/img/icons/payment-2.png" /> </a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".30s"> <a href="#"> <img alt="#" src="assets/img/icons/payment-3.png" /> </a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"> <a href="#"> <img alt="#" src="assets/img/icons/payment-4.png" /> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <p> © Copyright 2021, All rights reserved </p>                            
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <p> &nbsp; </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /.Footer -->


        </main>
        <!-- / Main Wrapper -->

        <!-- Top -->
        <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div>

        <!-- Popup: Login -->
        <div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">                
                <a class="close close-btn" data-dismiss="modal" aria-label="Close"> x </a>

                <div class="modal-content">   
                    <div class="login-wrap text-center">                        
                        <h2 class="title-3"> sign in </h2>
                        <p> Sign in to <strong> GO </strong> for getting all details </p>                        

                        <div class="login-form clrbg-before">
                            <form class="login">
                                <div class="form-group"><input type="text" placeholder="Email address" class="form-control"></div>
                                <div class="form-group"><input type="password" placeholder="Password" class="form-control"></div>
                                <div class="form-group">
                                    <button class="btn-1 " type="submit"> Sign in now </button>
                                </div>
                            </form>
                            <a href="#" class="gray-clr"> Forgot Passoword? </a>                            
                        </div>                        
                    </div>
                    <div class="create-accnt">
                        <a href="#" class="white-clr"> Don’t have an account? </a>  
                        <h2 class="title-2"> <a href="#" class="green-clr under-line">Create a free account</a> </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Popup: Login --> 

        <!-- Search Popup -->
        <div class="search-popup">
            <div>
                <div class="popup-box-inner">
                    <form>
                        <input class="search-query" type="text" placeholder="Search and hit enter" />
                    </form>
                </div>
            </div>
            <a href="javascript:void(0)" class="close-search"><i class="fa fa-close"></i></a>
        </div>
        <!-- / Search Popup -->

        <!-- Main Jquery JS -->
        <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>        
        <!-- Bootstrap JS -->
        <script src="assets/plugins/bootstrap-3.3.6/js/bootstrap.min.js" type="text/javascript"></script>    
        <!-- Bootstrap Select JS -->
        <script src="assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js" type="text/javascript"></script>    
        <!-- OwlCarousel2 Slider JS -->
        <script src="assets/plugins/owl.carousel.2/owl.carousel.min.js" type="text/javascript"></script>   
        <!-- Sticky Header -->
        <script src="assets/js/jquery.sticky.js"></script>
        <!-- Wow JS -->
        <script src="assets/plugins/WOW-master/dist/wow.min.js" type="text/javascript"></script>   
        <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzW2QH8fp1vvxYkcrc61CMAJDLss10ixQ&callback=initMap&libraries=&v=weekly"
      async
    ></script>

        <!-- Slider JS -->        

        <script>

                let map;
                const pickup = { lat: <?php echo $originLat ?>, lng: <?php echo $originLng ?> };
                const destination = { lat: <?php echo $detLat ?>, lng: <?php echo $detLng ?> }; 

                let currentPt = generateRandomPoint(destination,getRandomInt(999,100000));

                function getRandomInt(min, max) {
                    min = Math.ceil(min);
                    max = Math.floor(max);
                    return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
                    }
              

                function initMap() {
                   

                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: <?php echo $originLat ?>, lng: <?php echo $originLng ?> },
                    zoom: 10,
                });
                    var line = new google.maps.Polyline({
                    path: [
                        new google.maps.LatLng(<?php echo $originLat ?>, <?php echo $originLng ?>), 
                        new google.maps.LatLng(currentPt.lat, currentPt.lng)
                    ],
                    strokeColor: "#FF0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 3,
                    map: map
                });

                    new google.maps.Marker({
                        position: pickup,
                        map,
                        title: "Pickup Location",
                        icon: {
                      url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                        }
                    });

                    new google.maps.Marker({
                        position: destination,
                        map,
                        title: "Destination", icon: {
                          url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
                        }
                    });

                    new google.maps.Marker({
                        position: currentPt,
                        map,
                        title: "Current package location"
                    });
                }


              (function () {
                
                $.ajax({
                type: 'get',
                url: 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=<?php echo $start ?>&destinations=<?php echo $end ?>&key=AIzaSyCzW2QH8fp1vvxYkcrc61CMAJDLss10ixQ',
                success: function(response) {
                 
                    $('#duration').html(response.rows[0].elements[0].duration.text);
                    },

            error: function(response){
                
            }

            });

             }());

             function generateRandomPoint(center, radius) {
            var x0 = center.lng;
            var y0 = center.lat;
            // Convert Radius from meters to degrees.
            var rd = radius/111300;

            var u = Math.random();
            var v = Math.random();

            var w = rd * Math.sqrt(u);
            var t = 2 * Math.PI * v;
            var x = w * Math.cos(t);
            var y = w * Math.sin(t);

            var xp = x/Math.cos(y0);

            // Resulting point.
            return {'lat': y+y0, 'lng': xp+x0};
            }
        </script>

        <!-- Theme JS -->
        <script src="assets/js/theme.js" type="text/javascript"></script>

    </body>


</html>
