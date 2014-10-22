<?php session_start();
include('admin/php/class.load.php');
include('admin/php/class.traduction.php');
$langue = "US";
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
<meta name="author" content="HomeSaigon">
<meta name="keywords" content="">

<title>Home Saigon - Contact us now!</title>
<link href='http://fonts.googleapis.com/css?family=Lato:400italic,400,700|Bitter' rel='stylesheet'>

<link href="style.css" media="screen" rel="stylesheet">
<link href="screen.css" media="screen" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
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
        <a href="index.php"><img src="images/logo.png" alt=""></a>
        <h1>Home Saigon - Real Estate</h1>
        </div>
        <?php include('include/menu.php'); ?>
        
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
        <?php
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_1' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_1 = new traduction($donnees[0]['id']);
                                            $text_1 = str_replace('<p>','',$traduc_1->$langue);
                                            $text_1 = str_replace('</p>','',$text_1);
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_2' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_2 = new traduction($donnees[0]['id']);
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_3' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_3 = new traduction($donnees[0]['id']);
                                            $text_3 = str_replace('<p>','',$traduc_3->$langue);
                                            $text_3 = str_replace('</p>','',$text_3);
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_4' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_4 = new traduction($donnees[0]['id']);
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_5' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_5 = new traduction($donnees[0]['id']);
                                            $text_5 = str_replace('<p>','',$traduc_5->$langue);
                                            $text_5 = str_replace('</p>','',$text_5);
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_6' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_6 = new traduction($donnees[0]['id']);
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_7' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_7 = new traduction($donnees[0]['id']);
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_8' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_8 = new traduction($donnees[0]['id']);
        ?>

		<div class="post-detail">
        <h2>Informations <span>FAQ</span></h2>
                    
                        <h3 class="toggle box">Informations (Click to Open) <span class="ico"></span></h3>
                        <div class="toggle_content boxed">
                            
                            <div class="faq_question toggle"><span class="faq_q">Q:</span> <span class="faq_title"><?php echo $text_1; ?></span> <span class="ico"></span></div>
                            <div class="faq_answer toggle_content">
                            <?php echo $traduc_2->$langue; ?>
                        </div>
                        
                        <div class="faq_question toggle"><span class="faq_q">Q:</span> <span class="faq_title"><?php echo $text_3; ?></span> <span class="ico"></span></div>
                        <div class="faq_answer toggle_content">
                            <?php echo $traduc_4->$langue; ?>
                        </div>
                        
                        <div class="faq_question toggle"><span class="faq_q">Q:</span> <span class="faq_title"><?php echo $text_5; ?></span> <span class="ico"></span></div>
                        <div class="faq_answer toggle_content">
                        <?php echo $traduc_6->$langue; ?>
                        </div>
                                
                        </div>
            </br>    
       	    <h1><?php echo $traduc_7->$langue; ?></h1>


            <div class="entry">
                <?php echo $traduc_8->$langue; ?>
           	 </div>


        </div>
        <!--/ post details -->

                <!-- add comment -->
                        <div class="add-comment contact-form" id="addcomments">

                            <div class="add-comment-title">
                            <h3>Leave a Reply</h3>
                            </div>

                            <div class="comment-form">
                            <form action="#" method="post" id="contactForm" class="ajax_form">

                                <div class="row alignleft">
                                    <label><strong>Name *</strong></label>
                                    <input type="text" name="yourname" id="name" value="" class="inputtext input_middle" />
                                </div>

                                <div class="space"></div>

                                <div class="row  alignleft">
                                    <label><strong>Email *</strong> (never published)</label>
                                    <input type="text" id="email" name="email" value="" class="inputtext input_middle" />
                                </div>

                                <div class="clear"></div>

                                <div class="row">
                                    <label><strong>Website</strong></label>
                                    <input type="text" name="url" id="url" value="" class="inputtext input_full">
                                </div>
                                <div class="row">
                                    <label><strong>Phone number</strong></label>
                                    <input type="text" name="number" id="number" value="" class="inputtext input_full">
                                </div>

                                 <div class="row">
                                    <label><strong>Comment *</strong></label>
                                    <textarea cols="30" rows="10" name="message" id="message" class="textarea textarea_middle"></textarea>
                                </div>

                                <div class="row" style="width:100%">
								<input type="submit" id="envoy" value="SEND MESSAGE" class="btn-submit">
								</div>
								
                            </form>
                            </div>
                        </div>
                <!--/add comment -->
                    <script type="text/javascript">
                        jQuery(document).ready(function($){

                           

                            $('#envoy').live("click", function(){
                            var data = $('form').serialize();
                                if($('#email').attr('value') != '' && $('#message').attr('value') != ''){
                                    $.jGrowl("Message Sent", {
                                                header: 'Messages',
                                                sticky: true,
                                                theme: 'warning'
                                            });     
                                    $.post("admin/php/script.saveContactPage.php?"+data,function() {
                                            
                                            //alert("saved !");
                                     });
                                }
                            

                                return false;
                            });
                           
                        });

                    </script>


    </div>
    <!--/ content -->

    <!-- sidebar -->
    <div class="grid_4 sidebar" style='min-height:665px;'>

        <div class="widget-container widget_contact">
        	<h3 class="widget-title">Home Saigon</h3>
            <div class="inner">
                <div class="contact-address">Villa I23B LakeView, District 9, HCMC</div>
                <div class="contact-address">197A - 3thang2, District 10, HCMC</div>
                <div class="contact-phone"><span>Phone:</span> 01 215 048 078</div>
                <div class="contact-mail"><span>Email:</span> contact@home-saigon.com</div>
                

                <!--<div class="contact-social">
                	<div><strong>Call us on:</strong> <br>
                    <a href="#"><img src="images/social_skype.png" width="79" height="25" alt=""></a></div>
                  	<div><strong>Follow on:</strong> <br>
                    <a href="#"><img src="images/share_twitter.png" width="79" height="25" alt=""></a></div>
                  	<div><strong>Join us on:</strong> <br>
                    <a href="#"><img src="images/share_facebook.png" width="88" height="25" alt=""></a></div>
                <div class="clear"></div>
                
                </div>
                -->
        	</div>
		</div>

        <div class="widget-container">
            <div class="agent_phone">
				<span>OR CALL US RIGHT NOW</span>
                <p><strong>01-215-048-078</strong></p>
			</div>
		</div>



    </div>
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
