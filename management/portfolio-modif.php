<?php 
include('php/class.load.php');
        if(isset($_SESSION['username'])) {
        	//echo $_SESSION['username'];
        	$user_team = $_SESSION['team_user'];
        	$user_id = $_SESSION['user_id'];
                } else {
                    header('location: login.html');

                }
                include 'php/server.php';

                if(isset($_GET['id'])){
                	$id=$_GET['id'];
                	$object = new portfolio($id);
                	

                }else{
                		header('Location: portfolio.php');   
                }


               

               $add = '';
				

				$reponse = $bdd->query("SELECT right_user,team_user FROM users WHERE user_id = '$user_id' ");

				$donnees = $reponse->fetchAll();
					$right_user=$donnees[0]['right_user'];
					$team_user=$donnees[0]['team_user'];

					if($right_user == 0){

					}elseif($right_user == 1){
							$reponse = $bdd->query("SELECT user_id FROM users WHERE team_user = '$team_user'");
							$donnees = $reponse->fetchAll();
							for($k=0;$k<count($donnees);$k++){
								$user_id_team=$donnees[$k]['user_id'];
								if($k == 0){
									$add=$add." AND  user_id = '$user_id_team' ";
								}else{
									$add=$add." OR user_id = '$user_id_team' ";
								}

							}
					}else{
						$add = " AND user_id = '$user_id'";
					}
	
            ?>
