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
				$('.table_data').load('php/table_client.php');

				
				

				

				$('.delete').live("click", function(){
					id_select = $(this).data('click');
					//id_bdd = $('#id-'+id_select).attr('value');
					//alert(id_select);
					$.get('php/script_client.php',{action:'delete',id:id_select},function(result){
											result = $.trim(result);
											if(result == 'deleted'){
												$("#example-2").dataTable().fnDestroy();
												$('.table_data').load('php/table_client.php');
											}else{
												alert('error');
											}
											
										});
				return false;
					

				});


				$('#createNew').live("click", function(){
										var name = $('#name').attr('value');
										var last_name = $('#last_name').attr('value');
										var phone = $('#phone').attr('value');
										var email = $('#email').attr('value');
										var language = $('#language').attr('value');
										//alert(newNom);
										if( name != '' && last_name != '' && phone != ''){
											$.get('php/script_client.php',{action:'create',name:name,last_name:last_name,phone:phone,email:email,language:language},function(result){
											result = $.trim(result);
											if(result == 'created'){
												$("#example-2").dataTable().fnDestroy();
												$('.table_data').load('php/table_client.php');
											}else{
												alert('error');
											}
											
										});
										}else{
												alert('Some informations are missing !');
											}
										
										
				
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
							<a href="client.php" class="no-submenu"><span class="fam-application-form"></span>Clients</a>
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
						
					</ul>
				</nav>
				
				
			</div>
			<!-- /Left (navigation) side -->
			
			<!-- Right (content) side -->
			<div class="content-block" role="main">
				<div class="row-fluid">	
				<ul class="breadcrumb">
					<li><a href="#"><span class="awe-home"></span></a><span class="divider"></span></li>
					<li class="active"><a href="#">Clients</a><span class="divider"></span></li>
					<!--<li class="active">Typography</li>-->
				</ul>
					<a class='btn btn-alt btn-primary' data-toggle='modal' href='#CreationModal' style='margin-bottom:30px;'>Add a new client</a>
								<div class='modal fade hide modal-info nested' id='CreationModal' style='margin-left:280px;'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal'>×</button>
										<h3>Add a new client</h3>
									</div>
									<div class='modal-body'>
										<fieldset>
													<div class="control-group">
													<label class="control-label" for="input">Name *</label>
													<div class="controls">
														<input id="name" class="input-xxlarge" type="text">
														<p class="help-block">Name of the client</p>
													</div>
													</div>
													<div class="control-group">
													<label class="control-label" for="input">Last Name *</label>
													<div class="controls">
														<input id="last_name" class="input-xxlarge" type="text">
														<p class="help-block">Last name of the client</p>
													</div>
													</div>
													<div class="control-group">
													<label class="control-label" for="input">Phone *</label>
													<div class="controls">
														<input id="phone" class="input-xxlarge" type="text">
														<p class="help-block">Phone number of the client</p>
													</div>
													</div>
													<div class="control-group">
													<label class="control-label" for="input">Email </label>
													<div class="controls">
														<input id="email" class="input-xxlarge" type="text">
														<p class="help-block">Email of the client</p>
													</div>
													</div>
													<div class="control-group">
													<label class="control-label" for="input">Language</label>
													<div class="controls">
														<input id="language" class="input-xxlarge" type="text">
														<p class="help-block">Language of the client</p>
													</div>
													</div>

										</fieldset>
									</div>
									<div class='modal-footer'>
										<a href='#' class='btn btn-alt' data-dismiss='modal'>Close</a>
										<a href='#' id ='createNew'class='btn btn-alt' data-dismiss='modal'>Create</a>
									</div>
								</div>
				
			
		<div id='portfolio-product'  >
							
		
		
								
									<h3>List of our client
										<!-- DataTable column filter -->
										<div class="btn-group pull-right">
											<a href="#" data-toggle="dropdown" class="btn btn-alt btn-primary dropdown-toggle">Column filter <span class="caret"></span></a>
											<ul class="dropdown-menu datatable-controls">
												<li>
													<label class="checkbox" for="dt_col_1"><input type="checkbox" value="0" id="dt_col_1" name="toggle-cols" checked="checked"> Creation</label>
												</li>
												<li>
													<label class="checkbox" for="dt_col_2"><input type="checkbox" value="1" id="dt_col_2" name="toggle-cols" checked="checked"> 
														Last name</label>
												</li>
												<li>
													<label class="checkbox" for="dt_col_3"><input type="checkbox" value="2" id="dt_col_3" name="toggle-cols" checked="checked">
													 Name</label>
												</li>
												<li>
													<label class="checkbox" for="dt_col_4"><input type="checkbox" value="3" id="dt_col_4" name="toggle-cols" checked="checked"> Company</label>
												</li>
												<li>
													<label class="checkbox" for="dt_col_5"><input type="checkbox" value="4" id="dt_col_5" name="toggle-cols" checked="checked">
													 Email</label>
												</li>
												<li>
													<label class="checkbox" for="dt_col_6"><input type="checkbox" value="5" id="dt_col_6" name="toggle-cols" checked="checked">
													 Phone</label>
												</li>
												<li>
													<label class="checkbox" for="dt_col_7"><input type="checkbox" value="6" id="dt_col_7" name="toggle-cols" checked="checked">
													 Language</label>
												</li>
												<li>
													<label class="checkbox" for="dt_col_8"><input type="checkbox" value="7" id="dt_col_8" name="toggle-cols" checked="checked">
													 Status</label>
												</li>

												
											</ul>
										</div>
										<!-- /DataTable column filter -->
									</h3>
									
									<table class="datatable table table-striped table-bordered" id="example-2" style='width:100%;'>
										<thead>
											<tr>
												<th>Creation</th>
												<th>Last name:</th>
												<th>Name</th>
												<th>Company</th>
												<th>Email</th>
												<th>Phone</th>
												<th>Language</th>
												<th>Status</th>
												<th>Actions</th>
												
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
