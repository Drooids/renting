<?php 
include('php/class.load.php');
        if(isset($_SESSION['username'])) {
        	//echo $_SESSION['username'];
        	$user_team = $_SESSION['team_user'];
        	$user_id = $_SESSION['user_id'];
                } else {
                    header('location: login.html');

                }

                if(isset($_GET['id'])){
                	$id=$_GET['id'];
                	$client = new client($id);
                	

                }else{
                		header('Location: client.php');   
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
		
		<script>
			$(document).ready(function(){
				
				

				


				var id = "<?php echo $id; ?>";
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
				
				$('.table_data').load('php/table_data.php?id='+id);
				$('.table_history').load('php/table_history.php?id='+id);
				
				$('.save').live('click',function(){
					var object = $(this);
					var data = $(this).data('click');
					var value = $("#"+data).attr('value');
					//alert(value);
						$.get('php/script_client_detail.php',{key:data,value:value,id:id},function(result){
							result = $.trim(result);
							if(result == "ok"){
								object.html('Saved');
								object.removeClass('btn-primary');
							}else{
								object.html('Error');
								object.removeClass('btn-primary');
								object.addClass('btn-danger');
							}
						});

					return false;
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
						
					</ul>
				</nav>
				
				
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
					<li ><a href="client.php">Clients</a><span class="divider"></span></li>
					<li class="active"><?php  echo $client->last_name;?></li>
				</ul>
					<!-- Data block -->
				<article class="page-header">
					<button class="btn btn-large btn-danger" style='float:right; margin-right:40px;' onClick="window.location.replace('index.php');">Return</button>
					<h1>Personal settings</h1>
					
				</article>

				<div class="row-fluid">
					<div class='span12'>
					<!-- Data block -->
					<article class="span4 data-block nested">
						<div class="data-container span12">
							<header>
								<button class="btn btn-info" style='float:right; margin-top:5px; margin-right:10px;' id='show'>Change</button>
								<button class="btn btn-info" style='float:right; margin-top:5px; margin-right:10px; display:none' id='hide'>Hide</button>
								<script type="text/javascript">
								$('#show').live('click',function(){
									$('#show').hide();
									$('#hide').show();
									$('#show_info').show();
									return false;
								});

								$('#hide').live('click',function(){
									$('#show').show();
									$('#hide').hide();
									$('#show_info').hide();
									return false;
								});
								</script>
								<h2>Information: (created the <?php echo $client->date_creation; ?>)</h2>
							</header>
							<section>
								<dl class="dl-horizontal">
									<dt>Name: </dt>
									<dd><?php echo $client->name; if($client->name == ""){echo " Empty ";} ?></dd>
									<dt>Last Name: </dt>
									<dd><?php echo $client->last_name; if($client->last_name == ""){echo " Empty ";}?></dd>
									<dt>Company: </dt>
									<dd><?php echo $client->name_company; if($client->name_company == ""){echo " Empty ";}?></dd>
									<dt>Adress: </dt>
									<dd><?php echo $client->adress; if($client->adress == ""){echo " Empty ";}?></dd>
									<dt>Phone: </dt>
									<dd><?php echo $client->phone; if($client->phone == ""){echo " Empty ";}?></dd>
									<dt>Email: </dt>
									<dd><?php echo $client->email; if($client->email == ""){echo " Empty ";}?></dd>
									<dt>Language: </dt>
									<dd><?php echo $client->language; if($client->language == ""){echo " Empty ";}?></dd>
								</dl>

							</section>
							<section style='display:none;'>

								<h3>Name: </h3>
								<div class="control-group ">
								<div class='input-append'>
									<input id='name' type='text' value='<?php echo $client->name; ?>'>
									<button class='btn save  btn-primary' type='button' data-click='name'>Save</button>
								</div>
								</div>
								
								<h3>Last name: </h3>
								<div class="control-group ">
								<div class='input-append'>
									<input id='last_name' type='text' value='<?php echo $client->last_name; ?>'>
									<button class='btn save  btn-primary' type='button' data-click='last_name'>Save</button>
								</div>
								</div>
								<div style='display:none' id='show_info'>
								<h3>Name Company: </h3>
								<div class="control-group ">
								<div class='input-append'>
									<input id='name_company' type='text' value='<?php echo $client->name_company; ?>'>
									<button class='btn save  btn-primary' type='button' data-click='name_company'>Save</button>
								</div>
								</div>

								<h3>Adress: </h3>
								<div class="control-group ">
								<div class='input-append'>
									<input id='adress' type='text' value='<?php echo $client->adress; ?>'>
									<button class='btn save  btn-primary' type='button' data-click='adress'>Save</button>
								</div>
								</div>

								<h3>Phone: </h3>
								<div class="control-group ">
								<div class='input-append'>
									<input id='phone' type='text' value='<?php echo $client->phone; ?>'>
									<button class='btn save  btn-primary' type='button' data-click='phone'>Save</button>
								</div>
								</div>

								<h3>Email: </h3>
								<div class="control-group ">
								<div class='input-append'>
									<input id='email' type='text' value='<?php echo $client->email; ?>'>
									<button class='btn save  btn-primary' type='button' data-click='email'>Save</button>
								</div>
								</div>

								<h3>Language: </h3>
								<div class="control-group ">
								<div class='input-append'>
									<input id='language' type='text' value='<?php echo $client->language; ?>'>
									<button class='btn save  btn-primary' type='button' data-click='language'>Save</button>
								</div>
								</div>
								</div>
							</section>
						</div>
						
					</article>
					<article class="span8 data-block nested">
						<div class="data-container span12">
							<header>
								<h2>Historical</h2>
							</header>
							<section>
								<div id='historical' style='margin:5px 5px 5px 5px; ='  >
									<table class="datatable table table-striped table-bordered" id="history_table" style='width:100%;'>
										<thead>
											<tr>
												<th>Creation</th>
												<th>Information:</th>	
											</tr>
										</thead>
										<tbody class='table_history'>
											
											
											
										</tbody>
									</table>
								</div>
								
							</section>
						</div>
						
					</article>
					<!-- /Data block -->
					</div>


				</div>	
				<div class="row-fluid">
					<article class="span12 data-block nested">

						<div id='portfolio-product' style='margin:5px 5px 5px 5px; ='  >
							
		
		
								
									<h3>Properties</h3>
									
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
					</article>	
				</div>	



		
			
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
		<!-- jQuery DataTable -->
		<script src="js/plugins/dataTables/jquery.datatables.min.js"></script>
		<script type="text/javascript">
/* Default class modification */
			/* Set the defaults for DataTables initialisation */
$.extend( true, $.fn.dataTable.defaults, {
	"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
	"sPaginationType": "bootstrap",
	"oLanguage": {
		"sLengthMenu": "_MENU_ suck per page"
	}
} );


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
		"iPage":          oSettings._iDisplayLength === -1 ?
			0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    oSettings._iDisplayLength === -1 ?
			0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
};


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
			var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

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

			for ( i=0, ien=an.length ; i<ien ; i++ ) {
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
} );


/*
 * TableTools Bootstrap compatibility
 * Required TableTools 2.1+
 */
if ( $.fn.DataTable.TableTools ) {
	// Set the classes that TableTools uses to something suitable for Bootstrap
	$.extend( true, $.fn.DataTable.TableTools.classes, {
		"container": "DTTT btn-group",
		"buttons": {
			"normal": "btn",
			"disabled": "disabled"
		},
		"collection": {
			"container": "DTTT_dropdown dropdown-menu",
			"buttons": {
				"normal": "",
				"disabled": "disabled"
			}
		},
		"print": {
			"info": "DTTT_print_info modal"
		},
		"select": {
			"row": "active"
		}
	} );

	// Have the collection use a bootstrap compatible dropdown
	$.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
		"collection": {
			"container": "ul",
			"button": "li",
			"liner": "a"
		}
	} );
}
			
			/* Show/hide table column */
			
			$(document).ready(function(){
				function dtShowHideCol( iCol ) {
				var oTable = $('#example-2').dataTable({});
				var oTable2 = $('#history_table').dataTable({
					"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"oLanguage": {"sLengthMenu": "_MENU_ records per page"},
					"aaSorting": [[ 0, "desc" ]]
		
				});

				
			};
			
			});
		</script>

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
