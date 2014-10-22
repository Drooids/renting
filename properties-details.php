<?php ob_start();
session_start();
include('admin/php/server.php');

         if($_GET['id']){
                $key = $_GET['id'];
                    $reponse = $bdd->query("SELECT id_portfolio,nom_portfolio,link_portfolio,img_portfolio,type_portfolio,actif_portfolio,text_portfolio,
                        bath_portfolio,bed_portfolio,price_portfolio,parking_portfolio,city_portfolio,district_portfolio,adress_portfolio,user_portfolio,
                        team_portfolio,pool_portfolio,type_size_portfolio,service_portfolio,detail_portfolio,lat_portfolio,lng_portfolio
                                        FROM portfolio where id_portfolio ='$key' AND actif_portfolio = 1");

            
                    $donnees = $reponse->fetchAll();
                        
                    if(count($donnees) !=0){
                        include('admin/php/class.portfolio.php');
                        include('admin/php/class.gallery.php');
                        include('admin/php/class.user.php');
                        include('admin/php/class.client.php');
                        $link_portfolio=$donnees[0]['link_portfolio'];
                        $nom_portfolio=$donnees[0]['nom_portfolio'];
                        $img_portfolio=$donnees[0]['img_portfolio'];
                        $id_portfolio=$donnees[0]['id_portfolio'];
                          $object = new portfolio($id_portfolio);
                        $type_portfolio=$donnees[0]['type_portfolio'];
                        $actif_portfolio=$donnees[0]['actif_portfolio'];

                        $text_portfolio=$donnees[0]['text_portfolio'];
                        $detail_portfolio=$donnees[0]['detail_portfolio'];
                       // $text_portfolio=html_entity_decode($text_portfolio, ENT_NOQUOTES,'UTF-8');

                        $bath_portfolio=$donnees[0]['bath_portfolio'];
                        $bed_portfolio=$donnees[0]['bed_portfolio'];
                        // Bath and bed
                            if($bath_portfolio == 'more')
                                $bath_portfolio='5+';
                   
                            if($bed_portfolio == 'more')
                                $bed_portfolio='5+';
                        $price_portfolio=$donnees[0]['price_portfolio'];

                        $parking_portfolio=$donnees[0]['parking_portfolio'];
                        $pool_portfolio=$donnees[0]['pool_portfolio'];

                        $district_portfolio=$donnees[0]['district_portfolio'];
                        $city_portfolio=$donnees[0]['city_portfolio'];
                        $adress_portfolio=$donnees[0]['adress_portfolio'];
                        $lat_portfolio=$donnees[0]['lat_portfolio'];
                        $lng_portfolio=$donnees[0]['lng_portfolio'];

                        $team_portfolio=$donnees[0]['team_portfolio'];
                        $type_size_portfolio=$donnees[0]['type_size_portfolio'];
                        $service_portfolio=$donnees[0]['service_portfolio'];
                        
                    }else{
                        header('Location: index.php');
                    }
                        
               $firstGallery = new gallery($link_portfolio);
               $firstImage = $firstGallery->GetFirstImage();
               $firstText_portfolio = explode('<ul', $text_portfolio);
               $firstText_portfolio = $firstText_portfolio[0];
               $firstText_portfolio = str_replace('<p>','', $firstText_portfolio);
               $firstText_portfolio = str_replace('</p>','', $firstText_portfolio);
                    }

require 'admin/php/Mobile_Detect.php';
require 'admin/php/php-browser-detection.php';
$infoBrowser = get_browser_info();
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
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
<!-- FB meta tag -->
<meta property="og:title" content="<?php echo $type_portfolio; ?> for <?php echo $service_portfolio; ?>"/>
<meta property="og:image" content="http://home-saigon.com/admin/upload/uploads/<?php echo $id_portfolio."/".$firstImage; ?>"/>
<meta property="og:site_name" content="Home Saigon "/>
<meta property="og:url" content="http://home-saigon.com/properties-details.php?id=<?php echo $id_portfolio; ?>"/>
<meta property="og:description" content="<?php echo $firstText_portfolio; ?>"/>
<meta property="og:type" content="Website"/>

<title>Home Saigon - Properties Details</title>
<link href='http://fonts.googleapis.com/css?family=Lato:400italic,400,700,900|Bitter' rel='stylesheet'>

<link href="style.css" media="screen" rel="stylesheet">
<link href="screen.css" media="screen" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- Mobile optimized -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<script src="js/libs/modernizr-2.5.3.min.js"></script>
<script src="js/libs/respond.min.js"></script>
<link href="print.css" media="print" rel="stylesheet">

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

<script src="js/jquery.prettyPhoto.js"></script>
<link href="css/prettyPhoto.css" rel="stylesheet">
<script src="js/jquery.pikachoose.js"></script>
<link href="css/pikachoose.css" rel="stylesheet">
<script src="js/three.min.js"></script>
<link rel="stylesheet" type="text/css" href="Personnal.css">


<!--[if IE 7]> <link href="css/ie.css" media="screen" rel="stylesheet"> <![endif]-->
<link href="custom.css" media="screen" rel="stylesheet">
</head>

<body>
<?php include('admin/php/analytic.php'); ?>
<!-- Facebook like -->


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
    	
       
		<!--/ search_main -->
    	    	
		        
    </div>
    
    <div class="clear"></div>
    </div>
</div>
</div>
<!--/ header -->
<script>

    function SetDevis(other,id,email,phone,message,contact_type,firstname,lastname,newsletter,connected){
                    $.post("admin/php/SetDevis.php",{other:other,id:id,email:email,phone:phone,message:message,contact_type:contact_type,firstname:firstname,lastname:lastname,newsletter:newsletter,connected:connected},
                         function() {
                            
                            //alert("saved !");
                     });
            
                }


    window.TF_SEEK_MAP_HOME_MARKER = function(opts){
        this.map_       = opts.map;
        this.html_      = '';
        this.latLng_    = Object();
    };
    
    var NewLat = '<?php echo $lat_portfolio; ?>';
    var NewLng = '<?php echo $lng_portfolio; ?>';

    jQuery(document).ready(function($){
  
        window.TF_SEEK_MAP_HOME_MARKER.prototype = new google.maps.OverlayView();

        window.TF_SEEK_MAP_HOME_MARKER.prototype.setLatLng = function(latLng){
            this.latLng_    = latLng;
        };

        window.TF_SEEK_MAP_HOME_MARKER.prototype.show = function(html){
            if(typeof html != 'undefined'){
                this.html_ = html;
            }

            this.setMap(this.map_);
        };

        window.TF_SEEK_MAP_HOME_MARKER.prototype.hide = function(){
            this.setMap(null);
        }

        /* Creates the DIV representing this InfoBox in the floatPane.  If the panes
        * object, retrieved by calling getPanes, is null, remove the element from the
        * DOM.  If the div exists, but its parent is not the floatPane, move the div
        * to the new pane.
        * Called from within draw.  Alternatively, this can be called specifically on
        * a panes_changed event.
        */
        window.TF_SEEK_MAP_HOME_MARKER.prototype.createElement = function() {
            var panes   = this.getPanes();
            var div     = this.div_;
            var This    = this;

            if (!div) {

                // This does not handle changing panes.  You can set the map to be null and
                // then reset the map to move the div.
                div = this.div_         = document.createElement("div");
                div.className           = "map-location current-location";
                div.style.position      = 'absolute';
                div.style.display       = 'none';
                div.innerHTML           = '<strong>It\'s</strong><span>Here</span>';

                panes.floatPane.appendChild(div);
            } else if (div.parentNode != panes.floatPane) {
                // The panes have changed.  Move the div.
                div.parentNode.removeChild(div);
                panes.floatPane.appendChild(div);
            } else {
                // The panes have not changed, so no need to create or move the div.
            }
        };

        /* Redraw the Bar based on the current projection and zoom level
        */
        window.TF_SEEK_MAP_HOME_MARKER.prototype.draw = function() {
            // Creates the element if it doesn't exist already.
            this.createElement();

            var pixPosition       = this.getProjection().fromLatLngToDivPixel(this.latLng_);

            var jDiv              = $(this.div_);

            // Now position our DIV based on the DIV coordinates of our bounds
            var float_offset_x      = pixPosition.x - parseInt(pixPosition.x);
                float_offset_x      = (float_offset_x<0 ? -float_offset_x : float_offset_x);
            var float_offset_y      = pixPosition.x - parseInt(pixPosition.x);
                float_offset_y      = (float_offset_y<0 ? -float_offset_y : float_offset_y);

            this.div_.style.left    = (pixPosition.x - ((jDiv.width()/2)+float_offset_x) ) + "px";
            this.div_.style.top     = (pixPosition.y - parseInt(jDiv.height()) - 12 + float_offset_y ) + "px";
            this.div_.style.display = 'block';
        };

        /* Creates the DIV representing this InfoBox
        */
        window.TF_SEEK_MAP_HOME_MARKER.prototype.remove = function() {
            if (this.div_) {
                this.div_.parentNode.removeChild(this.div_);
                this.div_ = null;
            }
        };
    });
</script>
<script>
    window.TF_SEEK_CUSTOM_POST_INFO_BOX = function(opts){
        this.map_       = opts.map;
        this.html_      = '';
        this.latLng_    = Object();
    };

    jQuery(document).ready(function($){
        window.TF_SEEK_CUSTOM_POST_INFO_BOX.prototype = new google.maps.OverlayView();

        window.TF_SEEK_CUSTOM_POST_INFO_BOX.prototype.setHtml = function(html){
            this.html_      = html;
        };

        window.TF_SEEK_CUSTOM_POST_INFO_BOX.prototype.setLatLng = function(latLng){
            this.latLng_    = latLng;
        };

        window.TF_SEEK_CUSTOM_POST_INFO_BOX.prototype.show = function(html){
            if(typeof html != 'undefined'){
                this.html_ = html;
            }

            this.setMap(this.map_);
        };

        window.TF_SEEK_CUSTOM_POST_INFO_BOX.prototype.hide = function(){
            this.setMap(null);
        }

        /* Creates the DIV representing this InfoBox in the floatPane.  If the panes
        * object, retrieved by calling getPanes, is null, remove the element from the
        * DOM.  If the div exists, but its parent is not the floatPane, move the div
        * to the new pane.
        * Called from within draw.  Alternatively, this can be called specifically on
        * a panes_changed event.
        */
        window.TF_SEEK_CUSTOM_POST_INFO_BOX.prototype.createElement = function() {
            var panes   = this.getPanes();
            var div     = this.div_;
            var This    = this;

            if (!div) {

                var tmlHtml = '\
                    <div class="map-textbox-close"></div>\
                    <div class="map-textbox-top"></div>\
                    <div class="map-textbox-mid">\
                        '+ this.html_ +'\
                    </div>\
                    <div class="map-textbox-bot"></div>\
                ';

                // This does not handle changing panes.  You can set the map to be null and
                // then reset the map to move the div.
                div = this.div_         = document.createElement("div");
                div.className           = "map-textbox";
                div.innerHTML           = tmlHtml;

                var closeImg = $('div.map-textbox-close', this.div_)
                    .first()
                    .click(function() {
                        This.hide();
                    });

                panes.floatPane.appendChild(div);
            } else if (div.parentNode != panes.floatPane) {
                // The panes have changed.  Move the div.
                div.parentNode.removeChild(div);
                panes.floatPane.appendChild(div);
            } else {
                // The panes have not changed, so no need to create or move the div.
            }
        };

        /* Redraw the Bar based on the current projection and zoom level
        */
        window.TF_SEEK_CUSTOM_POST_INFO_BOX.prototype.draw = function() {
            var map = this.map_;

            var bounds = map.getBounds();
            if (!bounds) return;

            // Creates the element if it doesn't exist already.
            this.createElement();

            var pixPosition     = this.getProjection().fromLatLngToDivPixel(this.latLng_);

            var jDiv            = $(this.div_);

            // The dimension of the infowindow
            var iwWidth     = jDiv.width();
            var iwHeight    = jDiv.height();

            // The offset position of the infowindow
            var iwOffsetX = 0;
            var iwOffsetY = 0;

            // Padding on the infowindow
            var padX = 0;
            var padY = 0;

            var position        = this.latLng_;
            var mapDiv          = map.getDiv();
            var mapWidth        = mapDiv.offsetWidth;
            var mapHeight       = mapDiv.offsetHeight;
            var boundsSpan      = bounds.toSpan();
            var longSpan        = boundsSpan.lng();
            var latSpan         = boundsSpan.lat();
            var degPixelX       = longSpan / mapWidth;
            var degPixelY       = latSpan / mapHeight;
            var mapWestLng      = bounds.getSouthWest().lng();
            var mapEastLng      = bounds.getNorthEast().lng();
            var mapNorthLat     = bounds.getNorthEast().lat();
            var mapSouthLat     = bounds.getSouthWest().lat();

            // The bounds of the infowindow
            var iwWestLng  = position.lng() + (iwOffsetX - padX) * degPixelX;
            var iwEastLng  = position.lng() + (iwOffsetX + iwWidth + padX) * degPixelX;
            var iwNorthLat = position.lat() - (iwOffsetY - padY) * degPixelY;
            var iwSouthLat = position.lat() - (iwOffsetY + iwHeight + padY) * degPixelY;

            var myOffset    = parseInt(-((position.lat() / degPixelY - (100)) - mapNorthLat / degPixelY));
            //console.log([mapWestLng, mapEastLng, mapNorthLat, mapSouthLat]);
            //console.log([myOffset]);
            //console.log([mapWestLng - position.lng(), mapEastLng - position.lng(),  mapNorthLat - position.lat(), mapSouthLat - position.lat()]);

            // Now position our DIV based on the DIV coordinates of our bounds
            var float_offset_x      = pixPosition.x - parseInt(pixPosition.x);
                float_offset_x      = (float_offset_x<0 ? -float_offset_x : float_offset_x);
            var float_offset_y      = pixPosition.x - parseInt(pixPosition.x);
                float_offset_y      = (float_offset_y<0 ? -float_offset_y : float_offset_y);

            var myTopOffset         = (myOffset > 230
                    ? parseInt(jDiv.height()) + (37+float_offset_y)
                    : 0
                    );
            this.div_.style.left    = (pixPosition.x - (60+float_offset_x) ) + "px";
            this.div_.style.top     = (pixPosition.y - myTopOffset ) + "px";
            this.div_.style.display = 'block';
        };

        /* Creates the DIV representing this InfoBox
        */
        window.TF_SEEK_CUSTOM_POST_INFO_BOX.prototype.remove = function() {
            if (this.div_) {
                this.div_.parentNode.removeChild(this.div_);
                this.div_ = null;
            }
        };
    });
</script>
<script>
    function TF_SEEK_CUSTOM_POST_GOOGLE_MAP(map_element, map_options){
        this.map        = Object();
        this.infoBox    = Object();

        // Init
        this.init(map_element, map_options);
    }
    TF_SEEK_CUSTOM_POST_GOOGLE_MAP.prototype = {
        $: jQuery,

        init: function(map_element, map_options){
            this.map        = new google.maps.Map(map_element, map_options);
            console.log(map_options);

            this.createHomeMarker();

            this.createInfoBox();

            this.load_markers();
        },

        load_markers: function(){
           
                    },

        createInfoBox: function(){
            this.infoBox = new TF_SEEK_CUSTOM_POST_INFO_BOX({map: this.map});
        },

        createHomeMarker: function(){
            if( parseInt(268) ){

                var position = new google.maps.LatLng( NewLat, NewLng);

                this.homeMarker = new TF_SEEK_MAP_HOME_MARKER({map: this.map});
                this.homeMarker.setLatLng( position );
                this.homeMarker.show();
            }
        },

        show_markers: function(markers, exclude_id){
            var This = this;

            var marker          = null;
            var marker_position = null;

            var bind_events = function(marker, mrkr, post_id){
                google.maps.event.addListener(marker, "mouseover", function(e) {
                    This.infoBox.hide();
                    This.infoBox.setLatLng(e.latLng);
                    This.infoBox.setHtml(mrkr.html);
                    This.infoBox.show();
                });
                google.maps.event.addListener(marker, "mouseout", function(e) {
                    This.infoBox.hide();

                });
                google.maps.event.addListener(marker, "click", function(e) {
                    
                });
            }

            var mrkr = null;
            for(var post_id in markers){
                if(parseInt(exclude_id) == parseInt(post_id)) continue;
                mrkr = markers[post_id];

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng( mrkr.lat, mrkr.lng),
                    map: This.map,
                    icon: new google.maps.MarkerImage('images/gmap_marker.png',
                        new google.maps.Size(34, 40),
                        new google.maps.Point(0,0),
                        new google.maps.Point(16, 40)
                    )
                });

                bind_events(marker, mrkr, post_id);
            }
        },

        utils: {
            getFloatVal: function(value){
                value = parseFloat(value);

                if(String(value) == 'NaN'){
                    value = 0;
                }

                return value;
            }
        }
    };
