<?php 
include('php/class.load.php');

        if(isset($_SESSION['username'])) {
        	$user_id = $_SESSION['user_id'];
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
		<script src="jquery/function.js"></script>
		<script src="js/libs/modernizr.js"></script>
		<script src="js/libs/selectivizr.js"></script>


		<script>
			$(document).ready(function(){
				
				
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
				
				afficheProfil(username);

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
				var user_id = "<?php echo $user_id; ?>";
				$('.table_data').load('php/table_data.php');

				var total = 0;
				var img_older  =0;
				var img_select =0;
				var id_select  =0;
				var thumbnail_selected = null;
				var id_bdd =0;
				var new_link =0;
				var nom_portfolio=0;
				var checked =0;
				var key ='nothing';
				var text ='';
				var title ='';
				var select = 'name';
				
				
				$('.increase').live('click',function(){
				div = $(this).parent().find('.affiche');
				
				if($(div).is(":visible")){
					$(div).hide();
					$(this).html("Maximize");
					$(this).addClass("btn-primary");
					$(this).removeClass("btn-success");
				}else{
					$(div).show();
					$(this).html("Reduce");
					$(this).addClass("btn-success");
					$(this).removeClass("btn-primary");
					//div.load('../product-detail-iframe.php?id=26');
				}

				
				return false;
			});
				

				
				

				

				$('.delete').live("click", function(){
					id_select = $(this).data('click');
					//id_bdd = $('#id-'+id_select).attr('value');
					//alert(id_select);
					$("#example-2").dataTable().fnDestroy();

				    
					 SetPortfolio(id_select,'','','','','','','','','','','','','','','','','','','delete',null);
					
					setTimeout(
						  function() 
						  {
						    //do something special
						   $('.table_data').load('php/table_data.php');

						  }, 500);
				return false;
					

				});

				/*$('#search-portfolio').keyup(function() {
					select = $('input:radio[name=choose]:checked').attr('value');
				   	key = $('#search-portfolio').attr('value');
				   //	alert(select);
				 AffichProductPortfolio(key,select);	
				});
				$('.search').live("click", function(){
					select = $('input:radio[name=choose]:checked').attr('value');
				   	key = $('#search-portfolio').attr('value');
					//alert(select);
				   	 AffichProductPortfolio(key,select);	
					return false;
				});*/

				$('#createNew').live("click", function(){
										var newNom = $('#nomNew').attr('value');
										//alert(newNom);
										SetPortfolio('',newNom,'','','','','','','','','','','','','','',user_id,'','','new',null);
										//alert(user_id);
										$("#example-2").dataTable().fnDestroy();
										setTimeout(
											  function() 
											  {
											    //do something special
											    //AffichProductPortfolio(key,select);
											    
											$('.table_data').load('php/table_data.php');
											    
											    //$('tbody').append(str)
											  }, 2000);
				
									});

				//AffichProductPortfolio(key,select);				
			
				$('.grid').live("click", function(){

						div = $('#portfolio-product')
						div2 = $('.tab-pane');
						filter = $('.filter_grid');
						if($(div).is(":visible")){
							$(div).hide();
							$(filter).hide();
							$(div2).show();
							$(this).html("Grid");
							
						}
						else{
							$(div).show();
							$(filter).show();
							$(div2).hide();
							$(this).html("Table");
							
						}
							

						return false;
					});
				

			
			
				

				
				
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
						<li class="active">
							<a href="portfolio.php" class="no-submenu"><span class="fam-application-form"></span>Properties</a>
						</li>
						
						<li>
							<a href="gallery.php" class="no-submenu"><span class="fam-picture"></span>Gallery</a>
							
						</li>
						<li >
							<a href="#" class="no-submenu"><span class="fam-briefcase"></span>Ajout de fichier</a>
							<ul>
								<li class="active"><a href="uploader.php">Uploader</a></li>
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
				<div class="row-fluid">	
				<ul class="breadcrumb">
					<li><a href="#"><span class="awe-home"></span></a><span class="divider"></span></li>
					<li class="active"><a href="#">Product</a><span class="divider"></span></li>
					<!--<li class="active">Typography</li>-->
				</ul>
					<a class='btn btn-alt btn-primary' data-toggle='modal' href='#CreationModal' style='margin-bottom:30px;'>Create a new product</a>
								<div class='modal fade hide modal-info' id='CreationModal' style='margin-left:280px;'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal'>×</button>
										<h3>Modal header</h3>
									</div>
									<div class='modal-body'>
										<p>Choose a name for you</p>
										<input id='nomNew' class='input-large' type='text' value='Nom'>
									</div>
									<div class='modal-footer'>
										<a href='#' class='btn btn-alt' data-dismiss='modal'>Close</a>
										<a href='#' id ='createNew'class='btn btn-alt' data-dismiss='modal'>Save changes</a>
									</div>
								</div>
				
			
		<div id='portfolio-product'  >
							
		
		
								
									<h3>Table of all your product
										<!-- DataTable column filter -->
										<div class="btn-group pull-right">
											<a href="#" data-toggle="dropdown" class="btn btn-alt btn-primary dropdown-toggle">Column filter <span class="caret"></span></a>
											<ul class="dropdown-menu datatable-controls">
												<li><label class="checkbox" for="dt_col_1"><input type="checkbox" value="0" id="dt_col_1" name="toggle-cols" checked="checked"> Creation</label></li>
												<li><label class="checkbox" for="dt_col_2"><input type="checkbox" value="1" id="dt_col_2" name="toggle-cols" checked="checked"> Available</label></li>
												<li><label class="checkbox" for="dt_col_3"><input type="checkbox" value="2" id="dt_col_3" name="toggle-cols" checked="checked"> Name</label></li>
												<li><label class="checkbox" for="dt_col_4"><input type="checkbox" value="3" id="dt_col_4" name="toggle-cols" checked="checked"> Service</label></li>
												<li><label class="checkbox" for="dt_col_5"><input type="checkbox" value="4" id="dt_col_5" name="toggle-cols" checked="checked"> Property</label></li>
												<li><label class="checkbox" for="dt_col_6"><input type="checkbox" value="5" id="dt_col_6" name="toggle-cols" checked="checked"> District</label></li>
												<li><label class="checkbox" for="dt_col_7"><input type="checkbox" value="6" id="dt_col_7" name="toggle-cols" checked="checked"> Adress</label></li>
												<li><label class="checkbox" for="dt_col_8"><input type="checkbox" value="7" id="dt_col_8" name="toggle-cols" checked="checked"> Rooms</label></li>
												<li><label class="checkbox" for="dt_col_9"><input type="checkbox" value="8" id="dt_col_9" name="toggle-cols" checked="checked"> Baths</label></li>
												<li><label class="checkbox" for="dt_col_10"><input type="checkbox" value="9" id="dt_col_10" name="toggle-cols" checked="checked"> Price</label></li>
												<li><label class="checkbox" for="dt_col_11"><input type="checkbox" value="10" id="dt_col_11" name="toggle-cols" checked="checked"> Square</label></li>
												<li><label class="checkbox" for="dt_col_12"><input type="checkbox" value="11" id="dt_col_12" name="toggle-cols" checked="checked"> Informations/Actions</label></li>
											</ul>
										</div>
										<!-- /DataTable column filter -->
									</h3>
									
									<table class="datatable table table-striped table-bordered" id="example-2" style='width:100%;'>
										<thead>
											<tr>
												<th>Creation</th>
												<th>Available:</th>
												<th>Name</th>
												<th>Service</th>
												<th>Property</th>
												<th>District</th>
												<th>Adress</th>
												<th>Rooms</th>
												<th>Baths</th>											
												<th>Price</th>
												<th>Square</th>
												<th>Informations/Actions</th>
												
											</tr>
										</thead>
										<tbody class='table_data'>
											
											
											
										</tbody>
									</table>
								
								</div>
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

		
		
		<!-- jQuery DataTable -->
		<script src="js/plugins/dataTables/jquery.datatables.min.js"></script>
		<script type="text/javascript">
/* Default class modification */
			$.extend( $.fn.dataTableExt.oStdClasses, {
				"sWrapper": "dataTables_wrapper form-inline"
			} );
			
			/* API method to get paging information */
			$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
			{
				return {
					"iStart":         oSettings._iDisplayStart,
					"iEnd":           oSettings.fnDisplayEnd(),
					"iLength":        oSettings._iDisplayLength,
					"iTotal":         oSettings.fnRecordsTotal(),
					"iFilteredTotal": oSettings.fnRecordsDisplay(),
					"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
					"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
				};
			}
			
			/* Bootstrap style pagination control */
			$.extend( $.fn.dataTableExt.oPagination, {
				"bootstrap": {
					"fnInit": function( oSettings, nPaging, fnDraw ) {
						var oLang = oSettings.oLanguage.oPaginate;
						var fnClickHandler = function ( e ) {
							e.preventDefault();
							if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
								fnDraw( oSettings );
							}
						};
						
						$(nPaging).addClass('pagination').append(
							'<ul>'+
								'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
								'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
							'</ul>'
						);
						var els = $('a', nPaging);
						$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
						$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
					},
					
					"fnUpdate": function ( oSettings, fnDraw ) {
						var iListLength = 5;
						var oPaging = oSettings.oInstance.fnPagingInfo();
						var an = oSettings.aanFeatures.p;
						var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);
						
						if ( oPaging.iTotalPages < iListLength) {
							iStart = 1;
							iEnd = oPaging.iTotalPages;
						}
						else if ( oPaging.iPage <= iHalf ) {
							iStart = 1;
							iEnd = iListLength;
						} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
							iStart = oPaging.iTotalPages - iListLength + 1;
							iEnd = oPaging.iTotalPages;
						} else {
							iStart = oPaging.iPage - iHalf + 1;
							iEnd = iStart + iListLength - 1;
						}
						
						for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
							// Remove the middle elements
							$('li:gt(0)', an[i]).filter(':not(:last)').remove();
							
							// Add the new list items and their event handlers
							for ( j=iStart ; j<=iEnd ; j++ ) {
								sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
								$('<li '+sClass+'><a href="#">'+j+'</a></li>')
									.insertBefore( $('li:last', an[i])[0] )
									.bind('click', function (e) {
										e.preventDefault();
										oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
										fnDraw( oSettings );
									} );
							}
							
							// Add / remove disabled classes from the static elements
							if ( oPaging.iPage === 0 ) {
								$('li:first', an[i]).addClass('disabled');
							} else {
								$('li:first', an[i]).removeClass('disabled');
							}
							
							if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
								$('li:last', an[i]).addClass('disabled');
							} else {
								$('li:last', an[i]).removeClass('disabled');
							}
						}
					}
				}
			});
			
			/* Show/hide table column */
			
			$(document).ready(function(){
				function dtShowHideCol( iCol ) {
				var oTable = $('#example-2').dataTable();
				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			};
			$('.datatable-controls').on('click','li input',function(){
					dtShowHideCol( $(this).val() );
				});
			});
		</script>
		
		<!-- Wysihtml5 -->
		
		<!-- Highlight gallery item when clicked -->
		<script>
			$(document).ready(function() {
					
				$('.form-gallery input[type="checkbox"]').click(function() {
					$(this).next('.thumbnail').toggleClass('active');
				});
				$('.form-gallery input[type="checkbox"]:checked').next('.thumbnail').addClass('active');
				
			});

			
		</script>
		<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.jgrowl.css'>
		
	</body>
</html>
