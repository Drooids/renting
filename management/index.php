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
		
		<!-- jQuery Visualize Styles -->
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.visualize.css'>
		
		<!-- jQuery FullCalendar Styles -->
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.fullcalendar.css'>

		<!-- Style -->
		<link rel="stylesheet" href="css/organon-blue.css">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		
	

		<!-- JS Libs -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js"><\/script>')</script>
		<script src="js/libs/modernizr.js"></script>
		<script src="js/libs/selectivizr.js"></script>
		<script src="jquery/function.js"></script>
		<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>
		<script>
			$(document).ready(function(){
				
				var username = "<?php echo $_SESSION['username'];?>";
				//alert(username);
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

				


			
				

				// Affichage des devis qui arrive durant la connection de l'utilisateur
				

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
						<li class="active">
							<a href="index.php" class="no-submenu"><span class="fam-house"></span>Dashboard</a>
						</li>
						<li >
							<a href="client.php" class="no-submenu"><span class="fam-application-form"></span>Client</a>
						</li>
						
						<li>
							<a href="gallery.php" class="no-submenu"><span class="fam-picture"></span>Gallery</a>
						</li>
						<li>
							<a href="#" class="no-submenu"><span class="fam-briefcase"></span>Ajout de fichier</a>
							<ul>
								<li><a href="uploader.php">Uploader</a></li>
								<li><a href="biblio.php">Bibliotheque</a></li>
								
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
				
				<!-- Page header -->
				<article class="page-header">
					<h1>Welcome,</h1>
					<p>It's a panel with many differents widgets.</p>
				</article>
				<!-- /Page header -->
					
				<!-- Dashboard -->
				<ul class="dashboard">
				
					<!-- Basic dashboard item -->
					<?php if($_SESSION['right_user'] == 0){ ?>
					<li>
						<a href="client.php"><span class="awe-pencil"></span> Client</a>
					</li>
					<li>
						<a href="email.php"><span class="awe-pencil"></span> Email</a>
					</li>
					<li>
						<a href="statistique.php"><span class="sparkline bar"></span> Statistics</a>
					</li>

					<?php } ?>
					<!-- /Basic dashboard item -->
					
					<!-- Dashboard item with submenu/toolbar -->
					
					<!-- /Dashboard item with submenu/toolbar -->
					
					<!-- Dashboard item with circular style -->
					
				</ul>
				<!-- /Dashboard -->
				<div class="row-fluid">
				
					<!-- Data block -->
					
					<!-- /Data block -->
				
				</div>
				
				
				<!-- Grid row -->
				
				
				
				<!-- Sample alerts -->
				
				<!-- /Sample alerts -->
				
				<!-- Grid row -->
				
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
		<script src="js/bootstrap/bootstrap.min.js"></script>
	
		<!-- Block TODO list -->
		<script>
			$(document).ready(function() {
				
				$('.todo-block input[type="checkbox"]').click(function(){
					$(this).closest('tr').toggleClass('done');
				});
				$('.todo-block input[type="checkbox"]:checked').closest('tr').addClass('done');
				
			});
		</script>
		
		<!-- jQuery FullCalendar -->
		<script src="js/plugins/fullCalendar/jquery.fullcalendar.min.js"></script>
		
		<script>
			$(document).ready(function() {
			
				var date = new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();
				
				$('.fullcalendar').fullCalendar({
					header: {
						left: 'title',
						center: '',
						right: 'today month,basicWeek prev,next'
					},
					buttonText: {
						prev: '<span class="awe-arrow-left"></span>',
						next: '<span class="awe-arrow-right"></span>'
					},
					editable: true,
					events: [
						{
							title: 'Event',
							start: new Date(y, m, 1),
							className : 'organon-event organon-event-yellow'
						},
						{
							title: 'Event',
							start: new Date(y, m, d-5),
							end: new Date(y, m, d-2),
							className : 'organon-event organon-event-green'
						},
						{
							id: 999,
							title: 'Event',
							start: new Date(y, m, d-3, 16, 0),
							allDay: false,
							className : 'organon-event organon-event-blue'
						},
						{
							id: 999,
							title: 'Event',
							start: new Date(y, m, d+4, 16, 0),
							allDay: false,
							className : 'organon-event organon-event-black'
						},
						{
							title: 'Meeting',
							start: new Date(y, m, d, 10, 30),
							allDay: false,
							className : 'organon-event organon-event-red'
						},
						{
							title: 'Lunch',
							start: new Date(y, m, d, 12, 0),
							end: new Date(y, m, d, 14, 0),
							allDay: false,
							className : 'organon-event organon-event-purple'
						},
						{
							title: 'Party',
							start: new Date(y, m, d+1, 19, 0),
							end: new Date(y, m, d+1, 22, 30),
							allDay: false,
							className : 'organon-event'
						}
					]
				});
				
			});
		</script>
		
		<!-- jQuery Visualize -->
		<!--[if lte IE 8]>
			<script language="javascript" type="text/javascript" src="js/plugins/visualize/excanvas.js"></script>
		<![endif]-->
		<script src="js/plugins/visualize/jquery.visualize.min.js"></script>
		<script src="js/plugins/visualize/jquery.visualize.tooltip.min.js"></script>
		
		<script>
			$(document).ready(function() {
			
				$('table.demo').each(function() {
					var chartType = ''; // Set chart type
					var chartWidth = $(this).parent().width()*0.95; // Set chart width to 90% of its parent
					
					if(chartWidth < 350) {
						var chartHeight = chartWidth;
					}else{
						var chartHeight = chartWidth*0.25;
					}
					
					$(this).hide().visualize({
						type: $(this).attr('data-chart'),
						width: chartWidth,
						height: chartHeight,
						colors: ['#3a87ad','#b94a48', '#468847']
					});
				});
			
			});
		</script>
		
		<!-- jQuery SparkLines -->
		<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
		
		<script>
			$(document).ready(function() {
			
				// Sample line chart
				$('.sparkline.line').sparkline('html', {
					height: '35px',
					width: '70px',
					lineColor: '#e5e5e5',
					fillColor: '#868585',
					spotColor: '#3a87ad',
					minSpotColor: false,
					maxSpotColor: false,
					spotRadius: 3
				});
				
				// Sample bar chart
				$('.sparkline.bar').sparkline([17, 23, 18, 14, 18, 19, 13], {
					type: 'bar',
					height: '35px',
					barWidth: '6px',
					barColor: '#3a87ad',
					tooltipFormat: '{{offset:names}}: {{value}} orders',
					tooltipValueLookups: {
					names: {
						0: 'Monday',
						1: 'Tuesday',
						2: 'Wednesday',
						3: 'Thursday',
						4: 'Friday',
						5: 'Saturday',
						6: 'Sunday'
						}
					}
				});
				
			});
		</script>
		<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.jgrowl.css'>
		<?php include 'php/notification.php'; ?>
	</body>
</html>
