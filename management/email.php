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
		<link rel="stylesheet" href="css/organon-blue.css">
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.snippet.css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<!-- jQuery plUpload -->
		<link rel="stylesheet" href="css/plugins/jquery.plupload.queue.css">
		<link rel="stylesheet" href="css/plugins/jquery.ui.plupload.css">
		<!-- JS Libs -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js"><\/script>')</script>
		<script src="jquery/function.js"></script>
		<script src="js/libs/modernizr.js"></script>
		<script src="js/libs/selectivizr.js"></script>
		<script src="js/email.js"></script>
		<script type="text/javascript" src="js/jquery.iframe-auto-height.plugin.js"></script>
		<script>
			$(document).ready(function(){
				jQuery('iframe').iframeAutoHeight({debug: true, diagnostics: false});
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
			<ul class="breadcrumb">
					<li><a href="index.php"><span class="awe-home"></span></a><span class="divider"></span></li>
					<li class="active"><a href="email.php" class='email_return'>Email</a><span class="divider"></span></li>
					
				</ul>
			<article id='affiche_all_article' class="span11 data-block">
				<div class="progress progress-line progress-striped active">
					<div class="bar" style="width: 5%"></div>
				</div>

				<!--
					Faire 3 appel ajax pour remplir la bar afin de savoir où en est la connection avec le serveur pour l'affiche de l'email.
				-->	
									<div class='affiche_all' style='padding:25px 25px 25px 25px;' data-click='show'>
									
									</div>
									<div class='affiche_one' style='padding:25px 25px 25px 25px; display:none;' data-click='hide'>
										<div class='full_goo' style=' float:right; display:block; margin-right:10px;'>
										<div class='goo_button goo_button_right demoPopover' title="Others" data-content="More options ?" data-click='close'><div class='goo_button_other'></div></div><div class='goo_button goo_button_left demoPopover' title="Repondre" data-content="Clicker pour repondre par email"><div class='goo_button_answer'></div></div>

										</div>
										<div class='header_info'>
										</div>
										<iframe id="frame" src="" width="100%" height="" frameBorder="0" scrolling="no" style='background:white; margin-top:20px; min-height:100px;'></iframe>
										<div class="control-group repondre" style='display:none;'>
											<form >
												<fieldset>
													
													<div class="control-group">
														<div class="controls">
															<textarea id="textarea4" class="wysihtml5" placeholder="Enter text&hellip;" rows="8"></textarea>
															<div id="container">
																<div id="filelist">No runtime found.</div>
																<br />
																
															</div>
														</div>
													</div>
													<div class="form-actions">
														<button class="btn btn-alt btn-primary btn-large" id='uploadfiles' type="submit" data-to="" data-tonom="" data-subject="">Envoyer</button>
														<div class='full_goo' style=' float:right; display:block; margin-right:10px;'>
																<div class='goo_button goo_button_left demoPopover' id='pickfiles' title="Upload files" data-content="Clicker pour uploader des fichiers"><div class='goo_button_upload'></div></div>		
														</div>
													</div>
												</fieldset>
											</form>
		</div>
									</div>
								</div>
				
			</article>
		</div>

			</div>
			<!-- /Right (content) side -->
		
		</div>
		<!-- Main page container -->
	
		<!-- Scripts -->
		<script src="js/navigation.js"></script>
		

		<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.jgrowl.css'>
		<link rel='stylesheet' type='text/css' href='css/plugins/bootstrap-wysihtml5.css'>
		
		<script src="js/bootstrap/bootstrap.min.js"></script>
	
		<!-- Pupload -->
		
		<!-- jQuery FullCalendar -->
		<script src="js/plugins/dataTables/jquery.datatables.min.js"></script>
		<script type="text/javascript">
// Custom example logic
$(function() {
	
	var id = 0;
	var to = "hello@hello.com";
	var uploader = new plupload.Uploader({
		runtimes : 'gears,html5,flash,silverlight,browserplus',
		browse_button : 'pickfiles',
		container : 'container',
		max_file_size : '10mb',
		chunk_size : '1mb',
		unique_names : true,
		multiple_queues:true,
		urlstream_upload:true,
		url : 'upload/uploadEmail.php?id='+id+'&to='+to,
		flash_swf_url : 'js/plugins/plUpload/plupload.flash.swf',
		silverlight_xap_url : 'js/plugins/plUpload/plupload.silverlight.xap',
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Zip files", extensions : "zip"}
		],
	});

	uploader.bind('Init', function(up, params) {
		$('#filelist').html("<div>File to update and send by email:</div>");
	});

	$('#uploadfiles').click(function(e) {
		uploader.start();
		e.preventDefault();
	});

	uploader.init();

	uploader.bind('FilesAdded', function(up, files) {
		$.each(files, function(i, file) {
			$('#filelist').append(
				'<div id="' + file.id + '">' +
				file.name + ' (' + plupload.formatSize(file.size) + ') <b></b>' +
			'</div>');
		});

		up.refresh(); // Reposition Flash/Silverlight
	});

	uploader.bind('UploadProgress', function(up, file) {
		$('#' + file.id + " b").html(file.percent + "%");
	});

	uploader.bind('Error', function(up, err) {
		$('#filelist').append("<div>Error: " + err.code +
			", Message: " + err.message +
			(err.file ? ", File: " + err.file.name : "") +
			"</div>"
		);

		up.refresh(); // Reposition Flash/Silverlight
	});

	uploader.bind('FileUploaded', function(up, file) {
		$('#' + file.id + " b").html("100%");
	});
});
</script>
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
		<script src="js/plugins/wysihtml5/wysihtml5-0.3.0.js"></script>
		<script src="js/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>

		
	</body>
</html>
