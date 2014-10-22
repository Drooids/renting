<?php session_start();
include('admin/php/class.load.php');
        $furnished = '';
        $properties = '';


//session_destroy();

if(isset($_SESSION['filter'])){
    $filter = unserialize($_SESSION['filter']); 
    //echo $filter->district;
    
    //$filter->AddVar('district','1234');
   /* $furnished = $filter->furnished;
    $district = $filter->district;
    $service = $filter->service;
    $properties = $filter->properties;

   $filter->AddVar('service',$service);
   $filter->AddVar('furnished',$furnished);
   $filter->AddVar('district',$district);
   $filter->AddVar('properties',$properties);
   */
}
    
    //$filter->AddVar('district','1234');
    //echo $filter->district;
if(isset($_GET['service'])){
    $filter = new filter();
    $service_page = $_GET['service'];
    switch ($service_page) {
        case 'rent':
            $filter->AddVar('service','rent');
            if(isset($_GET['properties'])){
                switch ($_GET['properties']) {
                    case 'room':
                         $filter->AddVar('properties','room'); 
                        break;
                    case 'office':
                         $filter->AddVar('properties','office'); 
                        break;
                    case 'land':
                         $filter->AddVar('properties','land'); 
                        break;
                    case 'house':
                         $filter->AddVar('properties','house'); 
                        break;
                    case 'appartment':
                         $filter->AddVar('properties','appartment'); 
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
            break;
        case 'sale':
            $filter->AddVar('service','sale');
            break;
        case 'service_appartment':
            $filter->AddVar('service','rent');
            $filter->AddVar('furnished',1);
            break;
        
        default:
            # code...
            break;
    }
}

$_SESSION['filter'] = serialize($filter);
   
// Featured Filter !
$featured = new filter();
$featured->AddVar('district','district 1');
$featured->AddVar('service','rent');

$text = $filter->request();
$featured = $featured->request();
//$bed_filter_init = $filter;
//$bath_filter_init = $filter;
//echo $text;
//echo $text;
//echo $filter->service;
 $_SESSION['filter'] = serialize($filter);

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



<?php
if(isset($_GET['properties'])){
    switch ($_GET['properties']) {
                    case 'room':
                         echo"<meta name='keywords' content='Room for rent in saigon,Room for rent in HCMC,Room for rent in Ho Chi Minh City'>";
                         echo "<title>Home Saigon - Room for Rent</title>";
                        break;
                    case 'office':
                        echo"<meta name='keywords' content='Office for rent in saigon,Office for rent in HCMC,Office for rent in Ho Chi Minh City'>";
                         echo "<title>Home Saigon - Office for Rent</title>";
                        break;
                    case 'land':
                        echo"<meta name='keywords' content='Land for sale in saigon,Land for sale in HCMC,Land for sale in Ho Chi Minh City'>";
                         echo "<title>Home Saigon - Land for Sale</title>"; 
                        break;
                    case 'house':
                        echo"<meta name='keywords' content='House for rent in saigon,House for rent in HCMC,House for rent in Ho Chi Minh City,House for sale in saigon,House for sale in HCMC,House for sale in Ho Chi Minh City'>";
                         echo "<title>Home Saigon - House for Rent/Sale</title>"; 
                        break;
                    case 'appartment':
                        echo"<meta name='keywords' content='Appartment for rent in saigon,Appartment for rent in HCMC,Appartment for rent in Ho Chi Minh City,Appartment for sale in saigon,Appartment for sale in HCMC,Appartment for sale in Ho Chi Minh City'>";
                         echo "<title>Home Saigon - Appartment for Rent/Sale</title>"; 
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }else{
                 echo"<meta name='keywords' content='Properties for rent in saigon,Properties for rent in HCMC,Properties for rent in Ho Chi Minh City,Properties for sale in saigon,Properties for sale in HCMC,Properties for sale in Ho Chi Minh City'>";
                 echo "<title>Home Saigon - Properties List</title>";
            }
?>
<link href='http://fonts.googleapis.com/css?family=Lato:400italic,400,700|Bitter' rel='stylesheet'>


<link href="style.css" media="screen" rel="stylesheet">
<link href="screen.css" media="screen" rel="stylesheet">

<!-- Mobile optimized -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<script src="js/libs/modernizr-2.5.3.min.js"></script>
<script src="js/libs/respond.min.js"></script>

<script src="js/jquery.min.js"></script>
 <script src="js/jquery-ui.min.js"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="js/cusel-min.js"></script>

<script src="js/general.js"></script>

<script src="js/jquery.tools.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>

<script src="js/slides.min.jquery.js"></script>



<link href="css/cusel.css" rel="stylesheet">
<script src="js/jScrollPane.js"></script>
<script src="js/jquery.mousewheel.js"></script>


<script src="js/jquery.dependClass.js"></script>
<script src="js/jquery.slider-min.js"></script>
<link href="css/jslider.css" rel="stylesheet">

<script src="js/jquery.jcarousel.min.js"></script>
<link rel="stylesheet" href="images/skins/tango/skin.css">


<link href="css/customInput.css" rel="stylesheet">


<script src="js/jquery.qtip.min.js"></script>
<link href="css/jquery.qtip.css" rel="stylesheet">
<!--<script src="js/date-time.js"></script>-->
<script src="js/jquery.prettyPhoto.js"></script>
<link href="css/prettyPhoto.css" rel="stylesheet">  

<!--[if IE 7]> <link href="css/ie.css" media="screen" rel="stylesheet"> <![endif]-->
<link href="custom.css" media="screen" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="Personnal.css">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<!-- Pour google map -->
<script src="js/markerwithlabel.js"></script>
</head>

<body >
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
    <style type="text/css">
    @media only screen and (max-width: 480px) {
        .search_main {
            display: none;
        }
    }

    </style>
  
    
    <div class="clear"></div>
    </div>
</div>
</div>
<!--/ header -->

<!-- carousel before content -->
<div class="before_content">
	<div class="container_12">
    	<strong class="carusel_title">Featured Properties</strong>
        
        	<?php include('include/featured.php'); ?>
   		
  </div>
</div>
<!--/ carousel before content -->

<div class="middle">
<div class="container_12">
	 <?php
                    $reponse = $bdd->query($text);

            
                    $donnees = $reponse->fetchAll();

                    $a=count($donnees);

$result = $a/5;
if($a % 5 == 0){
//echo $result;
}else{
$result = explode(".",$result);
$result = $result[0]+1;
//echo $result;
}

if($result == 0)
    $result = 1;
         ?>
    <!-- content -->
    <div class="grid_8 content">
    	
        <div class="title_small" >
        <h1>PROPERTIES <span class='total_offer'>(<?php echo $a; ?> OFFERS)</span> 
            <div style='float:right;' id='fixedButton'>
                    <ul id="view_toggle" class="toggle_map">
                        <li id="showMap" >
                        <a>
                        <img class="active_icon" src="//d382qe86mkdg2o.cloudfront.net/static/60c56e9/img/pin_white.svg">
                        <img class="inactive_icon" src="//d382qe86mkdg2o.cloudfront.net/static/60c56e9/img/pin_grey.svg">
                        Map
                        </a>
                        </li>
                        <li id="showList" class="active">
                        <a>
                        <img class="inactive_icon" src="//d382qe86mkdg2o.cloudfront.net/static/60c56e9/img/list_grey.svg">
                        <img class="active_icon" src="//d382qe86mkdg2o.cloudfront.net/static/60c56e9/img/list_white.svg">
                        List
                        </a>
                        </li>
                        </ul>
            </div>
        </h1>
       
    	</div>
       
        <!-- Affichace ge la map -->
       <div class='full_map'> <div id='map-canvas'></div></div>

        <!-- sorting, pages -->
        <div class="block_hr list_manage">
        	<div class="inner">
                	<form action="#" method="post" class="form_sort">
		            	<span class="manage_title">Sort by:</span>
							<select class="select_styled white_select" name="sort_list" id="sort_list">
		                    	<option value="1">Latest Added</option>
								<option value="2" selected>Price High - Low</option>
		                        <option value="3">Price Low - Hight</option>
		                        <option value="4">Names A-Z</option>
		                        <option value="5">Names Z-A</option>
		                    </select>
		            </form>    
		            
		            
		            
		            <div class="pages" style='float:right;'>
		            	<span class="manage_title">Page: &nbsp;<strong class='number_page' id='info_page'  data-page='1' data-total ='<?php echo $result; ?>'>1 of <?php echo $result; ?></strong></span> <a href="#" class="link_prev" data-click="0">Previous</a><a href="#" class="link_next" data-click="2">Next</a>
		            </div> 
                    
                    <div class="clear"></div>
        	</div>	
        </div>
        <!--/ sorting, pages -->
        
        <!-- real estate list -->
        <div class="re-list">
                    <?php
                        $total = count($donnees);
                    if($total >= 5)
                        $total = 5;
        for($k=0;$k<$total;$k++){
                $id_portfolio=$donnees[$k]['id_portfolio'];
               
                $object = new portfolio($id_portfolio);
                         $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                         $donnees2 = $reponse->fetchAll();
                         $id_gallery=$donnees2[0]['id_gallery'];
                         //Creation de la gallery
                         $object_gallery = new gallery($id_gallery);
                         $nom_fichier = $object_gallery->GetFirstImage();

                    echo"<div class='re-item'>";           
                    echo"<div class='re-image'><a href='properties-details.php?id=".$object->id_portfolio."'><img src='admin/upload/uploads/timthumb.php?src=".$id_portfolio."/".$nom_fichier."&w=218&h=125' alt=''  ></a></div>";
                    echo"<div class='re-short'>";              
                    echo"<div class='re-top'>";
                    echo"<h2><a href='properties-details.php?id=".$object->id_portfolio."'>".$object->nom_portfolio."</a>"." (".$object->district_portfolio.")"."</h2>";
                        if($object->service_portfolio =='rent')
                            echo"<span class='re-price'>$".$object->price_portfolio." / mo.</span>";
                        else
                            echo"<span class='re-price'>$".$object->price_portfolio." </span>";
                    echo"</div>";
                        $text_portfolio = $object->text_portfolio;                
                        $text_portfolio = explode('<ul', $object->text_portfolio);
                       
                    echo"<div class='re-descr'>".$text_portfolio[0];
                    echo"</div>";                
                    echo"<div class='re-bot'>";
                    echo"<a href='properties-details.php?id=".$object->id_portfolio."' class='link-more'>View Details</a>";
                    echo"<a href='properties-details.php?id=".$object->id_portfolio."' class='link-viewmap tooltip' title='View on Map'>View on Map</a>";

                    // Si il est dans les favoris
        if(isset($_SESSION['client_id'])){
                                    $id_client = $_SESSION['client_id'];
                                    $verif_favoris = $bdd->query("SELECT id FROM favoris where portfolio_id='$object->id_portfolio' AND client_id='$id_client'");
                                    $verif_favoris = $verif_favoris->fetchAll();
            if(count($verif_favoris) == 1){
                echo"<a class='link-save tooltip' href='#' hidefocus='true' data-id='".$object->id_portfolio."' style='outline: medium none;' oldtitle='Save Offer' aria-describedby='ui-tooltip-0'>Save Offer</a>";

            }else{
                 echo"<a class='link-save-empty tooltip' href='#' hidefocus='true' data-id='".$object->id_portfolio."' style='outline: medium none;' oldtitle='Save Offer' aria-describedby='ui-tooltip-0'>Save Offer</a>";

            }
        }else{
            echo"<a class='link-save-empty tooltip' href='#' hidefocus='true' data-id='".$object->id_portfolio."' style='outline: medium none;' oldtitle='Save Offer' aria-describedby='ui-tooltip-0'>Save Offer</a>";

        }
                    
                   
                                echo"<ul class='gallery' style='display:inline-block; width:10x; margin-left:0px; list-style:none;'>";
                                if($object->link_portfolio != ''){
                                    $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                                    $donnees2 = $reponse->fetchAll();
                                    $id_gallery=$donnees2[0]['id_gallery'];
                                    //On crée une objet gallery
                                    $object_gallery = new gallery($id_gallery);

                                            $link_gallery = explode(",", $object_gallery->link_gallery);
                                            
                                            $longueur=count($link_gallery);
                                            //echo "longueur: ".$longueur;
                                                for($j=0;$j<$longueur;$j++){
                                                    $id=$link_gallery[$j];
                                                    $reponse = $bdd->query("SELECT nom_fichier,id_fichier
                                                                            FROM fichier
                                                                            where id_fichier = '$id' ");

                                                
                                                    $donnees3 = $reponse->fetchAll();
                                                        if(count($donnees3) != 0){
                                                            $nom_fichier=$donnees3[0]['nom_fichier'];
                                                            $id_fichier=$donnees3[0]['id_fichier'];

                                                            if($j == 0){
                                                                  echo"<li style=''> <a href='admin/upload/uploads/timthumb.php?src=".$id_portfolio."/".$nom_fichier."&w=500' rel='prettyPhoto[gallery".$k."]' class='link-viewimages' title='View Images'>View Images</a>";
                                                                  echo"</li>";
                                                            }else{
                                                                  echo"<li style='display:none;'> <a href='admin/upload/uploads/timthumb.php?src=".$id_portfolio."/".$nom_fichier."&w=500' rel='prettyPhoto[gallery".$k."]' class='link-viewimages' title='View Images'>View Images</a>";
                                                                  echo"</li>";
                                                            }
                                                        }
                                                }
                                        
                                }
                                   
                                echo "</ul >";
                    echo"</div>";
                    echo"</div>";
                    echo"<div class='clear'></div>";
                    echo"</div>";

            }

        ?>
            
        
        </div>



        <!--/ real estate list -->
        <script type="text/javascript">
          $(".gallery a[rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'fast', /* fast/slow/normal */
            slideshow: 5000, /* false OR interval time in ms */
            autoplay_slideshow:true,
          });
        </script>
        
        <!-- sorting, pages -->
       
        <!--/ sorting, pages -->
        
       
        
    </div>
    <!--/ content -->
     <div class='buttonFixedMenu'  >
                <a class='buttonFixedMenu_button' data-menu='inactive'>
                <img class="inactive_icon" src="//d382qe86mkdg2o.cloudfront.net/static/60c56e9/img/list_grey.svg">
                <img class="active_icon" src="//d382qe86mkdg2o.cloudfront.net/static/60c56e9/img/list_white.svg">
                <span> Filter </span>
                </a>
    </div>
    <!-- sidebar -->
    <div class="grid_4 sidebar " id='fixedMenu'>
    	
        <!-- filter -->
        <div class="widget-container widget_adv_filter">
       
			<h3 class="widget-title">FILTER THE RESULTS</h3>
				
            	<form action="#" method="get" class="form_white scrollableForm">
                    <div class="row input_styled inlinelist serviceData">
                        <label class="label_title">Service:</label><br>
                        <?php if($filter->service == 'rent'){ ?>
                        <input type="radio" name="service" value="rent" id="ct_rent" checked> <label for="ct_rent">Rent</label>
                        <input type="radio" name="service" value="sale" id="ct_sale"> <label for="ct_sale">Sale</label>
                        <?php }elseif($filter->service == 'sale') {?>
                        <input type="radio" name="service" value="rent" id="ct_rent" > <label for="ct_rent">Rent</label>
                        <input type="radio" name="service" value="sale" id="ct_sale" checked> <label for="ct_sale">Sale</label>
                        <?php }else{ ?>
                        <input type="radio" name="service" value="rent" id="ct_rent" checked> <label for="ct_rent">Rent</label>
                        <input type="radio" name="service" value="sale" id="ct_sale" > <label for="ct_sale">Sale</label>
                        <?php } ?>
                        
                        <!--<input type="radio" name="pool" value="2" id="ct_both" checked> <label for="ct_both">I don't care</label>-->
                    </div>
                    <?php if($filter->service == 'rent' || $filter->service == 'service_appartment'){?>
                         <div class='hide_rent' >
                    <?php }else{ ?>
                         <div class='hide_rent' style='display:none;'>
                    <?php } ?>
                   <!-- Ne pas oublier de rajouter ceci -->
                        <div class="row input_styled inlinelist hideMap furnishedData" >
                            <label class="label_title">Furnished:</label><br>
                            <input type="radio" name="Furnished" value="1" id="ct_furn_yes" <?php if($filter->furnished == 1) echo "checked" ; ?>> <label for="ct_furn_yes">Yes</label>
                            <input type="radio" name="Furnished" value="0" id="ct_furn_no" <?php if($filter->furnished == 0) echo "checked" ; ?>> <label for="ct_furn_no">no</label>
                           <input type="radio" name="Furnished" value="-1" id="ct_furn_dontcare" <?php if($filter->furnished == '') echo "checked" ; ?>> <label for="ct_furn_dontcare">I don't care</label>
                        </div>
                        <div class="row input_styled inlinelist hideMap petData">
                            <label class="label_title">Allow Pets:</label><br>
                            <input type="radio" name="pets" value="1" id="ct_pets_yes" <?php if($filter->pets == 1) echo "checked" ; ?>> <label for="ct_pets_yes">Yes</label>
                            <input type="radio" name="pets" value="0" id="ct_pets_no" <?php if($filter->pets == 0) echo "checked" ; ?>> <label for="ct_pets_no">no</label>
                            <input type="radio" name="pets" value="-1" id="ct_pets_dontcare" <?php if($filter->pets == "") echo "checked" ; ?>> <label for="ct_pets_dontcare">I don't care</label>
                        </div>
                    <!-- Ne pas oublier de rajouter ceci -->
                    </div>
                	<div class="row cityData">
                    	<label class="label_title">Location:</label>
                        <input type="text" name="location" value="Ho Chi Minh City" class="inputField" readonly>
                    </div>
                    <div class="row propertieData">
                        <label class="label_title">Properties:</label>
                        <select class="select_styled white_select" name="properties" id="properties" style='width:145px;'>

                                <option value="all" <?php if($filter->properties === '') echo "selected" ; ?>>All</option>
                                <option value="house" <?php if($filter->properties === 'house') echo "selected" ; ?>>House</option>
                                <option value="appartment" <?php if($filter->properties === 'appartment') echo "selected" ; ?>>Appartment</option>            
                                <option value="office" <?php if($filter->properties === 'office') echo "selected" ; ?>>Office</option>
                                <option value="land" <?php if($filter->properties === 'land') echo "selected" ; ?>>Land</option>
                                <option value="room" <?php if($filter->properties === 'room') echo "selected" ; ?>>Room</option>
                            </select>
                    </div>
                    <div class="row availableData">
                        <label class="label_title">Available:</label>
                        <select class="select_styled white_select" name="available" id="available" style='width:145px;'>
                                <?php
                                    $month_minus0 = mktime(date("H"), date("i"), date("s"), date("m")+1, date("d"), date("Y"));
                                    $month_minus1 = mktime(date("H"), date("i"), date("s"), date("m")+2, date("d"), date("Y"));
                                    $month_minus2 = mktime(date("H"), date("i"), date("s"), date("m")+3, date("d"), date("Y"));
                                    $month_minus3 = mktime(date("H"), date("i"), date("s"), date("m")+4, date("d"), date("Y"));
                                    $month_minus4 = mktime(date("H"), date("i"), date("s"), date("m")+5, date("d"), date("Y"));
                                    $month_minus5 = mktime(date("H"), date("i"), date("s"), date("m")+6, date("d"), date("Y"));
                                    $month_minus6 = mktime(date("H"), date("i"), date("s"), date("m")+7, date("d"), date("Y"));
                            ?>
                        <option value='all'>I don't care</option>
                        <option value='<?php echo date("F Y", $month_minus0); ?>'>This Month</option>
                        <option value='<?php echo date("F Y", $month_minus1 ); ?>'><?php echo date("F Y", $month_minus0 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus2 ); ?>'><?php echo date("F Y", $month_minus1 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus3 ); ?>'><?php echo date("F Y", $month_minus2 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus4 ); ?>'><?php echo date("F Y", $month_minus3 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus5 ); ?>'><?php echo date("F Y", $month_minus4 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus6 ); ?>'>After <?php echo date("F Y", $month_minus5 ); ?></option>
                                
                            </select>
                    </div>
                    
                    <div class="row input_styled priceData">
                    	<label class="label_title">Price ($):</label>
                        <input type="text" name="price_from" id="price_from" value="<?php if($filter->price_min != ''){echo $filter->price_min;}else{echo 'min';} ?>" class="inputField inputSmall"  onFocus="if (this.value == 'min') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'min';}"> &nbsp;&nbsp;&nbsp;
                        
                        <input type="text" name="price_to" id="price_to" value="<?php if($filter->price_max != ''){echo $filter->price_max;}else{echo 'max';} ?>" class="inputField inputSmall"  onFocus="if (this.value == 'max') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'max';}">
                    </div>
                    <div class="row input_styled squareData">
                        <label class="label_title">Square (m²):</label>
                        <input type="text" name="square_from" id="square_from" value="min" class="inputField inputSmall" o onFocus="if (this.value == 'min') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'min';}"> &nbsp;&nbsp;&nbsp;
                        
                        <input type="text" name="square_to" id="square_to" value="max" class="inputField inputSmall"  onFocus="if (this.value == 'max') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'max';}">
                    </div>
                    
                    <div class="row input_styled checklist bed_affiche">
                    	<label class="label_title">Bedrooms:</label>

                        
                        <?php
                               
                                    
                                    //echo $bed_filter;
                                    $bed_1 =0;
                                    $bed_2 =0;
                                    $bed_3 =0;
                                    $bed_4 =0;
                                    $bed_5 =0;
                                    $reponse = $bdd->query($filter->request());
                                    $donnees = $reponse->fetchAll();
                                    foreach ($donnees as $key => $value) {
                                        switch ($value['bed_portfolio']) {
                                            case '1':
                                                $bed_1++;
                                                break;
                                            case '2':
                                                $bed_2++;
                                                break;
                                            case '3':
                                                $bed_3++;
                                                break;
                                            case '4':
                                                $bed_4++;
                                                break;
                                            case '5':
                                                $bed_5++;
                                                break;
                                            
                                            default:
                                                # code...
                                                break;
                                        }
                                       
                                    }

                                     echo"<input type='checkbox' name='filter_beds_1' id='filter_beds_1' class='filter_bed' value='1' checked> <label for='filter_beds_1' id='label_beds_1' class='checked'>1 (".$bed_1." offers) </label>";
                                     echo"<input type='checkbox' name='filter_beds_2' id='filter_beds_2' class='filter_bed' value='2' checked> <label for='filter_beds_2' id='label_beds_2' class='checked'>2 (".$bed_2." offers) </label>";
                                     echo"<input type='checkbox' name='filter_beds_3' id='filter_beds_3' class='filter_bed' value='3' checked> <label for='filter_beds_3' id='label_beds_3' class='checked'>3 (".$bed_3." offers) </label>";
                                     echo"<input type='checkbox' name='filter_beds_4' id='filter_beds_4' class='filter_bed' value='4' checked> <label for='filter_beds_4' id='label_beds_4' class='checked'>4 (".$bed_4." offers) </label>";
                                     echo"<input type='checkbox' name='filter_beds_5' id='filter_beds_5' class='filter_bed' value='5' checked> <label for='filter_beds_5' id='label_beds_5' class='checked'>5 (".$bed_5." offers) </label>";


                                   /*
                                        if($filter->bed == $k && $k !=5)
                                        echo"<input type='checkbox' name='filter_beds_".$k."' id='filter_beds_".$k."' class='filter_bed' value='".$k."' checked> <label for='filter_beds_".$k."' id='label_beds_".$k."' class='checked'>".$k." (".$bed." offers) </label>";
                                    elseif($filter->bed == $k && $k ==5)
                                        echo"<input type='checkbox' name='filter_beds_".$k."' id='filter_beds_".$k."' class='filter_bed' value='".$k."' checked> <label for='filter_beds_".$k."' id='label_beds_".$k."' class='checked'>".$k."+ (".$bed." offers) </label>";
                                    elseif($k ==5 && $filter->bed != $k)
                                        echo"<input type='checkbox' name='filter_beds_".$k."' id='filter_beds_".$k."' class='filter_bed' value='".$k."'> <label for='filter_beds_".$k."' id='label_beds_".$k."'>".$k."+ (".$bed." offers) </label>";
                                    else
                                        echo"<input type='checkbox' name='filter_beds_".$k."' id='filter_beds_".$k."' class='filter_bed' value='".$k."'> <label for='filter_beds_".$k."' id='label_beds_".$k."'>".$k." (".$bed." offers) </label>";
                                     */
                                
                        ?>
                      
                    </div>

                    <div class="row input_styled checklist bath_affiche">
                        <label class="label_title">Bathrooms:</label>
                        <?php
                                       //echo $bed_filter;
                                    $bath_1 =0;
                                    $bath_2 =0;
                                    $bath_3 =0;
                                    $bath_4 =0;
                                    $bath_5 =0;
                                    $reponse = $bdd->query($filter->request());
                                    $donnees = $reponse->fetchAll();
                                    foreach ($donnees as $key => $value) {
                                        switch ($value['bath_portfolio']) {
                                            case '1':
                                                $bath_1++;
                                                break;
                                            case '2':
                                                $bath_2++;
                                                break;
                                            case '3':
                                                $bath_3++;
                                                break;
                                            case '4':
                                                $bath_4++;
                                                break;
                                            case '5':
                                                $bath_5++;
                                                break;
                                            
                                            default:
                                                # code...
                                                break;
                                        }
                                       
                                    }

                                     echo"<input type='checkbox' name='filter_baths_1' id='filter_baths_1' class='filter_bath' value='1' checked> <label for='filter_baths_1' id='label_baths_1' class='checked'>1 (".$bath_1." offers) </label>";
                                     echo"<input type='checkbox' name='filter_baths_2' id='filter_baths_2' class='filter_bath' value='2' checked> <label for='filter_baths_2' id='label_baths_2' class='checked'>2 (".$bath_2." offers) </label>";
                                     echo"<input type='checkbox' name='filter_baths_3' id='filter_baths_3' class='filter_bath' value='3' checked> <label for='filter_baths_3' id='label_baths_3' class='checked'>3 (".$bath_3." offers) </label>";
                                     echo"<input type='checkbox' name='filter_baths_4' id='filter_baths_4' class='filter_bath' value='4' checked> <label for='filter_baths_4' id='label_baths_4' class='checked'>4 (".$bath_4." offers) </label>";
                                     echo"<input type='checkbox' name='filter_baths_5' id='filter_baths_5' class='filter_bath' value='5' checked> <label for='filter_baths_5' id='label_baths_5' class='checked'>5 (".$bath_5." offers) </label>";


                        ?>
                          </div>

                   <div class="row input_styled inlinelist hideMap swimmingData">
                        <label class="label_title">Swimming pool:</label><br>
                        <input type="radio" name="pool" value="1" id="ct_yes" > <label for="ct_yes">Yes</label>
                        <input type="radio" name="pool" value="0" id="ct_no"> <label for="ct_no">No</label>
                        <input type="radio" name="pool" value="2" id="ct_both" checked> <label for="ct_both">I don't care</label>
                    </div>
                    
                    <!--<div class="row input_styled checklist">
                    	<label class="label_title">Square Ft:</label>
                        <input type="checkbox" name="filter_square_1" id="filter_square_1" value="1000"> <label for="filter_square_1">1000 (85 offers)</label>
                        <input type="checkbox" name="filter_square_2" id="filter_square_2" value="1500"> <label for="filter_square_2">1500 (19 offers)</label>
                        <input type="checkbox" name="filter_square_3" id="filter_square_3" value="2000"> <label for="filter_square_3">2000 (36 offers)</label>
                        <input type="checkbox" name="filter_square_4" id="filter_square_4" value="2500"> <label for="filter_square_4">2500+ (12 offers)</label>
                    </div>-->
                   
                    <div class="row inputlist">
                         <?php if($filter->district != '') { ?>
                        <div class="custom-input addField_remove">
                        <input class="autocomplete ui-autocomplete-input" type="text" value="<?php echo $filter->district; ?>" name="<?php echo $filter->district; ?>" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                        <span id="rem_district_3" class="rem_district"></span>
                        </div>                    
                    <?php } ?>
                    	<label class="label_title">District:</label>
                       <div class="custom-input addField_add"><input class='autocomplete' type="text" name="district_4" class="addField" value="Add NEW Zone" onFocus="if (this.value == 'Add NEW Zone') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Add NEW Zone';}"><span id="add_district_4" class='add_district'></span></div>                                                
                    </div>
                    
                    <div class="row rowSubmit">
                    	<input type="submit" value="FILTER RESULTS" class="btn-submit confirm">
                    </div>
                    
                </form>            
		</div>
        <?php include('include/javascript/properties_list.js');
              //include('include/newsletter.php'); 
         ?>
        
       
        
        
    </div>
    <!--/ sidebar -->
    <div class="clear"></div>
    
    
</div>
</div>
<!--/ middle -->

<div class="footer" style='height:70px;'>
<div class="footer_inner"style='height:300px;'>
   
    <script type="text/javascript">
         <?php
                    if(isset($_SESSION['client_id'])){


                ?>
                    $('.link-save-empty').live('click',function(e){
                        var favoris = $(this);
                        e.preventDefault();
                        var id = $(this).data('id');
                        //alert(id);
                        $.post('admin/php/script.favoris.php',{id:id,action:'add'},function(e){
                            favoris.addClass('link-save');
                            favoris.removeClass('link-save-empty');
                              $.jGrowl("The property n°"+id+" has been added on your favoris", {
                                                                        header: 'Favoris',
                                                                        sticky: true,
                                                                        theme: 'warning'
                                                                    });
                             $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
                        });

                    });

                     $('.link-save').live('click',function(e){
                        var favoris = $(this);
                        e.preventDefault();
                        var id = $(this).data('id');
                        //alert(id);
                        $.post('admin/php/script.favoris.php',{id:id,action:'delete'},function(e){
                            favoris.addClass('link-save-empty');
                            favoris.removeClass('link-save');
                              $.jGrowl("The property n°"+id+" has been deleted from your favoris", {
                                                                        header: 'Favoris',
                                                                        sticky: true,
                                                                        theme: 'warning'
                                                                    });
                             $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
                        });

                    });



                <?php
                }

                ?>
                $('#price_from').keyup(function () { 
                    this.value = this.value.replace(/[^0-9\.]/g,'');
                });
                $('#price_to').keyup(function () { 
                    this.value = this.value.replace(/[^0-9\.]/g,'');
                });
                $('#square_from').keyup(function () { 
                    this.value = this.value.replace(/[^0-9\.]/g,'');
                });
                $('#square_to').keyup(function () { 
                    this.value = this.value.replace(/[^0-9\.]/g,'');
                });
    </script>
        <!--/ footer col 1 -->
        
      
        <!--/ footer col 2 -->
        
              
        <!--/ footer col 3 -->
        <?php include('include/footer.php'); ?>
        
        <!--/ footer col 4 -->
        
     
</div>    
</div>
</div>
        <script src="js/jquery.customInput.js"></script>
        <script type="text/javascript" src="admin/js/plugins/jGrowl/jquery.jgrowl.js"></script>
        <link rel='stylesheet' type='text/css' href='admin/css/plugins/jquery.jgrowl.css'>

</body>
</html>
