<?php 
include('php/class.load.php');

        if(isset($_SESSION['username'])) {
        	//echo $_SESSION['username'];
        	$right_user = $_SESSION['right_user'];
			$user_team = $_SESSION['team_user'];
			$user_id = $_SESSION['user_id'];
                } else {
                    header('location: login.html');
                }

               
                include 'php/server.php';
                 $reponse = $bdd->query("SELECT * FROM devis ORDER BY devis_id DESC");
 				 $donnees = $reponse->fetchAll();
 				 if(count($donnees) > 0){
 				 	$max_id = $donnees[0]['devis_id'];
 				 }else{
 				 	$max_id=0;
 				 }

 				 $reponse = $bdd->query("SELECT * FROM portfolio ORDER BY id_portfolio DESC");
 				 $donnees = $reponse->fetchAll();
 				 if(count($donnees) > 0){
 				 	$max_id_port = $donnees[0]['id_portfolio'];
 				 }else{
 				 	$max_id_port=0;
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

		<!-- Style -->
		<link rel="stylesheet" href="css/organon-blue.css">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		
		<!-- JS Libs -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js"><\/script>')</script>
		<script src="jquery/function.js"></script>
		<script src="js/libs/modernizr.js"></script>
		<script src="js/libs/selectivizr.js"></script>


		<script>
			$(document).ready(function(){
				var total = 0;
				
				var username = "<?php echo $_SESSION['username'];?>";
				var user_id = "<?php echo $user_id;?>";
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

				var total = 0;
				var img_older  =0;
				var img_select =0;
				var id_select  =0;
				var thumbnail_selected = null;
				var key = "nothing";
				var max_id = "<?php echo $max_id; ?>";
				var max_id_port = "<?php echo $max_id_port; ?>";
				
				<?php if($_SESSION['right_user'] == 0){ ?>
					function Devis(max_id){
					$.get("load/event.php",{max_id:max_id},function(result){
						//$.each(result.events,function(event){
							
							
							max_id=result.max_id;
							$.jGrowl("Vous venez de recevoir un Devis", {
									header: 'Devis',
									sticky: true,
									theme: 'warning'
								});
							$.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
							
							//alert("hello");
						//});;
						Devis(max_id);
					},'json');
				}

				function Portfolio(max_id_port){
					$.get("load/event_portfolio.php",{max_id_port:max_id_port},function(result){
						//$.each(result.events,function(event){
							
							
							max_id_port=result.max_id;
							$.jGrowl("Une nouvelle propriete a été ajouté", {
									header: 'New Product',
									sticky: true,
									theme: 'warning'
								});
							$.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
							
							//alert("hello");
						//});;
						Portfolio(max_id_port);
					},'json');
				}
				Portfolio(max_id_port);
				

				<?php } ?>
				
				$('#createNew').live("click", function(){
										var newNom = $('#nomNew').attr('value');
										//alert(newNom);
										SetGallery('',newNom,'','','new');
										setTimeout(
											  function() 
											  {
											    //do something special
											    afficheGallery(key);
											  }, 2000);
									});

				

				$('.delete').live("click", function(){
					id_select = $(this).data('click');
					//alert(id_select);

					//id_bdd = $('#id-'+id_select).attr('value');
					SetGallery(id_select,'','','','delete');
					setTimeout(
						  function() 
						  {
						    //do something special
						    afficheGallery(key);
						  }, 300);
					

				});

				/*$('.modal-select').live("click", function(){
					//id_select = $(".SaveModal").data('click');
					alert("salut id: "+id_select);
					older_img = $('#img-'+id_select).attr('src');
					id_bdd = $('#id-'+id_select).attr('value');
					//new_link = $('#link-'+id_select).attr('value');
					nom_gallery = $('#nom-'+id_select).attr('value');
					//alert(id_bdd);


					 //alert($('#'+id_select+""+id_select).attr('src'));
					//alert(img);
					//alert($(this).parent().find('.input-large').attr('value'));
				      return false;
				});*/

				$('#search-gallery').keyup(function() {
				   key = $('#search-gallery').attr('value');
				 afficheGallery(key);
				});

				/*$('.afficher').live("click", function(){
					id_select = $(this).attr('id');
					//alert(id_select);
					
				      return false;
				});*/

				$('.confirm').live("click", function(){
					//id_select = $(this).data('click');
					//alert("Hello id: "+id_select);
					older_img = $('#img-'+id_select).attr('src');
					id_bdd = $('#id-'+id_select).attr('value');
					//new_link = $('#link-'+id_select).attr('value');
					nom_gallery = $('#nom-'+id_select).attr('value');
					//type_portfolio = $('input:radio[name=optionsRadios-'+id_select+']:checked').attr('value');
					//alert(nom_gallery);
					if(img_select==0){
						img_select=older_img;
					}
					
					//alert(checked);
					//alert('img selected: '+ img_select+' Id selected:'+id_select + ' Ancienne image: '+ older_img+' Nom du portfolio: '+ nom_portfolio+' New link: '+new_link);
					$('#img-'+id_select).attr('src',img_select);
					//alert(id_bdd);
					//alert(nom_gallery);
					//alert(img_select);
					SetGallery(id_bdd,nom_gallery,img_select,0,0,null);
					img_select=0;
					setTimeout(
						  function() 
						  {
						    //do something special
						    afficheGallery(key);
						  }, 100);
					//afficheGallery();
					//alert($(this).parent().find('.input-large').attr('value'));
					 img_older  =0;
					 img_select =0;
					 id_select  =0;
				      return false;
				});
				
				
				

				afficheGallery(key);
				


			

				afficheProfil(username);
				
			
				
				


			if($(window).width() > $(window).height()){
							var width = $(".arti").width();
						    var width2 = $(".img2").width();
						    
								//alert(width);
								//alert(width2);
								if(width2 > width){
									$(".img2").css("width",width-80);
								}
					}
				
			});
		</script>
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
						<li >
							<a href="portfolio.php" class="no-submenu"><span class="fam-application-form"></span>Properties</a>
						</li>
						
						<li class="active">
							<a href="gallery.php"><span class="fam-picture"></span>Gallery</a>
						</li>
						<li >
							<a href="#" class="no-submenu"><span class="fam-briefcase"></span>Ajout de fichier</a>
							<ul>
								<li><a href="uploader.php">Uploader</a></li>
								<li ><a href="biblio.php">Bibliotheque</a></li>
								
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
			<div class="row-fluid">
				<ul class="breadcrumb">
					<li><a href="#"><span class="awe-home"></span></a><span class="divider"></span></li>
					<li class="active"><a href="#">Gallery</a><span class="divider"></span></li>
					<!--<li class="active">Typography</li>-->
				</ul>
					<!-- Data block  -->
					<article class="span11 data-block">
						<div class="data-container">
							<header>
								<h2 id='title-gallery'>Toutes les galleries</h2>
								
											
							</header>
							
							<section>
								<p>Voici toutes les images enregistrées dans la base de données et disponibles. Si vous souhaitez en rajouter, il ne vous reste qu'a en uploader via le la page d'upload</p>
								<form class="form-search well" style="float:right; margin-right: 50px;">
												
														<input class="search-query" id="search-gallery" type="text">
														<button class="btn" type="submit">Search</button>
					
											</form>
								<form id='biblio' class="gallery">
												<div id='portfolio-product' >
												<a class='btn btn-alt btn-primary' data-toggle='modal' href='#CreationModal' style='margin-left:30px;margin-bottom:30px;'>Créer une nouvelle gallery</a>
												<div class='modal fade hide modal-info' id='CreationModal'>
													<div class='modal-header'>
														<button type='button' class='close' data-dismiss='modal'>×</button>
														<h3>Nouvelle gallery</h3>
													</div>
													<div class='modal-body'>
														<p>Attention a bien choisir le nom</p>
														<input id='nomNew' class='input-large' type='text' value='Nom'>
													</div>
													<div class='modal-footer'>
														<a href='#' class='btn btn-alt' data-dismiss='modal'>Close</a>
														<a href='#' id ='createNew'class='btn btn-alt' data-dismiss='modal'>Save changes</a>
													</div>
												</div>
												</div>	
										
								</form>

							</section>
						</div>
					</article>
					<!-- /Data block  -->
					
				</div>
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
		<script>
			

			var buffer = 20; //scroll bar buffer
				var iframe = document.getElementById('ifm');

				function pageY(elem) {
				    return elem.offsetParent ? (elem.offsetTop + pageY(elem.offsetParent)) : elem.offsetTop;
				}

				function resizeIframe() {
				    var height = document.documentElement.clientHeight;
				    height -= pageY(document.getElementById('ifm'))+ buffer ;
				    height = (height < 0) ? 0 : height;
				    document.getElementById('ifm').style.height = height + 'px';
				}

				// .onload doesn't work with IE8 and older.
				if (iframe.attachEvent) {
				    iframe.attachEvent("onload", resizeIframe);
				} else {
				    iframe.onload=resizeIframe;
				}

				window.onresize = resizeIframe;
		</script>
		<!-- Highlight gallery item when clicked -->
		<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.jgrowl.css'>
		<?php include 'php/notification.php'; ?>
		
	</body>
</html>
