		<link rel="stylesheet" href="css/organon-blue-iframe.css">
		
		<!-- JS Libs -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js"><\/script>')</script>
		<script src="jquery/function.js"></script>
		<script src="js/libs/modernizr.js"></script>
		<script src="js/libs/selectivizr.js"></script>

		<script>
			$(document).ready(function(){

				$('.a').live('click',function(){
					   var idDevis=$(this).closest('tr').attr('id');
					   $.post("php/deleteDevis.php", { id: idDevis } );
					   refreshDevis();
					   return false;
					});
				$('.b').live('click',function(){
					   var idDevis=$(this).closest('tr').attr('id');
					   $.post("php/ReadDevis.php", { id: idDevis } );
					   refreshDevis();
					   return false;
					});

				$('.c').live('click',function(){
					   var idDevis=$(this).closest('tr').attr('id');
					   $.post("php/NonReadDevis.php", { id: idDevis } );
					   refreshDevis();
					   return false;
					});

				refreshDevis();


				var refreshId = setInterval(function()
			{

				refreshDevis();


			}, 100000);

			});
		</script>


				<!-- Breadcrumb -->
				
				<!-- /Breadcrumb -->
				
				<!-- Page header -->
				<article class="page-header">
					<h1>Affichages des Devis</h1>
					<p></p>
				</article>
				<!-- /Page header -->
					
				<!-- Dashboard -->
	
				<!-- /Dashboard -->
				<div class="row-fluid">
				
					<!-- Data block -->
					<article class="span12 data-block nested">
					
						<!-- Data block inner container -->
						<div class="data-container">
						
							<!-- Data block header -->
							<header >
								<h2>Devis</h2>
								
								<!-- Data block header actions -->
								<ul class="data-header-actions single-action">
									<li>
										<form class="form-search">
											<div class="control-group">
												<div class="controls" style='height:20px;'>
													<input class="search-query" type="text" placeholder="Search&#8230;">
													<button class="btn btn-alt" type="submit">Search</button>
												</div>
											</div>
										</form>
									</li>
								</ul>
								<!-- /Data block header actions -->
								
							</header>
							<!-- /Data block header -->
							
							<!-- Data block content -->
							<section>
							
								
									<h3></h3>
									<table class="table table-striped table-bordered table-condensed table-hover">
										<thead>
											<tr>
												<th></th>
												<th colspan="5">Tout les emails</th>
											</tr>
											<tr>
												<th>#</th>
												<th>Date</th>
												<th>Projet</th>
												<th>Email</th>
												<th>Commentaire</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody id='devis_affichage_all'>
											

										</tbody>
										<tbody id='devis_affichage_news'>
											

										</tbody>
									</table>
								
								<!-- Sample chart -->
								
								<!-- /Sample chart -->
								
							</section>
							<!-- /Data block content -->
							
						</div>
						<!-- /Data block inner container -->
						
					</article>
					<!-- /Data block -->
				
				</div>

		<script src="js/bootstrap/bootstrap.min.js"></script>
	
		<!-- Block TODO list -->
		<!-- jQuery FullCalendar -->
		<script src="js/plugins/fullCalendar/jquery.fullcalendar.min.js"></script>
		
		
		
		<!-- jQuery Visualize -->
		<!--[if lte IE 8]>
			<script language="javascript" type="text/javascript" src="js/plugins/visualize/excanvas.js"></script>
		<![endif]-->
		<script src="js/plugins/visualize/jquery.visualize.min.js"></script>
		<script src="js/plugins/visualize/jquery.visualize.tooltip.min.js"></script>
		
		
		
		<!-- jQuery SparkLines -->
		<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
				
				
				<!-- Grid row -->
				
				
				
				<!-- Sample alerts -->
				
				<!-- /Sample alerts -->
				
				<!-- Grid row -->
				
				<!-- /Grid row -->
				