<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 ie" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Admin Panel | Easy Com</title>
		<meta name="description" content="">
		<meta name="author" content="Easycom | www.easycom-media.com">
		<meta name="robots" content="index, follow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- jQuery plUpload -->
		<link rel="stylesheet" href="css/plugins/jquery.plupload.queue.css">
		<link rel="stylesheet" href="css/plugins/jquery.ui.plupload.css">
		<!-- jQuery jWYSIWYG Styles -->
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.jwysiwyg.css'>
		<!-- Bootstrap wysihtml5 Styles -->
		<link rel='stylesheet' type='text/css' href='css/plugins/bootstrap-wysihtml5.css'>

		<!-- Style -->
		<link rel="stylesheet" href="css/organon-blue.css">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		
		<!-- JS Libs -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js"><\/script>')</script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	 	 
		<script src="jquery/function.js"></script>
		<script src="js/libs/modernizr.js"></script>
		<script src="js/libs/selectivizr.js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;key=AIzaSyD3VSb2IYSKdPdcDWFffqh0pGy9S47Klzk"></script>
		
		<script>
		var id_gallery = "<?php echo $object->link_portfolio; ?>";
			  $(function() {
			    $( ".sortable" ).sortable({ 
			    	placeholder: "ui-state-highlight",
			    	start: function( event, ui ) {
						    $( this ).sortable( 'refreshPositions' );
						   		var height = $('.ui-state-default').height();
								var width = $('.ui-state-default').width();
						    $(".ui-state-highlight").css('height',height+'px');
						    $(".ui-state-highlight").css('width',width+'px');
						  },
				    stop: function(event,ui){
						  	var info='';
						  	$('.info').each(function(index){
						  		var name = $(this).data('click');
						  		if(index == 0){
						  		 info = name;
						  		//alert("hello");
						  		}else{
						  			info=info+','+name;
						  		}
						  		
							    
							    
							    
							});
							
							SetGallery(id_gallery,'','',info,'sortable',null);
								
						  }
					
					

				});
			    $( ".sortable" ).disableSelection();
			    
			  });
	    </script>
		<script>
			$(document).ready(function(){
				
				

				function loadPage(gallery){
					$('.biblio').load('load/galleryaffiche.php?gallery='+gallery, function() {
							});
				}

				loadPage(id_gallery);


				
				var username = "<?php echo $_SESSION['username'];?>";
				var user_id = "<?php echo $_SESSION['user_id'];?>";
				// Tooltips
				$('.user-profile a, .dashboard .badge').tooltip({
					placement: 'top'
				});
				$('.brand, .navbar-search input').tooltip({
					placement: 'bottom'
				});
				$('.main-navigation .badge').tooltip({
					placement: 'right'
				});
				//alert(username);
				afficheProfil(username);
				
				var id_portfolio='<?php echo $object->id_portfolio; ?>';
				var gallery  = "<?php echo $object->link_portfolio;?>";
				var type_portfolio ='';
				var id_select  =0;
				var thumbnail_selected = null;
				var id_bdd =0;
				var new_link =0;
				var nom_portfolio=0;
				//var checked =0;
				var key ='nothing';
				var text ="";
				var title ='';
				var pool ='';
				var parking ='';
				var price='';
				var service='';
				var district='';
				var adress='';
				var city='';
				var bed='';
				var bath='';
				var detail='';
				var lat='<?php echo $object->lat_portfolio; ?>';
				var lng='<?php echo $object->lng_portfolio; ?>';
				var pets ='';
				var furnished = '';
				var type_portfolio ='';
				var available_date='';
				
				if(lat != ''){
					
				}else{
					lat='10.774711';
					
				}

				if(lng != ''){
					
				}else{
					
					lng='106.702902';
				}
				
				


				
				$("#select-gallery").change(function () {

					id_gallery = $("#select-gallery option:selected").attr('value');
					loadPage(id_gallery);

				});

				// initialisation
				var val = $('input:radio[name=service]:checked').attr('value');
						//alert(val);
						if(val == "rent"){
							//alert('salut');
						
							
							$('.rent').show();
						}else if(val =='sale'){
							
							$('.rent').hide();
							
						}else{
							$('.rentcheck').attr('checked',true);
							
							$('.rent').show();
						}
				$('input:radio[name=service]').click(function () {
					//alert('salut');
						
						var val = $(this).attr('value');
						//alert(val);
						if(val == "rent"){
							//alert('salut');
						
							
							$('.rent').show();
							$('.hide_service').show();
						}else{
							
							$('.rent').hide();
							$('.hide_service').hide();
						}
						
						
					
				//	return false;
				});

				$('.ajouter').live("click", function(){
					location.replace('galleryAffiche.php?gallery='+id_gallery+'&return_type=portfolio&id='+id_portfolio);
					return false;
				});
				$('#createNew').live("click", function(){
					var newNom = $('#nomNew').attr('value');
					$.post("php/SetGallery.php",{id:'',nom:newNom,img:'',link:'',autre:'new',return_id:1},
						 function(data) {
						 	//alert(data.id_gallery);
						 	$.post("php/SetPortfolio_gallery.php",{id:id_portfolio,gallery_change:data.id_gallery},
								 function() {
								 	//alert(data.id_gallery);
								 	
								 	location.replace('galleryAffiche.php?gallery='+data.id_gallery+'&return_type=portfolio&id='+id_portfolio);
								 	
		   					 });
						 	
						 	
   					 });
					
					return false;
				});
				
				$('.confirm').live("click", function(){

					id_bdd = "<?php  echo $object->id_portfolio;?>";
					//alert(id_bdd);
					gallery = "<?php echo $object->link_portfolio;?>";
					
					available = $('input:radio[name=available]:checked').attr('value');
					available_date = $('.datepicker').attr('value');

					type_portfolio = $('input:radio[name=type]:checked').attr('value');
					//alert(gallery);
					title = $('#title').attr('value');
					text = $('#textarea').attr('value');
					//text = htmlEncode(text);
					text = text.replace(/\"/g, "&quot;");
					text = text.replace(/\'/g, '&apos;');

					detail= $('#detail').attr('value');
					detail = detail.replace(/\"/g, "&quot;");
					detail = detail.replace(/\'/g, '&apos;');

					
					if($('#pool').attr('checked') =='checked'){
						pool=1;
					}
					if($('#parking').attr('checked') =='checked'){
						parking=1;
					}
					price= $('#appendedPrependedInput').attr('value');
					//alert(price);
					service=$('input:radio[name=service]:checked').attr('value');
						pets=$('input:radio[name=pets]:checked').attr('value');
						furnished=$('input:radio[name=Furnished]:checked').attr('value');

					

					checked=$('input:radio[name=available]:checked').attr('value');
					district=$("#district option:selected").attr('value');
					//alert(district);
					adress=$('#adress').attr('value');
					adress = adress.replace(/\"/g, "&quot;");
					adress = adress.replace(/\'/g, '&apos;');
					lat=$('.latitude').attr('value');
					lng=$('.longitude').attr('value');
					gps=lat+','+lng;
					//alert(adress);

					city=$("#city option:selected").attr('value');
					//alert(city);
					bed=$('input:radio[name=bed]:checked').attr('value');
					//alert(type_portfolio);
					bath=$('input:radio[name=bath]:checked').attr('value');
					//alert(available+' '+available_date);
					SetPortfolio(id_bdd,available,available_date,pets,furnished,title,text,type_portfolio,'false',gallery,checked,pool,parking,bed,bath,price,adress,city,district,service,user_id,gps,detail,0,null);
					//SetPortfolio_2nd(id_bdd,pets,furnished);
			
				     return false;
				});
				

				$('.delete').live('click',function(){
					
					var id_fichier=$(this).data('click')
					//alert(id_fichier);
					DeleteImgGallery(id_fichier,id_gallery);
					return false;

				});


	function DeleteImgGallery(id_fichier,id_gallery){
		$.get("upload/deleteGallery.php",{id_fichier:id_fichier,id_gallery:id_gallery},
		   function(data){
		   loadPage(id_gallery);
		   	
		   }, "json");

	}


    var map = new google.maps.Map(document.getElementById("mapdiv"), {
      center: new google.maps.LatLng(lat,lng),
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      //size:(42,18)
    });
    
    //
    // initialize marker
    //
    var image = 'img/gmap.png';
    var marker = new google.maps.Marker({
      position: map.getCenter(),
      draggable: true,
      map: map,
      icon: image,
      html:'<strong>It\'s</strong><span>Here</span>'
    });
    //
    // intercept map and marker movements
    //
    google.maps.event.addListener(map, "idle", function() {
      marker.setPosition(map.getCenter());
      $('.longitude').html(map.getCenter().lng().toFixed(6));
      $('.longitude').attr('value',map.getCenter().lng().toFixed(6));
      $('.latitude').html(map.getCenter().lat().toFixed(6));
      $('.latitude').attr('value',map.getCenter().lat().toFixed(6));
      //document.getElementById("mapoutput").innerHTML = "<a href=\"https://maps.google.com/maps?q=" + encodeURIComponent(map.getCenter().toUrlValue()) + "\" target=\"_blank\" style=\"float: right;\">Go to maps.google.com</a>Latitude: " + map.getCenter().lat().toFixed(6) + "<br>Longitude: " + map.getCenter().lng().toFixed(6);
    });
    google.maps.event.addListener(marker, "dragend", function(mapEvent) {
      map.panTo(mapEvent.latLng);
    });
    
				
				
			});
		</script>
		
	
		 <style>
  
  .ui-state-highlight { height: 1.5em; line-height: 1.2em; width:367px; height:210px; background: transparent; margin-right:20px;}
  </style>
	</head>
	<body>
			
		<!-- Main page header -->
		<header class="navbar">
			
			<!-- Navbar style -->
			<div class="navbar-inner">
				
				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				<a class="btn btn-alt btn-primary btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				
				<!-- Sample logo -->
				<a href="index.html" class="brand" title="Back to homepage">Admin Panel by Easy Com</a> 
				
				<!-- Everything you want hidden at 940px or less, place within here -->
				<div class="nav-collapse">
				
					<!-- Header navigation -->
					<?php if($user_team == 0) { ?>
					<nav>
						<ul role="navigation">
								<li ><a href="accueil.php"><span class="fam-application-view-columns"></span>Index</a></li>
								<li ><a href="list.php"><span class="fam-application-view-columns"></span>List</a></li>
								<!--<li class='active'><a href="portfolio.php"><span class="fam-application-view-columns"></span>Portfolio</a></li>-->
								<li ><a href="agency.php"><span class="fam-application-view-columns"></span>Agency</a></li>
								<li ><a href="company.php"><span class="fam-application-view-columns"></span>Company</a></li>
								<li ><a href="owner.php"><span class="fam-application-view-columns"></span>Owner</a></li>
								
						</ul>
					</nav>
					<?php }else{ ?>



					<?php } ?>
					<!-- /Header navigation -->
					
					<!-- Logout -->
					<a class="navbar-logout" href="php/logout.php"><span class="awe-off"></span>Log out</a>
					
					<!-- Header search box -->
					<!--<form class="form-search pull-right">
						<input type="text" class="search-query" name="search" title="Enter the search term" placeholder="Search&#8230;" autocomplete="on">
						<button type="submit" class="btn btn-alt btn-primary">Search</button>
					</form>-->
					<!-- /Header search box -->
				
				</div>
			
			</div>
			<!-- /Navbar style -->
		
		</header>
		<!-- /Main page header -->
		
		<!-- Full page alert -->
		
		<!-- /Full page alert -->
		
		<!-- Main page container -->
		<div class="container-fluid">
		
			<!-- Left (navigation) side -->
			<div class="sidebar">
			
				<!-- Sidebar user info -->
				<figure class="user-profile"><div id='nickname-pict'></div>
					
					<figcaption>
						<a id='nickname' href="#"></a>
						<em id='job'></em>
						<ul class="user-profile-actions">
							<li><a href="#" title="Open mailbox"><span class="awe-envelope-alt"></span></a></li>
							<li><a href="#" title="Personal settings"><span class="awe-cogs"></span></a></li>
							<li><a href="#" title="Hide sidebar"><span class="awe-eye-close"></span></a></li>
							<li><a href="#" title="Logout"><span class="awe-signout"></span></a></li>
						</ul>
					</figcaption>
				</figure>
				<!-- /Sidebar user info -->
				
				<!-- Sidebar actions -->
				
				<!-- /Sidebar actions -->
				
				<!-- Main navigation -->
				<nav class="main-navigation" role="navigation">
					<ul>
						<li >
							<a href="index.php" class="no-submenu"><span class="fam-house"></span>Dashboard</a>
						</li>
						<li class="active">
							<a href="portfolio.php" class="no-submenu"><span class="fam-application-form"></span>Properties</a>
						</li>
						
						<li>
							<a href="gallery.php" class="no-submenu"><span class="fam-picture"></span>Gallery</a>
							
						</li>
						<li >
							<a href="#" class="no-submenu"><span class="fam-briefcase"></span>Ajout de fichier</a>
							<ul>
								<li ><a href="uploader.php">Uploader</a></li>
								<li><a href="biblio.php">Bibliotheque</a></li>
								
							</ul>
						</li>
						<!--<li>
							<a href="calendar.html" class="no-submenu"><span class="fam-calendar-view-day"></span>Calendar<span class="badge badge-info" title="27 tasks this week">27</span></a>
						</li>
						<li>
							<a href="ui-buttons.html" class="no-submenu"><span class="fam-rosette"></span>UI & Buttons</a>
						</li>
						<li>
							<a href="typo.html" class="no-submenu"><span class="fam-text-padding-left"></span>Typography</a>
						</li>
						<li>
							<a href="grid.html" class="no-submenu"><span class="fam-cog"></span>Grid</a>
						</li>
						<li>
							<a href="#"><span class="fam-heart"></span>Goodies</a>
							<ul>
								<li><a href="goodies.html">Goodies</a></li>
								<li><a href="401.html">Error 401</a></li>
								<li><a href="403.html">Error 403</a></li>
								<li><a href="404.html">Error 404</a></li>
								<li><a href="500.html">Error 500</a></li>
								<li><a href="503.html">Error 503</a></li>
							</ul>
						</li>-->
					</ul>
				</nav>
				<!-- /Main navigation -->
				
				<!-- Sidebar box: Dark -->
				<!--<section class="sidebar-box sidebar-dark">
					<h2>Dark sidebar box</h2>
					<p>Lorem ipsum dolor sit amet, consectetur <a href="#">adipiscing</a> elit. Maecenas feugiat euismod lorem ut vulputate. Vivamus sodales, elit ac mollis iaculis, dui elit cursus tortor, sit amet ultrices odio sem eget massa.</p>
					<p class="separator">Vivamus sodales, elit ac mollis iaculis, dui elit cursus tortor, sit amet ultrices odio sem eget massa.</p>
					<p class="separator">Phasellus aliquam malesuada blandit. Donec adipiscing sem erat.</p>
					<a href="#" class="btn btn-mini btn-alt btn-primary">Read more &rarr;</a>
					<a href="#" class="thumbnail"><img src="img/sample_content/sample-image-250x150.png" alt="Sample Image"></a>
				</section>-->
				<!-- /Sidebar box: Dark -->
				
			</div>
			<!-- /Left (navigation) side -->
			
			<!-- Right (content) side -->
			<div class="content-block" role="main">
			<div >
						<header>
								<h2 id='title-gallery'>Modification</h2>
						</header>
			</div>
			<div class="row-fluid">
				<ul class="breadcrumb">
					<li><a href="#"><span class="awe-home"></span></a><span class="divider"></span></li>
					<li ><a href="portfolio.php">Product</a><span class="divider"></span></li>
					<li class="active"><?php  echo $object->nom_portfolio;?></li>
				</ul>
					<!-- Data block -->
				<article class="span10 data-block nested">
					<div id='portfolio-product' >
								
<div class='span12' style='margin-left:0px;'>
	<div class='span6'>
		<div class="control-group">
			<label class='control-label' for='inlineCheckbox'>Title</label>
			<div class='controls'>
				<input type='text' id='title' value='<?php  echo $object->nom_portfolio;?>'  > 
			</div>
		</div>
	</div>
	<div class='span6'>
		<div class="control-group">
			<label class='control-label' for='inlineCheckbox'>Options</label>
			<div class='controls'>
				<div class="btn-group" data-toggle="buttons-radio">
					<button class="btn  active menu" data-click='available_div'>Available</button>
					<button class="btn menu" data-click='service_div'>Services</button>
					<button class="btn menu" data-click='property_div'>Properties</button>
					<button class="btn menu" data-click='room_div'>Informations</button>
					<button class="btn menu" data-click='other_div'>Other</button>
				</div>
			</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
$('.menu').live('click',function(){
	var older = $('.btn-group > .active');
		older_div = older.data('click');
		$('#'+older_div).hide();
		older.removeClass('active');

	$(this).addClass('active');
	$('#'+$(this).data('click')).show();
	//alert($(this).data('click'));
	return false;
})
</script>
<!-- ICI on coupe l'ecran en 4 -->
<div class='span12' id='available_div' style='margin-left:0px;' >
	<div class="span6">
		<article class="data-block nested">
			<div class="control-group">
				<label class='control-label' for='available'>Date of availability</label>
				<div class='controls'>
					<div class="input-append">
						<?php
						if($object->date_available_portfolio != ''){
							$date_picker = $object->date_available_portfolio;
						}else{
							$date_picker = date('Y/m/d');
						}
						
						?>
						<input class="datepicker input-small" value="<?php echo $date_picker; ?>" type="text"><span class="add-on"><i class="awe-calendar"></i></span>
					</div>
				</div>
			</div>
		</article>		
	</div>
	<div class="span6">
		<article class="data-block nested">
			<div class="control-group">
				<label class='control-label' for='available'>Product available?</label>
				<div class='controls'>
				<label class='radio'>
					<input type='radio' name='available' value='0' <?php if($object->result_portfolio == 0) echo"checked";?> >Yes
				</label>
				<label class='radio'>
					<input type='radio' name='available' value='1'<?php if($object->result_portfolio == 1) echo"checked";?> >No
				</label>
				</div>
			</div>
		</article>
	</div>
</div>
	
<!-- ICI on coupe l'ecran en 4 -->

<!-- ICI on coupe l'ecran en 4 -->

<div class='span12' id='other_div' style='display:none; margin-left:0px;'>
	<div class="span6" >
		<article class="data-block nested">
			<div class="control-group">
				<label class='control-label' for='inlineCheckbox'>Swimming Pool ?</label>
				<div class='controls'>
				<label class='checkbox inline'>
			
				<input type='checkbox' id='pool' value='yes'  <?php if($object->pool_portfolio == 1) echo"checked";?>> Yes

				</div>
			</div>
		</article>
	</div>
	<div class="span6" >
		<article class="data-block nested">
			<div class="control-group">
				<label class='control-label' for='inlineCheckbox'>Parking ?</label>
				<div class='controls'>
				<label class='checkbox inline'>
			
				<input type='checkbox' id='parking' value='yes'  <?php if($object->parking_portfolio == 1) echo"checked";?>> Yes

				</div>
			</div>
		</article>
	</div>
							
</div>	


<div class='span12' id='service_div' style='display:none; margin-left:0px;'>
	<div class='span4'>
		<!-- Service -->
		<article class="data-block nested">
			<div class="control-group">
				<label class='control-label' for='service'>Service</label>
				<div class='controls'>
					<label class='radio'>
						<input type='radio' class='rentcheck' name='service' value='rent' <?php if($object->service_portfolio == 'rent') echo"checked";?> >Rent
					</label>
					<label class='radio'>
						<input type='radio' class='salecheck' name='service' value='sale' <?php if($object->service_portfolio == 'sale') echo"checked";?> >Sale
					</label>
					
					
				</div>
			</div>
		</article>
	</div>
	<div class='span4'>
		<article class="data-block nested">
			<?php if($object->service_portfolio == 'rent'){ ?>
			<div class="control-group hide_service" >
			<?php }else{ ?>
			<div class="control-group hide_service" style='display:none;'>
			<?php } ?>
			
				<label class='control-label' for='pets'>Allow Pets</label>
				<div class='controls'>
					<label class='radio'>
						<input type='radio' name='pets' value='1' <?php if($object->pets_portfolio == 1) echo"checked";?> >Yes
					</label>
					<label class='radio'>
						<input type='radio' name='pets' value='0'<?php if($object->pets_portfolio == 0) echo"checked";?> >No
					</label>
					
				</div>
			</div>
		</article>
	</div>
	<div class='span4'>
		<article class="data-block nested">
			<?php if($object->service_portfolio == 'rent'){ ?>
			<div class="control-group hide_service" >
			<?php }else{ ?>
			<div class="control-group hide_service" style='display:none;'>
			<?php } ?>
			
				<label class='control-label' for='Furnished'>Furnished</label>
				<div class='controls'>
					<label class='radio'>
						<input type='radio' name='Furnished' value='1' <?php if($object->furnished_portfolio == 1) echo"checked";?> >Yes
					</label>
					<label class='radio'>
						<input type='radio' name='Furnished' value='0'<?php if($object->furnished_portfolio == 0) echo"checked";?> >No
					</label>
					
				</div>
			</div>
		</article>
	</div>
</div>
<div class='span12' id='room_div' style='display:none; margin-left:0px;'>
	<div class='span6'>
	<article class="data-block nested">
		<div class="control-group">
				<label class='control-label' for='bed'>Beds</label>
				<div class='controls'>
					<label class='radio'>
						<input type='radio' name='bed' value='1' <?php if($object->bed_portfolio == 1) echo"checked";?> >1
					</label>
					<label class='radio'>
						<input type='radio' name='bed' value='2'<?php if($object->bed_portfolio == 2) echo"checked";?> >2
					</label>
					<label class='radio'>
						<input type='radio' name='bed' value='3' <?php if($object->bed_portfolio == 3) echo"checked";?>>3
					</label>
					<label class='radio'>
						<input type='radio' name='bed' value='4'<?php if($object->bed_portfolio == 4) echo"checked";?> >4
					</label>
					<label class='radio'>
						<input type='radio' name='bed' value='5' <?php if($object->bed_portfolio == 5) echo"checked";?>>5
					</label>
					<label class='radio'>
						<input type='radio' name='bed' value='more'<?php if($object->bed_portfolio == 'more') echo"checked";?> >More
					</label>
			</div>
		</div>
	</article>
	</div>
	<div class='span6'>
		<article class="data-block nested">
			<div class="control-group">
				<label class='control-label' for='bath'>Baths</label>
				<div class='controls'>
							<label class='radio'>
								<input type='radio' name='bath' value='1' <?php if($object->bath_portfolio == 1) echo"checked";?> >1
							</label>
							<label class='radio'>
								<input type='radio' name='bath' value='2'<?php if($object->bath_portfolio == 2) echo"checked";?> >2
							</label>
							<label class='radio'>
								<input type='radio' name='bath' value='3' <?php if($object->bath_portfolio == 3) echo"checked";?>>3
							</label>
							<label class='radio'>
								<input type='radio' name='bath' value='4'<?php if($object->bath_portfolio == 4) echo"checked";?> >4
							</label>
							<label class='radio'>
								<input type='radio' name='bath' value='5' <?php if($object->bath_portfolio == 5) echo"checked";?>>5
							</label>
							<label class='radio'>
								<input type='radio' name='bath' value='more'<?php if($object->bath_portfolio == 'more') echo"checked";?> >More
							</label>
				</div>
			</div>
		</article>
	</div>
</div>
<div class='span12' id='property_div' style='display:none; margin-left:0px;' >
	<div class="span6">
		<article class="data-block nested">
			<!-- Type -->
			<div class="control-group">
				<label class='control-label' for='type'>Property type</label>
				<div class='controls'>
					<label class='radio'>
						<input type='radio' class='appartment' name='type' value='appartment' <?php if($object->type_portfolio == 'appartment') echo"checked";?> >Appartment
					</label>
					<label class='radio'>
						<input type='radio' class='house' name='type' value='house' <?php if($object->type_portfolio == 'house') echo"checked";?> >House
					</label>
					<label class='radio'>
						<input type='radio' class='land' name='type' value='land' <?php if($object->type_portfolio == 'land') echo"checked";?> >Land
					</label>
					
					
				</div>
			</div>
		</article>
	</div>
	<div class="span6">
		<article class="data-block nested">
			<div class="control-group">
			<div class="form-controls">
				<div class="input-prepend input-append">
					<span class="add-on">I would like</span>
					<input id="appendedPrependedInput" class="span4" type="text" splaceholder="1 200" value='<?php  echo $object->price_portfolio;?>'>
					<button class="btn" type="button">$</button>
					<span class="add-on rent">per month</span>
				</div>
			</div>
		</div>
	</article>
	</div>
</div>	


<div class='span12' style='margin-left:0px;'>								
					<div class='control-group'>
						<div class='controls'>
							<label class='control-label' for='inlineCheckbox'>Gallery</label>
							<button data-click='' class='btn btn-alt  btn-inverse ajouter'  type='submit' style='float:right; margin-right: 10px;'>Add</button>
							<div class="data-container">
								<section>
									<p>All the pictures of the gallery</p>
									<form class="form-gallery">
									<ul  class="thumbnails biblio sortable">	
									</ul>
									</form>
								</section>
							</div>							
						</div>
					</div>
</div>
<div class='span12'>
	<div class='span4'>
		<article class="data-block nested">
		<div class="control-group">
			<label class="control-label" for="select">City</label>
			<div class="controls">
				<select id="city">
					<option selected>HCMC</option>
				</select>
				</div>
				<label class="control-label" for="select">District</label>
				<div class="controls">
				<select id="district">
					<option value='district 1'>District 1 </option>
					<option value='district 2'>District 2</option>
					<option value='district 3'>District 3</option>
					<option value='district 4'>District 4</option>
					<option value='district 5'>District 5</option>
					<option value='district 6'>District 6</option>
					<option value='district 7'>District 7</option>
					<option value='district 8'>District 8</option>
					<option value='district 9'>District 9</option>
					<option value='district 10'>District 10</option>
					<option value='district 11'>District 11</option>
					<option value='district 12'>District 12</option>
					<option value='Go Vap district'>Go Vap District</option>
					<option value='Tan Binh district'>Tan Binh District</option>
					<option value='Tan Phu district'>Tan Phu District</option>
					<option value='Binh Thanh district'>Binh Thanh District</option>
					<option value='Phu Nhuan district'>Phu Nhuan District</option>
					<option value='Thu Duc district'>Thu Duc District</option>
					<option value='Bin Tan district'>Bin Tan District</option>
				</select>
				</div>
				<label class="control-label" for="select">Adress</label>
				<div class='controls'>
					<input type='text' id='adress' style='width:90%;' value='<?php  echo $object->adress_portfolio;?>'  > 
				</div>
				<label class='control-label' for='select'>GPS Coordinate</label>
				<div class='controls'>	
					<span class="uneditable-input latitude">Latitude</span>
					<span class="uneditable-input longitude">Longitude</span>	
				</div>
		</div>
		</article>
	</div>
	<div class='span8'>
		<article class="data-block nested">
			<div class='control-group'>
				<div id='mapdiv' style='width:100%; height:300px; '>

				</div>
				
			</div>
		</article>
	</div>
</div>	
											
<article class="span12 data-block nested" style='margin-left:0px;'>
								<div class="control-group">
									<label class="control-label" for="select">Details</label>
									<div class='controls'>
									
											<textarea id="detail" class="wysiwyg" rows="8" ><?php echo $object->detail_portfolio;   ?></textarea>
										
										
										</br>
										</div>
								</div>
</article>
<article class="span12 data-block nested" style='margin-left:0px;'>	
								<div class="control-group">
									<label class="control-label" for="select">Description</label>
									<div class='controls'>
									
											<textarea id="textarea" class="wysiwyg" rows="8" ><?php echo $object->text_portfolio;   ?></textarea>
										
										
										</br>
										<button data-click='' class='btn btn-alt btn-large btn-primary confirm'  type='submit' style='margin-top:20px;'>Save changes</button>
									</div>
								</div>	
</article>


					
			</div>
		</article>
	</div>

			<!-- /Right (content) side -->
		
		</div>
		<!-- Main page container -->
		
		<!-- Scripts -->
		<script src="js/navigation.js"></script>

		<!-- Bootstrap scripts -->
		<!--
		<script src="js/bootstrap/bootstrap-tooltip.js"></script>
		<script src="js/bootstrap/bootstrap-dropdown.js"></script>
		<script src="js/bootstrap/bootstrap-alert.js"></script>
		<script src="js/bootstrap/bootstrap-collapse.js"></script>
		<script src="js/bootstrap/bootstrap-transition.js"></script>
		-->
		<script src="js/bootstrap/bootstrap.min.js"></script>
		

		<script src="js/plugins/jWYSIWYG/jquery.wysiwyg.js"></script>
		
		
		
		<!-- Wysihtml5 -->
		
		<!-- Highlight gallery item when clicked -->
		
		<script>
			$(document).ready(function() {
					
				

						   $('.wysiwyg').wysiwyg({
					controls: {
						bold          : { visible : true },
						italic        : { visible : true },
						underline     : { visible : true },
						strikeThrough : { visible : true },
						
						justifyLeft   : { visible : true },
						justifyCenter : { visible : true },
						justifyRight  : { visible : true },
						justifyFull   : { visible : true },
			
						indent  : { visible : true },
						outdent : { visible : true },
			
						subscript   : { visible : true },
						superscript : { visible : true },
						
						undo : { visible : true },
						redo : { visible : true },
						
						insertOrderedList    : { visible : true },
						insertUnorderedList  : { visible : true },
						insertHorizontalRule : { visible : true },
						
						cut   : { visible : true },
						copy  : { visible : true },
						paste : { visible : true }
					}
				});
						  
				
				
				
			    
			   
			});

			
		</script>
		<!-- Datepicker -->
		<script src="js/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script>
			$(document).ready(function() {
				
				$('.datepicker').datepicker({
					"autoclose": true
				});

			});
		</script>
		
	</body>
</html>
