<?php session_start(); 

        if(isset($_SESSION['username'])) {
        	if(isset($_GET['id']) && isset($_GET['type'])){
        		$key = $_GET['id'];
        		$type = $_GET['type'];
        	}else{
        		 header('location: index.php');
        	}
        	
        	//echo $_SESSION['username'];
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
				
				var old_div = 'groupe-1';
				var old_page ='page-1';
				var username = "<?php echo $_SESSION['username'];?>";
				var user_id = "<?php echo $_SESSION['user_id'];?>";
				var img_select = null;
				var id_bdd = "<?php echo $key;?>";
				var type = "<?php echo $type;?>";
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
				var thumbnail_selected=null;

				$('.thumbnail').live("click", function(){
					if(thumbnail_selected != null){
						thumbnail_selected.css("background-color", "white");
					}

						thumbnail_selected=$(this);
						 img_select = $(this).parent().find('img').attr('src');

						 thumbnail_selected.css("background-color", "yellow");
					//alert(img_select);
					//alert($(this).parent().find('.input-large').attr('value'));
				      return false;
				});

				$('.confirm').live("click",function(){
					if(img_select == null){
						return false
					}else{
						if(type == "portfolio"){
							
							
							SetPortfolio(id_bdd,'','','',img_select,'','','','','','','','','','','',user_id,'','','img','portfolio.php')
							//alert("good");
						}else if(type == "gallery"){
							SetGallery(id_bdd,'',img_select,0,'img','gallery.php');
						}else if(type =="article"){
							SetArticle(id_bdd,'','',img_select,'','img','','accueil.php');
						}
						
					}
				});

				$('.page').live("click",function(){
					var page = $(this).attr('href');
					var new_div ="groupe-"+page;
					var new_page ="page-"+page;
					//alert(new_div);
					$("#"+new_div).css("display", "block");
					$("#"+old_div).css("display", "none");
					$("#"+new_page).css("color","blue");
					$("#"+old_page).css("color","#E5E5E5");

					old_div = new_div;
					old_page = new_page;

					return false;
				});

				afficheProfil(username);

				function afficheImage(){
					$.get("php/GetBiblio.php",
					   function(data){
					   	var str='';

					   	var fin = data.length-1;
					   	//alert(fin);
					   	for (var i=0;i<data.length;i++){
					   		var start =1+i;
					   		if(i==0 ){
					   			str+="<div id='groupe-"+start+"'>";
					   			str+="<ul class='thumbnails' >";
					   		}

					   			str+="<li class='span3'>";
					   			
								str+="<a class='thumbnail' href='#'><img alt='Image 34' src='"+data[i].adresse_fichier+"/"+data[i].nom_fichier+"'></a>";
								str+="</li>";

								if(start % 4 == 0 && i != fin && start %12 !=0){
						   				str+="</ul>";

						   				str+="<ul class='thumbnails' >";
						   		}

					   		if(start % 12 ==0 ){
					   					str+="</ul>";
					   					
					   			str+="</div>";
					   			str+="<div id='groupe-"+(start/12+1)+"' style='display: none;'>";
					   			str+="<ul class='thumbnails' >";
					   		}
					   		
							if(i == fin){
						   			str+="</ul>";
						   			
						   			str+="</div>";
						   			str+="<div style='overflow:hidden; float:right;margin-right:20px; margin-bottom:20px;'> Pages: ";
					   					//str+="</br>"
						   				for (var j=0;j<data.length/12;j++){
						   					var k = j+1;
						   					if(j == 0){
						   						str+="<a style='margin-right:4px; color:blue;' id='page-"+k+"' class='page' href='"+k+"'>"+k+"</a>";
						   					}else{
						   						str+="<a style='margin-right:4px;' class='page' id='page-"+k+"' href='"+k+"'>"+k+"</a>";
						   					}
						   					
							   			}
						   				str+="</div>";
						   				str+="<button data-click='' class='btn btn-alt btn-large btn-primary confirm'  type='submit' style=' margin-bottom:20px; margin-left:20px;'>Save changes</button>";
						   			//str+="<div class='form-actions'>";
									//str+="<button class='btn btn-alt btn-primary deleteCheck' type='submit'>Delete items</button>";
									//str+="</div>";
						   			
						   			}
					   		}
					   		$("#biblio").html(str);
					   }, "json");

				}

				afficheImage();
				
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
					<nav>
						<ul role="navigation">
								
								<li ><a href="portfolio.php"><span class="fam-application-view-columns"></span>Portfolio</a></li>
								
						</ul>
					</nav>
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
						<!--<li>
							<a href="forms.html" class="no-submenu"><span class="fam-application-form"></span>Forms</a>
						</li>-->
						
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
			<div >
						<header>
								<h2 id='title-gallery'>Selection d'images</h2>
						</header>
						
						
			</div>
			<div class="row-fluid">
				<ul class="breadcrumb">
					<li><a href="#"><span class="awe-home"></span></a><span class="divider"></span></li>
					<li class='active'><a href="#">Images</a><span class="divider"></span></li>
					<!--<li class="active">Images</li>-->
				</ul>
					<!-- Data block -->
				<article class="span11 data-block nested">
					<div id='biblio' >
							

					</div>
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
		<script src="js/bootstrap/bootstrap-alert.js"></script>
		<script src="js/bootstrap/bootstrap-collapse.js"></script>
		<script src="js/bootstrap/bootstrap-transition.js"></script>
		-->
		<script src="js/bootstrap/bootstrap.min.js"></script>

		
		
		
		
		<!-- Wysihtml5 -->
		
		<!-- Highlight gallery item when clicked -->
		
		
	</body>
</html>
