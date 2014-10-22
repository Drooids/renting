<?php
include('admin/php/server.php');
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

<title>Home Saigon - Properties Details (Print Version)</title>
<link href='http://fonts.googleapis.com/css?family=Lato:400italic,400,700,900|Bitter' rel='stylesheet'>

<link href="style.css" media="screen" rel="stylesheet">
<link href="print.css" media="screen" rel="stylesheet">

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

<script>
tf_script={"TF_THEME_PREFIX":"homequest","blog_id":"55","network_site_url":"http:\/\/themefuse.com\/demo\/wp\/","TFUSE_THEME_URL":"http:\/\/themefuse.com\/demo\/wp\/homequest\/wp-content\/themes\/homequest","ajaxurl":"http:\/\/themefuse.com\/demo\/wp\/homequest\/wp-admin\/admin-ajax.php"}
</script>


<!--[if IE 7]> <link href="css/ie.css" media="screen" rel="stylesheet"> <![endif]-->
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
        <strong>Home Saigon - Real Estate</strong>
        </div>
        
        
        
        <div class="header_phone">
        
			<span>phone number</span>
        </div>
        
        <div class="clear"></div>
    </div>
    
    <div class="header_bot">
    	
        <div class="search_main">
        	
            <form action="#" method="post" class="form_search">
            
        	<div class="search_col_1">            
	        	<p class="search_title"><strong>SEARCHING FOR:</strong></p>
                
                <div class="row">
                <label class="label_title">Advanced:</label>
                	<div class="on-off"><a href="javascript:void(0)" id="search_advanced">ON &nbsp; &nbsp;&nbsp; &nbsp; OFF</a></div>
					<input type="hidden" name="search_advanced" value="0"/>
                </div>
                
            </div>
            
            <div class="search_col_2">
            	<div class="row rowInput tf-seek-long-select-form-item-header" id="tf-seek-input-select-location_select">
					<label class="label_title">Location:</label>
						<select class="select_styled" name="location_id">
						<option value="0" >All locations</option>
						<option value="37" >Jersey City</option>
						<option value="42" >London</option>
						<option value="47" >New York</option>
						<option value="48" >Newark</option>
						</select>
				</div>
                
                <div class="row rangeField">
                	<label class="label_title">Price Range:</label>
                    
                	<div class="range-slider">
                    <input id="price_range" type="text" name="price_range" value="200000;750000">
                    </div>
                    
                    <div class="clear"></div>
                </div>
				
				<script>
					jQuery(document).ready(function($) {
						// Price Range Input
						$("#price_range").slider({ 
					  			from: 0,
								to: 3000000,
								scale: [0, '|', '250k', '|', '500k', '|', '750k', '|', '1,25Mil', '|', '2Mil', '|', '>3Mil'],
								heterogeneity: ['50/750000','75/1500000'],
								limits: false, 
								step: 1000,
								smooth: true,
								dimension: '&nbsp;$',
								skin: "round_gold"
						});									
					});
				</script>
                
                <div class="row selectField rowHide">
                	<label class="label_title">No of rooms:</label>
                    
                    	<select class="select_styled" name="bedrooms" id="sopt_range_slider_range_bedrooms_select" title="Beds">
						<option value="0" selected="selected" >Beds</option>
						<option value="1"  >1 Bed</option>
						<option value="2"  >2 Beds</option>
						<option value="3"  >3 Beds</option>
						<option value="4"  >4 Beds</option>
						<option value="5"  >5+ Beds</option>
						</select>
                    
                    <label class="label_title">No of Baths:</label>    
                        <select class="select_styled" name="baths" id="sopt_range_slider_range_baths_select" title="Baths">
						<option value="0" selected="selected" >Baths</option>
						<option value="1"  >1 Bath</option>
						<option value="2"  >2 Baths</option>
						<option value="3"  >3 Baths</option>
						<option value="4"  >4 Baths</option>
						<option value="5"  >5+ Baths</option>
						</select>
                </div>
                
                <div class="row rangeField rowHide">
                	<label class="label_title">Square feet:</label>
                    
                	<div class="range-slider">
                    <input id="square_range" type="text" name="square_range" value="1500;4000">
                    </div>
                    
                    <div class="clear"></div>
                </div>
				
				<script>
					jQuery(document).ready(function($) {
						// Square Range Input
						$("#square_range").slider({ 
					  			from: 0,
								to: 10000,
								scale: ['0','1000','2000','3000','5000','7500','>10000'],
								heterogeneity: ['50/3000'],
								limits: false, 
								step: 100,
								smooth: true,								
								skin: "round_gold"
						});	
					});
				</script>
                
			</div> 
            
            <div class="search_col_3">      
            	
                <div class="row form_switch">                   
                    <div class="switch">
                        <label for="switch1" class="cb-enable selected"><span>Sale</span></label>
                        <label for="switch2" class="cb-disable"><span>Rent</span></label>
                        <input type="radio" id="switch1" name="field" checked>
                        <input type="radio" id="switch2" name="field">
                    </div>
                </div>    
                
                <div class="row submitField">
                	<input type="submit" value="Search" id="search_submit" class="btn_search">
                </div>  
	        	
            </div>               
 
            </form>   
             
            <script>
					jQuery(document).ready(function($) {
						
						// Switch Type	
						$(".cb-enable").click(function(){
								var parent = $(this).parents('.switch');
								$(parent).removeClass('switch_off');								
								$('.cb-disable',parent).removeClass('selected');
								$(this).addClass('selected');
								
							});
						$(".cb-disable").click(function(){
								var parent = $(this).parents('.switch');
								$(parent).addClass('switch_off');
								$('.cb-enable',parent).removeClass('selected');
								$(this).addClass('selected');
								
						});					
						
					});
				</script>        
        </div>   
		<!--/ search_main -->
    	    	
		        
    </div>
    
    <div class="clear"></div>
    </div>