</script>

<!-- map before content -->
<div class="maptop">
    <div class="maptop_content" id="tf-seek-post-before-content-google-map">
        
    </div>

    <div class="maptop_pane">
        <div class="container_12">
            <div class="maptop_hidebtn">Hide the Map <span></span></div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
                      var style =[
    {
        "featureType": "administrative",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "transit",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "landscape",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.local",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "color": "#84afa3"
            },
            {
                "lightness": 52
            }
        ]
    },
    {
        "stylers": [
            {
                "saturation": -17
            },
            {
                "gamma": 0.36
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#3f518c"
            }
        ]
    }
];
            var mapOptions = {
                zoom: 2,
                center: new google.maps.LatLng(10.774711, 106.702902),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles:style,
                streetViewControl: false,
                scrollwheel: false
            };

                            mapOptions.zoom     = 14;
                mapOptions.center   = new google.maps.LatLng( parseFloat( <?php echo $lat_portfolio; ?>), parseFloat(<?php echo $lng_portfolio; ?>) );
            
            var seek_map = new TF_SEEK_CUSTOM_POST_GOOGLE_MAP(
                document.getElementById('tf-seek-post-before-content-google-map'),
                mapOptions
            );

            // Show/Hide Map
            $(".maptop_hidebtn").click(function(){
                if ($(this).closest(".maptop").hasClass("map_hide")) {
                    $(".maptop_content").stop().animate({height:'309px'},{queue:false, duration:550, easing: 'easeOutQuart'});
                    $(this).html("Hide the Map <span></span>");
                } else {
                    $(".maptop_content").stop().animate({height:'0px'},{queue:false, duration:550, easing: 'easeOutQuart'});
                    $(this).html("Show the Map <span></span>");
                }
                $(this).closest(".maptop").toggleClass("map_hide");
            });

        });
    </script>
