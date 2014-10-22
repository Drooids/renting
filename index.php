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
<meta name="keywords" content="Home saigon website,Real estate in Vietnam, Real estate in HCMC, Room for rent in HCMC,House for rent in saigon,Villa for rent in HCMC">

<title>Home Saigon - Homepage</title>
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
<script>
	jQuery(document).ready(function($) {

		$('.header_slider').slides({
			play: 4000,
			pause: 2500,
			hoverPause: true
		});

	});
</script>

<link href="css/cusel.css" rel="stylesheet">
<script src="js/cusel-min.js"></script>
<script src="js/jScrollPane.js"></script>
<script src="js/jquery.mousewheel.js"></script>

<script src="js/jquery.dependClass.js"></script>
<script src="js/jquery.slider-min.js"></script>
<link href="css/jslider.css" rel="stylesheet">

<script src="js/jquery.jcarousel.min.js"></script>
<link rel="stylesheet" href="images/skins/tango/skin.css">
<style type="text/css">
    .warning{
        background-color: blue;
  color: #ffffff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.35);
    }

</style>
<!--[if IE 7]><link rel="stylesheet" href="css/ie.css><![endif]-->
<link href="custom.css" media="screen" rel="stylesheet">
</head>

<body>
<?php include('admin/php/analytic.php'); ?>
<div class="body_wrap">

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
    	
        <div class="search_home">
        	
            
            <?php include('include/main_widget.php'); ?>
            <script type="text/javascript">
            function send_filter_widget(district,price,available,properties,furnished,square,bed,bath,service){
                $.get("admin/php/filter_action.php",{action:'widget',district:district,price:price,available:available,properties:properties,furnished:furnished,square:square,bed:bed,bath:bath,service:service},function(result){
                      result = $.trim(result);
                      if(result != ''){
                        window.location = "properties.php";
                      }
                  });
            }
                    $('#search_submit').live("click",function(){

            var service = $('input:radio[name=field]:checked').attr('value');

            // Changement du district dans le Widget du TOP
            var district = $('#tf-seek-input-select-location_id').attr("value");
               
            var properties = $('#tf-seek-input-select-properties_id').attr("value");
        
            // Changement du bed dans le Widget du TOP
            var bed = $('#search_no_beds').attr("value");
               
            // Changement du bath dans le Widget du TOP
            var bath = $('#search_no_baths').attr("value");
              
           
            
            
            // City dans le widget du TOP
            var city_widget ='Ho Chi Minh City';

            //changement du price dans le widget du TOP
             if(service == 'rent')
                var price = $('#price_range_rent').attr('value');
            else
                var price = $('#price_range_sale').attr('value');

           

           // alert('hello');
            send_filter_widget(district,price,'',properties,'','',bed,bath,service);          
                //send_filter('city',city_widget);
           
                return false;
                     

                     

                        
                    });

                    </script>           
        </div>    
        
    
    	<div class="header_slider">
        	<span class="slider_ribbon"></span>
        	<div class="slides_container">
                <?php
        $reponse = $bdd->query("SELECT id_portfolio FROM portfolio WHERE actif_portfolio = 1 LIMIT 8");

            
            $donnees = $reponse->fetchAll();
            for($k=0;$k<count($donnees);$k++){
                $id_portfolio=$donnees[$k]['id_portfolio'];
                //creation du portfolio
                $object = new portfolio($id_portfolio);



                if($object->link_portfolio != ''){
                         $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                         $donnees2 = $reponse->fetchAll();
                         $id_gallery=$donnees2[0]['id_gallery'];
                         //Creatio nde la gallery
                         $object_gallery = new gallery($id_gallery);
                         $nom_fichier = $object_gallery->GetFirstImage();
                         //echo "nom:".$nom_fichier;
                         }else{
                            $nom_fichier="sample-image-250x150.png";
                         }   
                        
                         

                echo"<div class='slide'>";
                echo"<a href='properties-details.php?id=".$id_portfolio."'><img src='admin/upload/uploads/".$id_portfolio."/".$nom_fichier."' width='645' height='407' alt=''></a>";
                echo"<div class='caption'><p>City: ".$object->city_portfolio."- District: ".$object->district_portfolio." with ".$object->bed_portfolio." beds, ".$object->bath_portfolio." baths:  <span class='price'>";
                if($object->service_portfolio =="rent")
                    echo "$ ".$object->price_portfolio."/months</span></p></div>";
                else
                    echo"$ ".$object->price_portfolio."</span></p></div>";
                echo"</div>";
            }

        ?>
            	
                    
                    
               
                
          </div>
          
        </div>    	
		        
    </div>
    
    <div class="clear"></div>
    </div>
</div>
</div>
<!--/ header -->