</div>
</div>
<!--/ header -->
<script>
    window.TF_SEEK_MAP_HOME_MARKER = function(opts){
        this.map_       = opts.map;
        this.html_      = '';
        this.latLng_    = Object();
    };

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
                div.innerHTML           = '<strong>You</strong><span>are</span>here';

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

            this.createHomeMarker();

            this.createInfoBox();

            this.load_markers();
        },

        load_markers: function(){
            var This = this;

                        $.post(tf_script.ajaxurl,
                {
                    action:     'tf_action',
                    tf_action:  'tf_action_ajax_seek_get_google_maps_markers'
                },
                function(data){

                    This.show_markers(data, 268);
                },
                'json'
            );
                    },

        createInfoBox: function(){
            this.infoBox = new TF_SEEK_CUSTOM_POST_INFO_BOX({map: this.map});
        },

        createHomeMarker: function(){
            if( parseInt(268) ){
                var position = new google.maps.LatLng( parseFloat( 40.693297 ), parseFloat(-74.001011) );

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
                    $.post(tf_script.ajaxurl,
                        {
                            action:     'tf_action',
                            tf_action:  'tf_action_ajax_seek_get_google_maps_post_permalink',
                            post_id:    post_id
                        },
                        function(data){
                            window.location.replace(data.permalink);
                        },
                        'json'
                    );
                });
            }

            var mrkr = null;
            for(var post_id in markers){
                if(parseInt(exclude_id) == parseInt(post_id)) continue;
                mrkr = markers[post_id];

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng( mrkr.lat, mrkr.lng),
                    map: This.map,
                    icon: new google.maps.MarkerImage('http://themefuse.com/demo/wp/homequest/wp-content/themes/homequest/images/gmap_marker.png',
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
            var mapOptions = {
                zoom: 2,
                center: new google.maps.LatLng(0, 0),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: false,
                scrollwheel: false
            };

                            mapOptions.zoom     = 14;
                mapOptions.center   = new google.maps.LatLng( parseFloat( 40.693297 ), parseFloat(-74.001011) );
            
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
	<?php
         if($_GET['id']){
                $key = $_GET['id'];
                    $reponse = $bdd->query("SELECT id_portfolio,nom_portfolio,link_portfolio,img_portfolio,type_portfolio,actif_portfolio,text_portfolio,
                        bath_portfolio,bed_portfolio,price_portfolio,parking_portfolio,city_portfolio,district_portfolio,adress_portfolio,user_portfolio,
                        team_portfolio,pool_portfolio,type_size_portfolio,service_portfolio,detail_portfolio
                                        FROM portfolio where id_portfolio ='$key'");

            
                    $donnees = $reponse->fetchAll();
                    if(count($donnees) !=0){
                        $link_portfolio=$donnees[0]['link_portfolio'];
                        $nom_portfolio=$donnees[0]['nom_portfolio'];
                        $img_portfolio=$donnees[0]['img_portfolio'];
                        $id_portfolio=$donnees[0]['id_portfolio'];
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
                        $team_portfolio=$donnees[0]['team_portfolio'];
                        $type_size_portfolio=$donnees[0]['type_size_portfolio'];
                        $service_portfolio=$donnees[0]['service_portfolio'];
                        
                    }else{
                        $link_portfolio='';
                        $detail_portfolio='';
                        $nom_portfolio='';
                        $img_portfolio='';
                        $id_portfolio='';
                        $type_portfolio='';
                        $actif_portfolio='';
                        $text_portfolio='';
                        $text_portfolio='';
                        $bath_portfolio='';
                        $bed_portfolio='';
                        $price_portfolio='';
                        $parking_portfolio='';
                        $pool_portfolio='';
                        $district_portfolio='';
                        $adress_portfolio='';
                        $city_portfolio='';
                        $team_portfolio='';
                        $type_size_portfolio='';
                        $service_portfolio='';
                    }
                        
               }else{
                        $link_portfolio='';
                         $detail_portfolio='';
                        $nom_portfolio='';
                        $img_portfolio='';
                        $id_portfolio='';
                        $type_portfolio='';
                        $city_portfolio='';
                        $actif_portfolio='';
                        $text_portfolio='';
                        $text_portfolio='';
                        $bath_portfolio='';
                        $bed_portfolio='';
                        $price_portfolio='';
                        $parking_portfolio='';
                        $pool_portfolio='';
                        $district_portfolio='';
                        $adress_portfolio='';
                        $team_portfolio='';
                        $type_size_portfolio='';
                        $service_portfolio='';
               }

    ?>
    <!-- content -->
    <div class="grid_8 content">
        
        <div class="re-full">
            <h1><?php echo $nom_portfolio; ?></h1>
        
            <div class="block_hr">
                <div class="inner">
                    <?php
                        if($service_portfolio =='rent')
                            echo"<div class='re-price'><strong>$".$price_portfolio."/month</strong></div>";
                        else
                            echo"<div class='re-price'><strong>$".$price_portfolio."</strong></div>";
                    ?>
                    
                    <em><?php echo $bed_portfolio; ?> beds   <span class="separator">|</span>   <?php echo $bath_portfolio; ?> baths   <span class="separator">|</span>District <?php echo $district_portfolio;?></em>
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
                                                       echo" <a href='admin/upload/uploads/".$nom_fichier."' title='".$nom_portfolio."'><img src='admin/upload/uploads/".$nom_fichier."' alt='' height='281' width='446'></a>";
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
                            var pfpc = function(self){
                                self.anchor.prettyPhoto({social_tools:false});
                            };                      
                            $("#rePhoto").PikaChoose({buildFinished:pfpc, carousel:true, carouselVertical:true, transition:[0],autoPlay:false,animationSpeed:300});
                        }
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
                <?php  echo $detail_portfolio; ?>
                    

                <div class="clear"></div>
            </div>
            <div class="re-description">
                <?php  echo $text_portfolio; ?>
                
                
               </div>
            <input type="button" value="Print" class="btn-submit " onClick="window.print()" style="float:right;background-position: -376px -36px;text-align: center;
    text-indent: inherit;
    display: block;
    height: 36px;
    line-height: 36px;
    margin: 15px auto;
    padding: 0 0 3px;
    width: 179px;
    color: #FFCC1D;
    font-family: 'Bitter',serif;
    font-size: 13px;
    overflow: hidden;
    text-shadow: 1px 1px 1px #000000;
    text-transform: uppercase;
    border: medium none;
    outline-width: 0;">
            
            
            <div class="block_hr re-meta-bot">
                <div class="inner">
                    <a href="properties-list.html" class="link-back"><strong>&lt; Back to Properties Listing</strong></a> 
                                       
                    <a href="#" class="link-save tooltip" title="Save Offer">Save Offer</a> <a href="properties-details-print.html" class="link-print tooltip" title="Print this Page">Print this Page</a> <a href="#" class="link-sendemail tooltip" title="Send to a Friend">Send to a Friend</a>
                </div>  
            </div>
                
        </div>
  
        
    </div>
    <!--/ content -->
    
    <!-- sidebar -->
    <div class="grid_4 sidebar">
    	
        <!-- contact agent -->
        <div class="widget-container widget_adv_filter">
			<h3 class="widget-title">CONTACT THE AGENT:</h3>
				
            	<form action="#" method="get" class="form_white agent_form">
                
                	<div class="row">
                    	<label class="label_title">First Name:</label>
                        <input type="text" name="first_name" class="inputField" value="enter your first name" onfocus="if (this.value == 'enter your first name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your first name';}">
                    </div>
                    
                    <div class="row">
                    	<label class="label_title">Last Name:</label>
                        <input type="text" name="last_name" class="inputField" value="enter your last name" onfocus="if (this.value == 'enter your last name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your last name';}">
                    </div>
                    
                    <div class="row input_styled inlinelist">
                    	<label class="label_title">How should we contact you:</label><br>
                        <input type="radio" name="contact_type" value="ct_email" id="ct_email" checked> <label for="ct_email">by Email</label>
                        <input type="radio" name="contact_type" value="ct_phone" id="ct_phone"> <label for="ct_phone">by Phone</label>
                        <input type="radio" name="contact_type" value="ct_both" id="ct_both"> <label for="ct_both">both</label>
                    </div>
                    
                    <div class="row">
                    	<label class="label_title">Your Email*:</label>
                        <input type="text" name="email" class="inputField" value="enter your email" onfocus="if (this.value == 'enter your email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your email';}">
                    </div>
                    
                    <div class="row">
                    	<label class="label_title">Your Phone:</label>
                        <input type="text" name="phone" class="inputField" value="enter your phone" onfocus="if (this.value == 'enter your phone') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your phone';}">
                    </div>
                    
                    <div class="row">
                    	<label class="label_title">Message*:</label>
                        <textarea rows="4" cols="5" name="message" class="textareaField">I would like to inquire about  the property at 5012 Sea Chase Street San Diego, CA 92130.</textarea>
                    </div>
                    
               	  <div class="row input_styled rowCheck">
                        <input type="checkbox" name="newsletter_subscribe" id="newsletter_subscribe" value="1" checked> <label for="newsletter_subscribe">I’d like to receive <a href="index.html">HomeQuest</a> newsletter</label>

                    	<input type="submit" value="CONTACT AGENT" class="btn-submit">
                  </div>
                    
                </form>            
                
                <div class="agent_phone">
                    <span>OR CALL US RIGHT NOW</span>
                    <p><strong>1-800-531-HOME</strong></p>
				</div>
		</div>
        <!--/ contact agent -->
             
        
    </div>
    <!--/ sidebar -->
    <div class="clear"></div>
    
    
</div>
</div>
<!--/ middle -->

<!-- carousel after content -->
<div class="before_content after_content">
	<div class="container_12">
    	<strong class="carusel_title">SIMILAR PROPERTIES IN THE AREA</strong>
        
        	<div class="carusel_list carusel_small">
				<ul id="similar_properties" class="jcarousel-skin-tango">					
                    <li>
                        <div class="item_image"><a href="properties-details.html"><img src="images/temp/property_01.jpg" width="218" height="125" alt=""></a></div>
                        <div class="item_name"><a href="properties-details.html">3 beds, 2 baths, $295,000</a></div>
                    </li>
                    <li>
                        <div class="item_image"><a href="properties-details.html"><img src="images/temp/property_02.jpg" width="218" height="125" alt=""></a></div>
                        <div class="item_name"><a href="properties-details.html">6 beds, 3 baths, $655,000</a></div>                       
                    </li>
                    <li>
                        <div class="item_image"><a href="properties-details.html"><img src="images/temp/property_03.jpg" width="218" height="125" alt=""></a></div>
                        <div class="item_name"><a href="properties-details.html">1 beds, 1 baths, $139,000</a></div> 
                    </li>
                    <li>
                        <div class="item_image"><a href="properties-details.html"><img src="images/temp/property_04.jpg" width="218" height="125" alt=""></a></div>
                        <div class="item_name"><a href="properties-details.html">7 beds, 3&frac12; baths, $1,249,000</a></div> 
                    </li>
                    <li>
                        <div class="item_image"><a href="properties-details.html"><img src="images/temp/property_07.jpg" width="218" height="125" alt=""></a></div>
                        <div class="item_name"><a href="properties-details.html">16,117 Sq.Ft., $1,180,000</a></div> 
                    </li>
                    <li>
                        <div class="item_image"><a href="properties-details.html"><img src="images/temp/property_06.jpg" width="218" height="125" alt=""></a></div>
                        <div class="item_name"><a href="properties-details.html">3 beds, 2 baths, $295,000</a></div> 
                    </li>                    
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

<div class="footer" style='height:70px;'>
<div class="footer_inner"style='height:300px;'>
    <div class="container_12"style='height:100px;'>
    
    
        <!--/ footer col 1 -->
        
      
        <!--/ footer col 2 -->
        
              
        <!--/ footer col 3 -->
        
        
        <!--/ footer col 4 -->
        
        <div class="clear"></div>
                
    </div>
</div>    
</div>

</div>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&#038;ver=1.0'></script>
<script type='text/javascript' src='http://themefuse.com/demo/wp/homequest/wp-content/themes/homequest/js/jquery.gmap.min.js?ver=3.3.0'></script>
</body>
</html>