</div>
<!--/ map before content -->

<div class="middle">
<div class="container_12">
	
    <!-- content -->
    <div class="grid_8 content">
    	
        <div class="re-full">
	        <h1><?php echo $nom_portfolio; ?></h1>
           <!-- <a href="virtual-site.php?"> <h2>Click for Virtual Visite</h2></a>-->
            <div class="block_hr">
                <div class="inner">
                    <?php
                        if($service_portfolio =='rent')
                            echo"<div class='re-price'><strong>$".$price_portfolio."/month</strong></div>";
                        else
                            echo"<div class='re-price'><strong>$".$price_portfolio."</strong></div>";
                    ?>
                	
                    <em><?php echo $bed_portfolio; ?> beds   <span class="separator">|</span>   <?php echo $bath_portfolio; ?> baths   <span class="separator">|</span> <?php echo $district_portfolio;?></em>
                </div>	
            </div>
            
            <div class="re-imageGallery">
            	
              <ul id="rePhoto" class="jcarousel-skin-pika">
                <?php

                                        $reponse = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
                                        FROM gallery where id_gallery='$link_portfolio'");

            
                                        $donnees = $reponse->fetchAll();
                                        for($k=0;$k<count($donnees);$k++){
                                            $id_gallery=$donnees[$k]['id_gallery'];
                                            $nom_gallery=$donnees[$k]['nom_gallery'];
                                            $link_gallery=$donnees[$k]['link_gallery'];
                                            $img_gallery=$donnees[$k]['img_gallery'];

                                            $link_gallery = explode(",", $link_gallery);
                                            
                                            $longueur=count($link_gallery);
                                            //echo "longueur: ".$longueur;
                                            for($j=0;$j<$longueur;$j++){
                                                $id=$link_gallery[$j];
                                                $reponse = $bdd->query("SELECT nom_fichier,id_fichier
                                                                        FROM fichier
                                                                        where id_fichier = '$id' ");

                                            
                                                $donnees = $reponse->fetchAll();
                                                if(count($donnees) != 0){
                                                    $nom_fichier=$donnees[0]['nom_fichier'];
                                                    $id_fichier=$donnees[0]['id_fichier'];

                                                    
                                                    //if($)
                                                    echo"<li>";
                                                       echo" <a href='#' title='".$nom_portfolio."' rel='prettyPhoto' style='  overflow: hidden; position: relative;' ><img class='prettyPhoto_list' src='admin/upload/uploads/".$id_portfolio."/".$nom_fichier."'  ></a>";
                                                       echo"<span><em>click on image to enlarge</em>".$nom_portfolio."</span>";
                                                    echo"</li>";
                                                    }
                                                    
                                            }

                                

                                        }
                    

                ?>
					
					
				</ul>
                
                <script>
					jQuery(document).ready(function($) {  
						// hide prettyPhoto for mobiles
						if ($(window).width() < 600) {
							$("#rePhoto").PikaChoose({carousel:true, carouselVertical:true, transition:[0],autoPlay:false,animationSpeed:300});
						} else {
												
							$("#rePhoto").PikaChoose({carousel:true, carouselVertical:true, transition:[0],autoPlay:false,animationSpeed:300});
						}
                        $(".pika-stage").live('click',function(){
                            $.fn.prettyPhoto({
                            social_tools:false,
                            show_title: false,
                            default_width: 500,
                            default_height: 344,
                            //horizontal_padding: 20,
                            keyboard_shortcuts: true,
                            allow_resize: true
                            });
                            var image_array = new Array($('.pika-stage a img').attr('src'));

                            $('.prettyPhoto_list').each(function(){
                               if($(this).attr('src') != $('.pika-stage a img').attr('src'))
                                    image_array.push($(this).attr('src'));
                            });
                            //api_images = ['admin/upload/uploads/113/image5.jpg','admin/upload/uploads/113/image5.jpg','admin/upload/uploads/113/image5.jpg'];
                           
                            $.prettyPhoto.open(image_array);
                            return false;
                        });
					});
				</script>
            	  
            </div>
            
          <script src="js/jquery.easyListSplitter.min.js"></script>
          <script>
				jQuery(document).ready(function($) {
					

                    $(".re-details ul").addClass("split_list");
                    $('.split_list').easyListSplitter({colNumber: 3});  

				});
			</script>
            <div class="re-details">
            	<h2>Property Details:</h2>
                    <?php 
                        $text_portfolio = explode('<ul', $text_portfolio);
                        echo "<ul class='split_list'".$text_portfolio[1];
                        

                   ?>
                	

                <div class="clear"></div>
            </div>
           
                <h2>About this Property:</h2>
                 <?php  echo $text_portfolio[0]; ?>

                 <!-- Virtual Visite -->

            <?php if($deviceType == 'computer' && ($infoBrowser['name'] == 'Chrome' || $infoBrowser['name'] == 'Firefox' )){ ?>
          <!--  <div class="re-description ">
                        <h2 class='infoNotFull'>Virtual Visite</h2>

                        <div id="container" style='width:100%; padding-right:10px; ' class='virtualVisite'></div>
                        <div id="info" class='infoNotFull'><a href="#" >Previous</a> - <a href="essai.html"class='FullScreen'>Full Screen <span></span></a> - <a href="#" >Next</a></div>
               </div>
<script>

            var camera, scene, renderer;

            var fov = 70,
            texture_placeholder,
            isUserInteracting = false,
            onMouseDownMouseX = 0, onMouseDownMouseY = 0,
            lon = 0, onMouseDownLon = 0,
            lat = 0, onMouseDownLat = 0,
            phi = 0, theta = 0;

            init();
            animate();

            function init() {
                var container, mesh;
                container = document.getElementById( 'container' );
                camera = new THREE.PerspectiveCamera( fov, window.innerWidth / window.innerHeight, 1, 1100 );
                camera.target = new THREE.Vector3( 0, 0, 0 );
                scene = new THREE.Scene();
                var geometry = new THREE.SphereGeometry( 500, 60, 40 );
                geometry.applyMatrix( new THREE.Matrix4().makeScale( -1, 1, 1 ) );
                var material = new THREE.MeshBasicMaterial( {
                    map: THREE.ImageUtils.loadTexture( 'images/essai-2.jpg' )
                } );
                mesh = new THREE.Mesh( geometry, material );
                scene.add( mesh );
                renderer = new THREE.WebGLRenderer();
                renderer.setSize( $('#container').width(),$('#container').width()*2/3);   // alert();
                container.appendChild( renderer.domElement );
                document.addEventListener( 'mousedown', onDocumentMouseDown, false );
                document.addEventListener( 'mousemove', onDocumentMouseMove, false );
                document.addEventListener( 'mouseup', onDocumentMouseUp, false );
                document.addEventListener( 'mousewheel', onDocumentMouseWheel, false );
            }

            function onWindowResize() {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize( window.innerWidth, window.innerHeight );
            }

            function onDocumentMouseDown( event ) {
                event.preventDefault();
                isUserInteracting = true;
                onPointerDownPointerX = event.clientX;
                onPointerDownPointerY = event.clientY;
                onPointerDownLon = lon;
                onPointerDownLat = lat;
            }

            function onDocumentMouseMove( event ) {
                if ( isUserInteracting ) {
                    lon = ( onPointerDownPointerX - event.clientX ) * 0.1 + onPointerDownLon;
                    lat = ( event.clientY - onPointerDownPointerY ) * 0.1 + onPointerDownLat;
                }
            }

            function onDocumentMouseUp( event ) {
                isUserInteracting = false;
            }

            function onDocumentMouseWheel( event ) {
                if ( event.wheelDeltaY ) {fov -= event.wheelDeltaY * 0.05;} else if ( event.wheelDelta ) {fov -= event.wheelDelta * 0.05;} else if ( event.detail ) {fov += event.detail * 1.0; }
                camera.projectionMatrix.makePerspective( fov, window.innerWidth / window.innerHeight, 1, 1100 );
                render();
            }

            function animate() {
                requestAnimationFrame( animate );
                render();
            }

            function render() {
                lat = Math.max( - 85, Math.min( 85, lat ) );
                phi = THREE.Math.degToRad( 90 - lat );
                theta = THREE.Math.degToRad( lon );
                camera.target.x = 500 * Math.sin( phi ) * Math.cos( theta );
                camera.target.y = 500 * Math.cos( phi );
                camera.target.z = 500 * Math.sin( phi ) * Math.sin( theta );
                camera.lookAt( camera.target );
                renderer.render( scene, camera );
            }

        </script>-->
            <?php } ?>
            
            
            <div class="block_hr re-meta-bot">
                <div class="inner">
                	<a href="properties.php" class="link-back"><strong>&lt; Back to Properties Listing</strong></a> 
            <?php                           
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
        ?>
                     <a href="properties-details-print.php?id=<?php echo $id_portfolio; ?>" class="link-print tooltip" title="Print this Page">Print this Page</a>
                      <!--<a href="#" class="link-sendemail tooltip" title="Send to a Friend">Send to a Friend</a>-->
                      <!--<div class="fb-like" data-href="http://localhost/renting/properties-details.php?id=23" data-send="false" data-width="450" data-show-faces="false" data-font="trebuchet ms"></div>-->
                </div>	
            </div>
                
        </div>
  
        
    </div>
    <!--/ content -->
    
    <!-- sidebar -->
    <div class="grid_4 sidebar">
    	
        
        
				<?php 
                if(isset($_SESSION['client_id'])){
                    $client = new client($_SESSION['client_id']);
                ?>
            <!-- contact agent -->
            <div class="widget-container widget_adv_filter">
                <h3 class="widget-title">CONTACT THE AGENT:</h3>
            	<form action="#" method="get" class="form_white agent_form">
                
                	<div class="row">
                    	<label class="label_title">First Name*:</label>
                        <input type="text" name="first_name" class="inputField first_name" value="<?php echo $client->name; ?>" onfocus="if (this.value == 'enter your first name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your first name';}">
                        <p id='name-erreur' style='margin-left:75px; color:red; margin-top:7px; display:none;'>Please, fill this field</p>
                    </div>
                    
                    <div class="row">
                    	<label class="label_title">Last Name:</label>
                        <input type="text" name="last_name" class="inputField last_name" value="<?php echo $client->last_name; ?>" onfocus="if (this.value == 'enter your last name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your last name';}">
                    </div>
                    
                    <div class="row input_styled inlinelist">
                    	<label class="label_title">How should we contact you:</label><br>
                        <input type="radio" name="contact_type" value="ct_email" id="ct_email" checked> <label for="ct_email">by Email</label>
                        <input type="radio" name="contact_type" value="ct_phone" id="ct_phone"> <label for="ct_phone">by Phone</label>
                        <input type="radio" name="contact_type" value="ct_both" id="ct_both"> <label for="ct_both">both</label>
                    </div>
                    
                    <div class="row">
                    	<label class="label_title">Your Email*:</label>
                        <input id='email' type="text" name="email" class="inputField" value="<?php echo $client->email; ?>" onfocus="if (this.value == 'enter your email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your email';}">
                        <p id='email-erreur' style='margin-left:75px; color:red; margin-top:7px; display:none;'>Please, fill this field</p>
                    </div>
                    
                    <div class="row">
                    	<label class="label_title">Your Phone:</label>
                        <input id='phone' type="text" name="phone" class="inputField" value="<?php echo $client->phone; ?>" onfocus="if (this.value == 'enter your phone') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your phone';}">
                    </div>
                    
                    <div class="row">
                    	<label class="label_title">Message*:</label>
                        <textarea rows="4" cols="5" name="message" id='message' class="textareaField">I would like to inquire about  the property at <?php echo $adress_portfolio.', '.$district_portfolio.', '.$city_portfolio; ?>.</textarea>
                        <p id='message-erreur' style='margin-left:75px; color:red; margin-top:7px; display:none;'>Please, fill this field</p>
                    </div>
                    
               	  <div class="row input_styled rowCheck">
                  <?php
                    if($client->newsletter == 1)
                        echo " <input type='checkbox' name='newsletter_subscribe' id='newsletter_subscribe' value='1' checked> <label for='newsletter_subscribe'>I’d like to receive <a href='index.html'>HomeVietnam</a> newsletter</label>";
                    else
                        echo " <input type='checkbox' name='newsletter_subscribe' id='newsletter_subscribe' value='0' > <label for='newsletter_subscribe'>I’d like to receive <a href='index.html'>HomeVietnam</a> newsletter</label>";

                  ?>
                        <input type='hidden' name='connected' id='connected' value='1'>
                    	<input type="submit" value="CONTACT AGENT" class="btn-submit confirm">
                  </div>
                    
                </form> 
                <div class="agent_phone">
                <span>OR CALL US RIGHT NOW</span>
                <?php $user_id = $object->user_id;
                      $userAgent = new user($user_id);

                ?>
                <p><strong> <?php echo $userAgent->phone; ?></strong></p>
                </div>
            </div>
            <!--/ contact agent -->
                <?php }else{ 
                    $actual_page = explode('/', $_SERVER["PHP_SELF"]);
                    $actual_page = end($actual_page);
                    $actual_page.="?id=".$_GET['id'];
                    ?>
                
                <iframe src="login.php?detail=1&newLocation=<?php echo $actual_page; ?>" style='width:330px; height:550px; margin-left:0px;'></iframe>
              
                <?php } ?>
                <script type="text/javascript">
                $('.confirm').live("click", function(){
                    var id = "<?php echo $key; ?>"
                  
                    var email = $('#email').attr('value');
                    var phone = $('#phone').attr('value');
                        if(phone == "enter your phone"){
                            phone="";
                        }
                    
                    var message = $('#message').attr('value');
                        message = message.replace(/\"/g, "&quot;");
                        message = message.replace(/\'/g, '&apos;');

                    var contact_type = $('input:radio[name=contact_type]:checked').attr('value');
                    var firstname = $('.first_name').attr('value');
                    var lastname = $('.last_name').attr('value');
                    var connected = $('#connected').val();
                    //alert(connected);

                    if($('.first_name').attr('value') == 'enter your first name'){
                        firstname="";
                    }
                     if($('.last_name').attr('value') == 'enter your last name'){
                        lastname="";
                    }
                    
                    //alert(name);
                    //checked
                    
                    if($('#newsletter_subscribe').attr('checked') =='checked'){
                     newsletter=1;
                    }else{
                        newsletter=0;
                    }
                    var check=0;
                    if(firstname != '' && firstname != 'enter your first name'){
                        check=check+1;
                    }
                    if(email != '' && email != 'enter your email'){
                        check=check+1;
                    }
                    if(message != '' ){
                        check=check+1;
                    }
                    if(check == 3){
                  
                            SetDevis('devis',id,email,phone,message,contact_type,firstname,lastname,newsletter,connected);
                            $.jGrowl("Thanks for your message.</br> We will contact you soon !", {
                                    header: 'Contact',
                                    sticky: true,
                                    theme: 'warning'
                                });
                            $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
                        
                        //alert(id+' '+email+' '+phone+' '+message+' '+contact_type+' '+name+' '+newsletter);
                    }
                    
                    return false;
                });
                </script>
                
		
        
             
        
    </div>
    <!--/ sidebar -->
    <div class="clear"></div>
    
    
</div>
</div>
<!--/ middle -->

<!-- carousel after content -->
<div class="before_content after_content">
	<div class="container_12">
    	<strong class="carusel_title">PROPERTIES IN THE AREA</strong>
        

        	<div class="carusel_list carusel_small">
				<ul id="similar_properties" class="jcarousel-skin-tango">
                <?php
                        $reponse = $bdd->query("SELECT *,(((acos(sin(('$lat_portfolio'*pi()/180)) * sin((lat_portfolio*pi()/180))+cos(('$lat_portfolio'*pi()/180)) * cos((lat_portfolio*pi()/180)) * cos((('$lng_portfolio'- lng_portfolio)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance
                                                FROM portfolio WHERE actif_portfolio = 1
                                                ORDER BY  distance LIMIT 0 , 6");

            
                        $donnees = $reponse->fetchAll();
                        for($k=0;$k<count($donnees);$k++){
                            $id_portfolio=$donnees[$k]['id_portfolio'];
                            $nom_portfolio=$donnees[$k]['nom_portfolio'];
                            $text_portfolio=$donnees[$k]['text_portfolio'];
                            $link_portfolio=$donnees[$k]['link_portfolio'];
                            $img_portfolio=$donnees[$k]['img_portfolio'];
                            $actif_portfolio=$donnees[$k]['actif_portfolio'];
                            $type_portfolio=$donnees[$k]['type_portfolio'];
                            $text_portfolio=$donnees[$k]['text_portfolio'];
                            $bath_portfolio=$donnees[$k]['bath_portfolio'];
                            $bed_portfolio=$donnees[$k]['bed_portfolio'];
                            $price_portfolio=$donnees[$k]['price_portfolio'];
                            $parking_portfolio=$donnees[$k]['parking_portfolio'];
                            $district_portfolio=$donnees[$k]['district_portfolio'];
                            $city_portfolio=$donnees[$k]['city_portfolio'];
                            $adress_portfolio=$donnees[$k]['adress_portfolio'];
                            $team_portfolio=$donnees[$k]['team_portfolio'];
                            $type_size_portfolio=$donnees[$k]['type_size_portfolio'];
                            $service_portfolio=$donnees[$k]['service_portfolio'];
                                 $object = new portfolio($id_portfolio);
                                 $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                                 $donnees2 = $reponse->fetchAll();
                                 $id_gallery=$donnees2[0]['id_gallery'];
                                 //Creation de la gallery
                                 $object_gallery = new gallery($id_gallery);
                                 $nom_fichier = $object_gallery->GetFirstImage();
                            echo"<li>";
                            echo"<div class='item_image'><a href='properties-details.php?id=".$id_portfolio."'><img src='admin/upload/uploads/".$id_portfolio."/".$nom_fichier."' width='218' height='125' alt=''></a></div>";
                            echo"<div class='item_name'><a href='properties-details.php?id=".$id_portfolio."'>".$bed_portfolio." beds, ".$bath_portfolio." baths, $".$price_portfolio."</a></div>";
                            echo"</li>";
                            

                        }
                ?>					
                    
                                 
                </ul>
			</div>

	  		<script>
                jQuery(document).ready(function($) {
                    $('#similar_properties').jcarousel({
                        easing: 'easeOutBack',
                        animation: 600,
						scroll: 1
                        });
                    });
            </script>
   		
  </div>
</div>
<!--/ carousel after content -->
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
    </script>
<div class="footer" style='height:70px;'>
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
