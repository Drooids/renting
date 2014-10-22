<?php session_start(); 

        if(isset($_SESSION['username'])) {
        	//echo $_SESSION['username'];
        	$user_team = $_SESSION['team_user'];
                } else {
                    header('location: login.html');
                }
                include 'php/server.php';
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
				//var selected = new Array();
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

				var total = 0;
				var selected = new Array();
				// Tooltips

				$('.delete').live('click',function(){
					//alert('hello');
					var nom_fichier=$(this).attr('href');
					DeleteImg(nom_fichier);
					return false;

				});

				$('.deleteCheck').live('click',function(){
					$(':checkbox:checked').each(function()
						{
						     selected.push($(this).val());
						     DeleteImg($(this).val());
						});
					
					//alert(selected);
					
					return false;

				});

				function CountRefreshBiblio(){
						$.get("php/GetBiblioRefresh.php",
					   function(data){

					   	if(total != data[0].Total){
					   		afficheBiblio();
					   		total = data[0].Total;
							}
					   });
				}
				CountRefreshBiblio();
				var refreshId = setInterval(function()
			{
					
					CountRefreshBiblio();

			}, 10000);
				

				

				afficheProfil(username);
				refreshBadgeDevis();
				
						/*if(i == fin){
						   			str+="</ul>";
						   			str="<div class='form-actions'><select id='actions' class='span2'>";
											str="<option>edit</option>";
											str="<option>remove</option>";
											str="<option>archive</option>";
											str="<option>report</option>";
										str="</select>";
										str="<button class='btn btn-alt btn-primary' type='submit'>Selected items</button>";
									str="</div>";
						   			
						   			}*/
				

				


				var refreshId = setInterval(function()
			{
					
					
					refreshBadgeDevis();
					

			}, 10000);
				
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
								<li><a href="uploader.php">Uploader</a></li>
								<li class="active"><a href="#">Bibliotheque</a></li>
								
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
			<div class="content-block" role="main">
			<!-- Right (content) side -->
			<div class="row-fluid">
				
					<!-- Data block  -->
					<article class="span12 data-block">
						<div class="data-container">
							<header>
								<h2>Bibliotheque d'images</h2>
							</header>
							<section>
								<p>Voici toutes les images enregistrées dans la base de données et disponibles. Si vous souhaitez en rajouter, il ne vous reste qu'a en uploader via le la page d'upload</p>
								<form id='biblio' class="form-gallery">
									
									
								</form>
							</section>
						</div>
					</article>
					<!-- /Data block  -->
					
			</div>
			<!-- /Right (content) side -->
			</div>
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
		
		<!-- Highlight gallery item when clicked -->
		<script>
			$(document).ready(function() {
					
				$('.form-gallery input[type="checkbox"]').click(function() {
					$(this).next('.thumbnail').toggleClass('active');
				});
				$('.form-gallery input[type="checkbox"]:checked').next('.thumbnail').addClass('active');
				
			});


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
		
	</body>
</html>
