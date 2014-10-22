<?php session_start(); 

        if(isset($_SESSION['username'])) {
        	//echo $_SESSION['username'];
        	$user_team = $_SESSION['team_user'];
                } else {
                    header('location: login.html');
                }
                include 'php/server.php';
                include 'php/notification.php';
                
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
				
				var username = "<?php echo $_SESSION['username'];?>";
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

				//Initialisation
				afficheProfil(username);
				

				
				
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
						
						<li>
							<a href="gallery.php" class="no-submenu"><span class="fam-picture"></span>Gallery</a>
							
						</li>
						<li class="active">
							<a href="#" class="no-submenu"><span class="fam-briefcase"></span>Ajout de fichier</a>
							<ul>
								<li class="active"><a href="#">Uploader</a></li>
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

				<!-- Breadcrumb -->
			
				<!-- /Breadcrumb -->

				<!-- Grid row -->
				<div class="row-fluid">
				
					<!-- Data block -->
					<article class="span12 data-block">
						<div class="data-container">
							<header>
								<h2>Telechargez vos fichier photos ou zip ici.</h2>
							</header>
							<section>
								<p>Vous pouvez telecharger un grand nombre de ficheir depuis cette interface directement sur le serveur. Seul les fichiers de types photos et archives sont autorisés</p>
								<div class="plupload"></div>
							</section>
						</div>
					</article>
					<!-- /Data block -->
					
				</div>
				<!-- /Grid row -->

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
		<script src="js/bootstrap/bootstrap-button.js"></script>
		<script src="js/bootstrap/bootstrap-alert.js"></script>
		<script src="js/bootstrap/bootstrap-popover.js"></script>
		<script src="js/bootstrap/bootstrap-collapse.js"></script>
		<script src="js/bootstrap/bootstrap-transition.js"></script>
		-->
		<script src="js/navigation.js"></script>

		<!-- Bootstrap scripts -->
		<!--
		<script src="js/bootstrap/bootstrap-tooltip.js"></script>
		<script src="js/bootstrap/bootstrap-collapse.js"></script>
		<script src="js/bootstrap/bootstrap-transition.js"></script>
		-->
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- jQuery plUpload -->
		<script src="js/plugins/plUpload/plupload.full.js"></script>
		<script src="js/plugins/plUpload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
		<script>
			$(document).ready(function() {
				
				$('.plupload').pluploadQueue({
					runtimes : 'html5,gears,silverlight,browserplus',
					url : 'upload/upload.php',
					max_file_size : '10mb',
					chunk_size : '1mb',
					unique_names : true,
					multiple_queues:true,
					resize : {width : 320, height : 240, quality : 90},
					urlstream_upload:true,
					filters : [
						{title : "Image files", extensions : "jpg,gif,png,jpeg"},
						{title : "Zip files", extensions : "zip"}
					],
					flash_swf_url : 'js/plugins/plUpload/plupload.flash.swf',
					silverlight_xap_url : 'js/plugins/plUpload/plupload.silverlight.xap'
				});

				$(".plupload_header").remove();
				$(".plupload_progress_container").addClass("progress").addClass('progress-striped');
				$(".plupload_progress_bar").addClass("bar");
				$(".plupload_button").each(function(e){
					if($(this).hasClass("plupload_add")){
						$(this).attr("class", 'btn btn-primary btn-alt pl_add btn-small');
					} else {
						$(this).attr("class", 'btn btn-success btn-alt pl_start btn-small');
					}
				});

				var uploader = $('#uploader').plupload('getUploader');
				 uploader.bind('UploadProgress', function() {
			        if (uploader.total.uploaded == uploader.files.length) {
			            $(".plupload_buttons").css("display", "inline");
			            $(".plupload_upload_status").css("display", "inline");
			            $(".plupload_start").addClass("plupload_disabled");
			        }
			    });
			    
			    uploader.bind('QueueChanged', function() {
			        $(".plupload_start").removeClass("plupload_disabled");
			    });


				$("#essai").click(function(){
					$('#uploader').plupload('getUploader').refresh();
					return false;
				});
			});
		</script>
		<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.jgrowl.css'>
		<?php include 'php/notification.php'; ?>
	</body>
</html>
