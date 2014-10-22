<?php session_start(); 

        if(isset($_SESSION['username'])) {
        	//echo $_SESSION['username'];
        	$user_team = $_SESSION['team_user'];
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
		
		<!-- jQuery Visualize Styles -->
		
		
		<!-- jQuery FullCalendar Styles -->
	

		<!-- Style -->
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.visualize.css'>
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
				var max_id = "<?php echo $max_id; ?>"
				var max_id_port = "<?php echo $max_id_port; ?>"
				
				$('.affiche_devis').load("load/affiche_devis.php");
				
				<?php if($_SESSION['right_user'] == 0){ ?>
					

			
				

				<?php } ?>

				/*function doPoll(max_id){
					
					$.get("load/event.php",{max_id:max_id},function(result){
						//$.each(result.events,function(event){
							
							
							max_id=result.max_id;
							$.jGrowl("Vous venez de recevoir un Devis", {
									header: 'Devis',
									sticky: true,
									theme: 'warning'
								});
							$.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
							$("#example-2").dataTable().fnDestroy();
							$('.affiche_devis').load("load/affiche_devis.php");
							//alert("hello");
						//});;
						doPoll(max_id);
					},'json');
				}*/
				function doPoll(max_id){
				    
				        $.ajax({ 
				         url: "load/event.php",
				         data:{ max_id: max_id},
				         success: function(result){
				         	if(result.max_id){
				         		
				         		max_id=result.max_id;

					           	$.jGrowl("Vous venez de recevoir un Devis", {
										header: 'Devis',
										sticky: true,
										theme: 'warning'
									});
								$.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
								$("#example-2").dataTable().fnDestroy();
								$('.affiche_devis').load("load/affiche_devis.php");
				         	}
				          
				           //alert('succes');
				           //doPoll(max_id);
				           //;
				           
				        	},complete: function(result){

				           		
				          
				           //alert('complete');
				          	setTimeout(function () {
					            doPoll(max_id);
					        }, 500);
				           
				        	},
				        timeout: 30000});
									    
				}


				doPoll(max_id);
				
				

				

				
				//Initialisation
				
			//	refreshBadgeDevis();
				afficheProfil(username);

		

				

				// Affichage des devis qui arrive durant la connection de l'utilisateur
				

			});
		</script>
	</head>
	<body>
			
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
							<a href="devis.php" class="no-submenu"><span class="fam-application-view-columns"></span>Devis<span id='badge' class="badge badge-primary" ></span></a>
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
				
				<!-- /Sidebar box: Dark -->
				
			</div>
			<!-- /Left (navigation) side -->
			
			<!-- Right (content) side -->
			<div class="content-block" role="main">
		<div class="row-fluid">
			<article class="span12 data-block">
				<div class="data-container">
							<header>
								<h2>All the statistics of our Agency</h2>
							</header>
							<section>
								
								<?php
									
									$month_minus1 = mktime(date("H"), date("i"), date("s"), date("m")-1, date("d"), date("Y"));
									$month_minus2 = mktime(date("H"), date("i"), date("s"), date("m")-2, date("d"), date("Y"));
									$month_minus3 = mktime(date("H"), date("i"), date("s"), date("m")-3, date("d"), date("Y"));
									$month_minus4 = mktime(date("H"), date("i"), date("s"), date("m")-4, date("d"), date("Y"));
									$month_minus5 = mktime(date("H"), date("i"), date("s"), date("m")-5, date("d"), date("Y"));
									$month_minus6 = mktime(date("H"), date("i"), date("s"), date("m")-6, date("d"), date("Y"));
									$month_minus7 = mktime(date("H"), date("i"), date("s"), date("m")-7, date("d"), date("Y"));
									$month_minus8 = mktime(date("H"), date("i"), date("s"), date("m")-8, date("d"), date("Y"));
									$month_minus9 = mktime(date("H"), date("i"), date("s"), date("m")-9, date("d"), date("Y"));
									$month_minus10 = mktime(date("H"), date("i"), date("s"), date("m")-10, date("d"), date("Y"));
									$month_minus11 = mktime(date("H"), date("i"), date("s"), date("m")-11, date("d"), date("Y"));
									$month_minus12 = mktime(date("H"), date("i"), date("s"), date("m")-12, date("d"), date("Y"));

									$date[0]= date("Y-m-d", $month_minus5 );
									$date[1] = date("Y-m-d", $month_minus4 );
									$date[2] = date("Y-m-d", $month_minus3 );
									$date[3] = date("Y-m-d", $month_minus2 );
									$date[4] = date("Y-m-d", $month_minus1 );
									$date[5] = date("Y-m-d");
									
									


								?>
								<table data-chart="line">
									<caption>Properties: Sale/Renting</caption>
									<thead>
										<tr>
											<td></td>
											
											<th scope="col"><?php echo date("Y/m", $month_minus5 ); ?></th>
											<th scope="col"><?php echo date("Y/m", $month_minus4 ); ?></th>
											<th scope="col"><?php echo date("Y/m", $month_minus3 ); ?></th>
											<th scope="col"><?php echo date("Y/m", $month_minus2 ); ?></th>
											<th scope="col"><?php echo date("Y/m", $month_minus1 ); ?></th>
											<th scope="col"><?php echo date("Y/m"); ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Rent</th>
								<?php
										for($k=0; $k<6; $k++){
												$date_use = $date[$k];
											$reponse = $bdd->query("SELECT * FROM portfolio WHERE service_portfolio = 'rent' AND date_portfolio <= '$date_use'");
											//echo "SELECT * FROM portfolio WHERE service_portfolio = 'rent' AND date_portfolio <= '$date_use'";
	 				 						$donnees = $reponse->fetchAll();
	 				 							$total = count($donnees);
	 				 							echo"<td>".$total."</td>";
										}
									 	

								?>
											
											
										</tr>
										<tr>
											<th scope="row">Sale</th>
											
										<?php
										for($k=0; $k<6; $k++){
												$date_use = $date[$k];
											$reponse = $bdd->query("SELECT * FROM portfolio WHERE service_portfolio = 'sale' AND date_portfolio <= '$date_use'");
	 				 						$donnees = $reponse->fetchAll();
	 				 							$total = count($donnees);
	 				 							echo"<td>".$total."</td>";
										}
									 	

								?>
											
										</tr>
									</tbody>
								</table>
								
							</section>
						</div>
					
				
			</article>
		</div>
		<div class="row-fluid">
				
					<!-- Data block -->
					<article class="span12 data-block">
						<div class="data-container">
							<section>
								<table data-chart="bar">
									<caption>Properties classed by District</caption>
									<thead>
										<tr>
											<td></td>
											
										<th scope="col"> 1</th>
										<th scope="col"> 2</th>
										<th scope="col"> 3</th>
										<th scope="col"> 4</th>
										<th scope="col"> 5</th>
										<th scope="col"> 6</th>
										<th scope="col"> 7</th>
										<th scope="col"> 8</th>
										<th scope="col"> 9</th>
										<th scope="col"> 10</th>
										<th scope="col"> 11</th>
										<th scope="col"> 12</th>
										<th scope="col">Go Vap </th>
										<th scope="col">Tan Binh </th>
										<th scope="col">Tan Phu </th>
										<th scope="col">Binh Thanh </th>
										<th scope="col">Phu Nhuan </th>
										<th scope="col">Thu Duc </th>
										<th scope="col">Bin Tan </th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Rent</th>
											<?php
											$district[0] = 'district 1';
											$district[1] = 'district 2';
											$district[2] = 'district 3';
											$district[3] = 'district 4';
											$district[4] = 'district 5';
											$district[5] = 'district 6';
											$district[6] = 'district 7';
											$district[7] = 'district 8';
											$district[8] = 'district 9';
											$district[9] = 'district 10';
											$district[10] = 'district 10';
											$district[11] = 'district 10';
											
											$district[12] = 'Go Vap district';
											$district[13] = 'Tan Binh district';
											$district[14] = 'Tan Phu district';
											$district[15] = 'Binh Thanh district';
											$district[16] = 'Phu Nhuan district';
											$district[17] = 'Thu Duc district';
											$district[18] = 'Bin Tan district';



										for($k=0; $k<19; $k++){
												$district_use = $district[$k];
											$reponse = $bdd->query("SELECT * FROM portfolio WHERE service_portfolio = 'rent' AND district_portfolio = '$district_use'");
	 				 						$donnees = $reponse->fetchAll();
	 				 							$total = count($donnees);
	 				 							echo"<td>".$total."</td>";
										}
									 	

								?>
										</tr>
										<tr>
											<th scope="row">Sale</th>
											<?php

											for($k=0; $k<19; $k++){
													$district_use = $district[$k];
												$reponse = $bdd->query("SELECT * FROM portfolio WHERE service_portfolio = 'sale' AND district_portfolio = '$district_use'");
		 				 						$donnees = $reponse->fetchAll();
		 				 							$total = count($donnees);
		 				 							echo"<td>".$total."</td>";
											}

											?>
										</tr>
									</tbody>
								</table>
							</section>
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
		<script src="js/bootstrap/bootstrap-button.js"></script>
		<script src="js/bootstrap/bootstrap-alert.js"></script>
		<script src="js/bootstrap/bootstrap-popover.js"></script>
		<script src="js/bootstrap/bootstrap-collapse.js"></script>
		<script src="js/bootstrap/bootstrap-transition.js"></script>
		-->
		
		
		
		<script src="js/bootstrap/bootstrap.min.js"></script>
		<script src="js/plugins/visualize/jquery.visualize.min.js"></script>
		<script src="js/plugins/visualize/jquery.visualize.tooltip.min.js"></script>
		
		<script>
			$(document).ready(function() {
			
				$('table').each(function() {
					var chartType = ''; // Set chart type
					var chartWidth = $(this).parent().width()*0.9; // Set chart width to 90% of its parent
					
					if(chartWidth < 350) {
						var chartHeight = chartWidth;
					}else{
						var chartHeight = chartWidth*0.25;
					}
					
					if ($(this).attr('data-chart')) { // If exists chart-chart attribute
						chartType = $(this).attr('data-chart'); // Get chart type from data-chart attribute
					} else {
						chartType = 'area'; // If data-chart attribute is not set, use 'area' type as default. Options: 'bar', 'area', 'pie', 'line'
					}
					
					if(chartType == 'line' || chartType == 'pie') {
						$(this).hide().visualize({
							type: chartType,
							width: chartWidth,
							height: chartHeight,
							colors: ['#468847','#b94a48','#3a87ad','#c09853','#7d628c','#33363b','#b29559','#6bd5b1','#66c9ee'],
							lineDots: 'double',
							interaction: true,
							multiHover: 5,
							tooltip: true,
							tooltiphtml: function(data) {
								var html ='';
								for(var i=0; i<data.point.length; i++){
									html += '<p class="tooltip chart_tooltip"><div class="tooltip-inner"><strong>'+data.point[i].value+'</strong> '+data.point[i].yLabels[0]+'</div></p>';
								}	
								return html;
							}
						});
					} else {
						$(this).hide().visualize({
							type: chartType,
							width: chartWidth,
							height: chartHeight,
							colors: ['#468847','#b94a48','#3a87ad','#c09853','#7d628c','#33363b','#b29559','#6bd5b1','#66c9ee'],
						});
					}
				});
			
			});
		</script>
		
		<!-- jQuery Flot Charts -->
		<!--[if lte IE 8]>
			<script language="javascript" type="text/javascript" src="js/plugins/flot/excanvas.min.js"></script>
		<![endif]-->
		<script src="js/plugins/flot/jquery.flot.js"></script>
		<script src="js/plugins/flot/jquery.flot.pie.js"></script>
		
		<script>
			$(document).ready(function() {
			
				// Demo #2
				var d1 = [];
				for (var i = 0; i < 14; i += 0.5)
					d1.push([i, Math.sin(i)]);
				
				var d2 = [[0, 3], [4, 8], [8, 5], [9, 13]];
				
				var d3 = [];
				for (var i = 0; i < 14; i += 0.5)
					d3.push([i, Math.cos(i)]);
				
				var d4 = [];
				for (var i = 0; i < 14; i += 0.1)
					d4.push([i, Math.sqrt(i * 10)]);
				
				var d5 = [];
				for (var i = 0; i < 14; i += 0.5)
					d5.push([i, Math.sqrt(i)]);
				
				var d6 = [];
				for (var i = 0; i < 14; i += 0.5 + Math.random())
					d6.push([i, Math.sqrt(2*i + Math.sin(i) + 5)]);
						
				$.plot($("#demo-2"), [
					{
						data: d1,
						lines: { show: true, fill: true }
					},
					{
						data: d2,
						bars: { show: true }
					},
						{
					data: d3,
						points: { show: true }
					},
					{
						data: d4,
						lines: { show: true }
					},
					{
						data: d5,
						lines: { show: true },
						points: { show: true }
					},
					{
						data: d6,
						lines: { show: true, steps: true }
					}
				], {
					grid: { backgroundColor: 'transparent', color: '#b2b2b2', borderColor: 'transparent' }
				});
				
				// Demo #3
				var data = [];
				var series = Math.floor(Math.random()*6)+3;
				for( var i = 0; i<series; i++){
					data[i] = { label: (i+1)+"000 &euro;", data: Math.floor(Math.random()*100)+1 }
				}
				
				$.plot($("#demo-3"), data, {
					series: {
						pie: {
							innerRadius: 0.5,
							show: true
						}
					},
					grid: { backgroundColor: '#3a3839', color: '#b2b2b2' }
				});
				
				// Demo #4
				var sin = [], cos = [];
				for (var i = 0; i < 14; i += 0.5) {
					sin.push([i, Math.sin(i)]);
					cos.push([i, Math.cos(i)]);
				}
				
				var plot = $.plot($("#demo-4"),
					[ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
						series: {
							lines: { show: true },
							points: { show: true }
						},
						grid: { hoverable: true, clickable: true, backgroundColor: '#3a3839', color: '#b2b2b2', borderColor: '#b2b2b2' },
						yaxis: { min: -1.2, max: 1.2 }
					});
				
				function showTooltip(x, y, contents) {
					$('<div id="tooltip"><div class="tooltip-inner">' + contents + '</div></div>').css( {
						position: 'absolute',
						display: 'none',
						top: y + 10,
						left: x + 10
					}).appendTo("body").fadeIn(200);
				}
				
				var previousPoint = null;
				$("#demo-4").bind("plothover", function (event, pos, item) {
					$("#x").text(pos.x.toFixed(2));
					$("#y").text(pos.y.toFixed(2));
				
						if (item) {
							if (previousPoint != item.dataIndex) {
								previousPoint = item.dataIndex;
				
								$("#tooltip").remove();
								var x = item.datapoint[0].toFixed(2),
									y = item.datapoint[1].toFixed(2);
				
								showTooltip(item.pageX, item.pageY,
								item.series.label + " of " + x + " = " + y);
							}
						} else {
							$("#tooltip").remove();
							previousPoint = null;
						}
				});
				
				$("#demo-4").bind("plotclick", function (event, pos, item) {
					if (item) {
						$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
						plot.highlight(item.series, item.datapoint);
					}
				});
				
				// Demo #1
				// we use an inline data source in the example, usually data would be fetched from a server
				var data = [], totalPoints = 300;
				function getRandomData() {
					if (data.length > 0)
						data = data.slice(1);
				
					// do a random walk
					while (data.length < totalPoints) {
						var prev = data.length > 0 ? data[data.length - 1] : 50;
						var y = prev + Math.random() * 10 - 5;
						if (y < 0)
							y = 0;
						if (y > 100)
							y = 100;
						data.push(y);
					}
				
					// zip the generated y values with the x values
					var res = [];
					for (var i = 0; i < data.length; ++i)
						res.push([i, data[i]])
					return res;
				}
				
				// setup control widget
				var updateInterval = 30;
				$("#updateInterval").val(updateInterval).change(function () {
					var v = $(this).val();
					if (v && !isNaN(+v)) {
						updateInterval = +v;
					if (updateInterval < 1)
						updateInterval = 1;
					if (updateInterval > 2000)
						updateInterval = 2000;
					$(this).val("" + updateInterval);
					}
				});
				
				// setup plot
				var options = {
					series: { shadowSize: 0, color: '#389abe' }, // drawing is faster without shadows
					yaxis: { min: 0, max: 100 },
					xaxis: { show: false },
					grid: { backgroundColor: 'transparent', color: '#b2b2b2', borderColor: 'transparent' }
				};
				var plot = $.plot($("#demo-1"), [ getRandomData() ], options);
				
				function update() {
					plot.setData([ getRandomData() ]);
					// since the axes don't change, we don't need to call plot.setupGrid()
					plot.draw();
					setTimeout(update, updateInterval);
				}
				
				update();
			
			});
		</script>
		

		
	</body>
</html>
