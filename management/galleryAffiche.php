<?php
include('php/class.load.php');

        if(isset($_SESSION['username'])) {
        	//echo $_SESSION['username'];
        	$user_team = $_SESSION['team_user'];
                } else {
                    header('location: login.html');
                }

               $gallery=$_GET['gallery'];
                include 'php/server.php';

                if(isset($_GET['return_type'])) {
                	$return_type=$_GET['return_type'];
                }else{
                	$return_type="";
                }

                if(isset($_GET['id'])) {
                	$return_id=$_GET['id'];
                }else{
                	$return_id='';
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
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	 	 
		<script>
			  $(function() {
			    $( ".sortable" ).sortable({ 
			    	placeholder: "ui-state-highlight",
			    	start: function( event, ui ) {
						    $( this ).sortable( 'refreshPositions' );
						   		var height = $('.ui-state-default').height();
								var width = $('.ui-state-default').width();
						    $(".ui-state-highlight").css('height',height+'px');
						    $(".ui-state-highlight").css('width',width+'px');
						  },
						  stop: function(event,ui){
						  	var info='';
						  	$('.info').each(function(index){
						  		var name = $(this).data('click');
						  		if(index == 0){
						  		 info = name;
						  		//alert("hello");
						  		}else{
						  			info=info+','+name;
						  		}
						  		
							    
							    
							    
							});
							//alert(info);
							var id = <?php echo $gallery;?>;
							SetGallery(id,'','',info,'sortable',null);
							//alert('hello');
					
						  },
					connectWith: ".sortable"

				});
			    $( ".sortable" ).disableSelection();
			  });
	    </script>
		<script>
			$(document).ready(function(){
				var total = 0;
				
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

				var id_gallery = '<?php echo $gallery; ?>';

				function loadPage(){
					$('.biblio').load('load/galleryaffiche.php?gallery='+id_gallery, function() {
								//  alert('Load was performed.');
								

							
								});
				}

				loadPage();
				afficheProfil(username);
				var total = 0;
				var img_older  =0;
				var img_select =0;
				var id_select  =0;
				var thumbnail_selected = null;
				var return_id="<?php echo $return_id;?>";
				var return_type="<?php echo $return_type;?>";
				
				//alert(id_gallery);
			

				$('#return').live("click", function(){
					if(return_type="portfolio")
						location.replace('portfolio-modif.php?id='+return_id);
					//location.reload();
				});

				$('.delete').live('click',function(){
					
					var id_fichier=$(this).data('click')
					//alert(id_fichier);
					DeleteImgGallery(id_fichier,id_gallery);
					return false;

				});
				/*$('.edit').live('click',function(){
					
					var id_fichier=$(this).data('click')
					alert(id_fichier);
					//DeleteImgGallery(id_fichier,id_gallery);
					return false;

				});*/

				function DeleteImgGallery(id_fichier,id_gallery){
					$.get("upload/deleteGallery.php",{id_fichier:id_fichier,id_gallery:id_gallery},
					   function(data){
					   loadPage();
					   	
					   }, "json");

				}

				/*$('.thumbnail').live("click", function(){
					if(thumbnail_selected != null){
						thumbnail_selected.css("background-color", "white");
					}

						thumbnail_selected=$(this);
						 img_select = $(this).parent().find('img').attr('src');

						 thumbnail_selected.css("background-color", "yellow");
					//alert(img_select);
					//alert($(this).parent().find('.input-large').attr('value'));
				      return false;
				});*/

				
				
				/*
				function afficheGalleryAffich(id_gallery){
					$.get("php/GetGalleryAffich.php",{id_gallery:id_gallery},
					   function(data){
					  //alert(data[0].link_gallery);
					   var dataSplited = data[0].link_gallery.split(',');
					  // alert(dataSplited.length);
					  $("#name_gallery").html(data[0].nom_gallery);
					  
					   	var str='';
					   	var fin = dataSplited.length-1;
					   	//alert(fin);
					   	for (var i=0;i<dataSplited.length;i++){
					   	
					   		var start =1+i;
					   		if(i==0 && dataSplited.length !=0){
						//str+="<ul class='thumbnails' >";
					   		}
					   		if(dataSplited[i] != ''){
					   			str+="<li class='span3 ui-state-default' style='height: 200px;' >";
					   			//str+="<input id='"+data[i].id_gallery +"' type='checkbox' value='option'>";
					   			str+="<ul class='thumbnail-actions'>";
								str+="<li><a href='#' title='Edit photo'><span class='icon-pencil'></span></a></li>";
								//str+="<li><a href='upload/download.php?filename="+dataSplited[i].nom_fichier+"' title='Download photo'><span class='icon-download'></span></a></li>";
								str+="<li><a class='delete' id='href-"+dataSplited[i]+"' href=''  title='Delete photo'><span class='icon-trash'></span></a></li>";
								str+="</ul>";
								str+="<a class='thumbnail' href='#'><img alt='Image 34' id='img-"+dataSplited[i]+"'src='upload/uploads/"+dataSplited[i]+"' data-click='"+dataSplited[i]+"' height=380px></a>";
								str+="</li>";
					   		}
					   			
					   		

							if(start % 4 == 0 ){
					   				str+="</ul>";
					   				//str+="<ul class='thumbnails' >";
					   		}
					   			
							if(i == fin){
						   			str+="</ul>";
						   			
						   			
						   			}
						   		}
						   		$(".biblio").html(str);
						   		for (var i=0;i<dataSplited.length;i++){
					   		afficheImage(dataSplited[i]);
					   	}
					   		  });
				
				}*/
				

				//afficheGalleryAffich(id_gallery);

				
				
			});
		</script>
		 <style>
  
  .ui-state-highlight { height: 1.5em; line-height: 1.2em; width:367px; height:210px; background: transparent;}
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
						<li >
							<a href="portfolio.php" class="no-submenu"><span class="fam-application-form"></span>Properties</a>
						</li>
						
						<li class="active" class="no-submenu">
							<a href="gallery.php?gallery=Portfolio"><span class="fam-picture"></span>Gallery</a>
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
					<li ><a href="gallery.php">Gallery</a><span class="divider"></span></li>
					<li class="active" id="name_gallery"></li>
				</ul>
					<!-- Data block  -->
					<article class="span12 data-block">
						<?php if(isset($_GET['return_type'])) { ?>
						<button class="btn btn-large btn-success" id='return'>Return to <?php echo $return_type; ?></button>
						<?php } ?>
						<div class="plupload" style="margin-bottom:100px;"></div>
						<div class="data-container">

							<header>
								<h2 id='title-gallery'>Toutes les galleries</h2>
							</header>
							<section>
								<p>Voici toutes les images enregistrées dans cette galerie. Si vous souhaitez en rajouter, il ne vous reste qu'a en uploader via le la page d'upload et de RAFRAICHIR</p>
								<form class="form-gallery">


								<ul  class="thumbnails biblio sortable">
									
								</ul>
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
		<script src="js/plugins/plUpload/plupload.full.js"></script>
		<script src="js/plugins/plUpload/jquery.plupload.queue/jquery.plupload.queue.js"></script>

		
    
		<script>
		
			$(document).ready(function() {
				var id_gallery = '<?php echo $gallery; ?>';
				
				
				$('.plupload').pluploadQueue({
					runtimes : 'html5,gears,silverlight,browserplus',
					url : 'upload/uploadGallery.php?id='+id_gallery,
					max_file_size : '10mb',
					chunk_size : '1mb',
					unique_names : true,
					multiple_queues:true,
					resize : {width : 892, height : 562, quality : 90},
					urlstream_upload:true,
					filters : [
						{title : "Image files", extensions : "jpg,gif,png"},
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

				/*var uploader = $('#uploader').plupload('getUploader');

				 uploader.bind('UploadProgress', function() {
			        if (uploader.total.uploaded == uploader.files.length) {
			            $(".plupload_buttons").css("display", "inline");
			            $(".plupload_upload_status").css("display", "inline");
			            $(".plupload_start").addClass("plupload_disabled");
			           
			            
						  

			        }
			    });
				
				
			    
			    uploader.bind('QueueChanged', function() {
			        $(".plupload_start").removeClass("plupload_disabled");
			    });*/


				

				

			});
		</script>
		<?php

		 $reponse = $bdd->query("SELECT link_gallery FROM gallery where id_gallery='$gallery'");
 				 $donnees = $reponse->fetchAll();
 				$link_gallery=$donnees[0]['link_gallery'];
				$link_gallery = explode(",", $link_gallery);
				$longueur=count($link_gallery);
 		?>

 		<script type="text/javascript">
				
$(document).ready(function(){
				var size = "<?php echo $longueur; ?>";
				var gallery = "<?php echo $gallery; ?>";
			
				
				function Gallery_Refresh_Add(max_id_port){
					$.ajax({ 
				         url: "load/Gallery_Refresh_Add.php",
				         data:{ size: size,gallery:gallery},
				         success: function(result){
				         	if(result.size){
				         		size=result.size;
				         		$('.biblio').load('load/galleryaffiche.php?gallery='+gallery);
				         		//alert(size);
				         	}
				           		
				          
				           //alert('succes');
				           //doPoll(max_id);
				        	},complete: function(result){
				         	
				           

				          
							
				          
				          
				          setTimeout(function () {
					            Gallery_Refresh_Add(size);
					        }, 500);
				        	},
				        timeout: 28000});
					}
				Gallery_Refresh_Add(size);
				
				

			});
</script>
		<!-- Highlight gallery item when clicked -->
		<script type="text/javascript" src="js/plugins/jGrowl/jquery.jgrowl.js"></script>
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.jgrowl.css'>
	</body>
</html>