<!-- carousel before content -->
<div class="before_content">
	<div class="container_12">
    	<h2>Latest added Properties</h2>
        
        	<div class="carusel_list">
				<ul id="latest_properties" class="jcarousel-skin-tango">
                <?php
        $reponse = $bdd->query("SELECT id_portfolio FROM portfolio  WHERE actif_portfolio = 1 LIMIT 8");

            
            $donnees = $reponse->fetchAll();
            for($k=0;$k<count($donnees);$k++){
                $id_portfolio=$donnees[$k]['id_portfolio'];
                $object = new portfolio($id_portfolio);
                         $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                         $donnees2 = $reponse->fetchAll();
                         $id_gallery=$donnees2[0]['id_gallery'];
                         //Creation de la gallery
                         $object_gallery = new gallery($id_gallery);
                         $nom_fichier = $object_gallery->GetFirstImage();

                
                        //Salle de bain et toillet
                    $bed_portfolio=$object->bed_portfolio;
                    $bath_portfolio=$object->bath_portfolio;
                if($bath_portfolio == 'more')
                    $bath_portfolio='5+';
                
                if($bed_portfolio == 'more')
                    $bed_portfolio='5+';
               
                       
                         
                echo"<li>";
                    echo"<div class='item_image'><a href='properties-details.php?id=".$object->id_portfolio."'><img src='admin/upload/uploads/".$id_portfolio."/".$nom_fichier."' width='218' height='125' alt=''></a></div>";
                    echo"<div class='item_row item_type'><span>Property Type:</span> <a href='#'><strong>".$object->service_portfolio."</strong></a></div>";
                    if($object->service_portfolio == 'rent')
                        echo"<div class='item_row item_price'><span>Asking Price:</span> <strong>$".$object->price_portfolio."/months</strong></div>";
                    else
                        echo"<div class='item_row item_price'><span>Asking Price:</span> <strong>$".$object->price_portfolio."</strong></div>";


                    echo"<div class='item_row item_rooms'><span>Rooms:</span> <strong>".$object->bed_portfolio." beds, ".$object->bath_portfolio." baths</strong></div>";
                    echo"<div class='item_row item_location'><span>Town:</span> <strong>".$object->district_portfolio."</strong></div>";
                    echo"<div class='item_row item_view'><a href='properties-details.php?id=".$object->id_portfolio."' class='btn_view'>view property</a></div>";
               echo"</li>";
               
            }

        ?>					
        
                </ul>
			</div>

			<script>
                jQuery(document).ready(function($) {
                    $('#latest_properties').jcarousel({
                        easing: 'easeOutBack',
                        animation: 600,
						scroll: 1
                        });
                    });
            </script>
   		
  </div>
</div>
<!--/ carousel before content -->

<div class="middle">
<div class="container_12">
	
    <!-- page content -->
	<div class="entry">

        <br>
            <?php
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='Accueil_1' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_1 = new traduction($donnees[0]['id']);
                                        // Acueill text - 1
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='Accueil_2' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_2 = new traduction($donnees[0]['id']);
                                        // Accueil text -2
                                        $reponse = $bdd->query("SELECT * FROM traduction WHERE name ='Accueil_3' ");
                                        $donnees = $reponse->fetchAll();
                                        $traduc_3 = new traduction($donnees[0]['id']);
            ?>
        <div class="col col_1">
        <h3 class="title_up">Home Saigon</h3>
        </div>	
            
        <div class="col col_1_2">
        <div class="inner">
            <?php echo $traduc_2->$langue; ?>
        </div>
        </div>
        
        <div class="col col_1_2">
        <div class="inner">
           <?php echo $traduc_3->$langue; ?>
        </div>
        </div>
        <div class="divider_space_thin"></div>
        
        <div class="col col_1_3">
        <div class="inner"> <a href="#"><img src="images/property_sale.png" width="137" height="137" alt="Property for SALE" class="alignleft"></a>
            <div class="text-block-1">
                <strong>Looking for a <span>House</span></strong>
              <p><a href="properties.php?service=rent&properties=house" class="link-more2">View all Properties >></a></p>
            </div>
        </div>
        </div>
        
        <div class="col col_1_3">
        <div class="inner"> <a href="#"><img src="images/property_rent.png" width="137" height="137" alt="APARTMENTS for RENT" class="alignleft"></a>
            <div class="text-block-1">
                <strong>Looking for a <span>Appart.</span></strong>
              <p><a href="properties.php?service=rent&properties=appartment" class="link-more2">View all Properties >></a></p>
            </div>
        </div>
        </div>
        
        <div class="col col_1_3">
        <div class="inner"> <a href="#"><img src="images/property_lease.png" width="137" height="137" alt="OFFICE SPACE for LEASE" class="alignleft"></a>
            <div class="text-block-1">
                <strong>Looking for a <span>Office</span></strong>
              <p><a href="properties.php?service=rent&properties=office" class="link-more2">View all Office Spaces >></a></p>
            </div>
        </div>
        </div>
        <div class="divider_space"></div>
    
    </div>
    <!--/ page content -->
    
    <!-- content -->
    
    <!--/ content -->
    
    <!-- sidebar -->
   
    
    <!--/ sidebar -->
    <div class="clear"></div>
    
    
</div>
</div>
<!--/ middle -->
         <script type="text/javascript">
                jQuery(document).ready(function($) {
<?php if(isset($_GET['account_created'])){ ?>
                                                        $.jGrowl("Your account has just been created ! Click on My page to change your personnal informations", {
                                                                        header: 'Account',
                                                                        sticky: true,
                                                                        theme: 'warning'
                                                                    });
                                                        $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
<?php   } ?>
                    
                });
         </script> 
<div class="footer" style='height:70px;'>
<div class="footer_inner"style='height:300px;'>
	<?php include('include/footer.php'); ?>
</div>    
</div>

</div>
       


         
  

        
        <?php include('analytic/script.analytic.php'); ?>
</body>
</html>
