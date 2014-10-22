<?php session_start();
 if(!isset($_SESSION['client_id'])){
                         header('Location: index.php');
                    }
include('admin/php/class.load.php');

                   


                
?>
<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="author" content="home-saigon">
<meta name="keywords" content="">

<title>Home Saigon - My Account</title>
<link href='http://fonts.googleapis.com/css?family=Lato:400italic,400,700|Bitter' rel='stylesheet'>

<link href="style.css" media="screen" rel="stylesheet">
<link href="screen.css" media="screen" rel="stylesheet">

<!-- Mobile optimized -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<script src="js/libs/modernizr-2.5.3.min.js"></script>
<script src="js/libs/respond.min.js"></script>

<script src="js/jquery.min.js"></script>
<script src="js/general.js"></script>

<script src="js/jquery.tools.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>

<script src="js/slides.min.jquery.js"></script>

<link href="css/cusel.css" rel="stylesheet">
<script src="js/cusel-min.js"></script>
<script src="js/jScrollPane.js"></script>
<script src="js/jquery.mousewheel.js"></script>

<script src="js/jquery.dependClass.js"></script>
<script src="js/jquery.slider-min.js"></script>
<link href="css/jslider.css" rel="stylesheet">

<script src="js/jquery.jcarousel.min.js"></script>
<link rel="stylesheet" href="images/skins/tango/skin.css">

<link href="css/customInput.css" rel="stylesheet">
<script src="js/jquery.customInput.js"></script>

<script src="js/jquery.qtip.min.js"></script>
<link href="css/jquery.qtip.css" rel="stylesheet">


<!--[if IE 7]> <link href="css/ie.css" media="screen" rel="stylesheet"> <![endif]-->
<link href="custom.css" media="screen" rel="stylesheet">
<script language="javascript" src="js/custom.js"></script>
</head>

<body>
<?php include('admin/php/analytic.php'); ?>
<div class="body_wrap" >

<div class="header" style="background-image:url(images/header_default.jpg);">
<div class="header_inner">
    <div class="container_12">

    <div class="header_top">
    
        <div class="logo">
        <a href="index.html"><img src="images/logo.png" alt=""></a>
          <h1>Home Saigon - Real Estate</h1>
        </div>
        
    <?php

        include('include/menu.php');

    ?>
        
        <div class="clear"></div>
    </div>

    <div class="header_bot">

          
        <!--/ search_main -->
        
    </div>

    <div class="clear"></div>
    </div>
</div>
</div>
<!--/ header -->

<!-- map before content -->

<!--/ map before content -->

<div class="middle">
<div class="container_12">
<!-- content -->
    <div class="grid_8 content">
        <iframe src="admin/main_website_profile.php" style="width:600px; height:1000px;overflow:hidden;" ></iframe>
    </div>
    <?php
        include('include/adresse.php');
     ?>
    <!--/ sidebar -->
    <div class="clear"></div>


</div>
</div>
<!--/ middle -->


<div class="footer" style='height:70px; background:green; margin-bottom:0px; '>
<div class="footer_inner"style='height:300px;'>
    <?php include('include/footer.php'); ?>
</div>    
</div>

</div>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&#038;ver=1.0'></script>
<script type='text/javascript' src='js/jquery.gmap.min.js?ver=3.3.0'></script>
<?php include('analytic/script.analytic.php'); ?>
</body>
</html>
