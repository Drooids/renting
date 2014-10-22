<?php session_start(); 

        if(isset($_SESSION['username'])) {
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
				
				afficheProfil(username);
				

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
				
				
				

				

				
				

				

				$('.delete').live("click", function(){
					id_select = $(this).data('click');
					//id_bdd = $('#id-'+id_select).attr('value');
					//alert(id_select);
					SetPortfolio(id_select,'','','','','','','delete',null);
					setTimeout(
						  function() 
						  {
						    //do something special
						    AffichProductPortfolio(key);
						  }, 500);
				return false;
					

				});

				$('#search-portfolio').keyup(function() {
				   key = $('#search-portfolio').attr('value');
				 AffichProductPortfolio(key);	
				});

				$('#createNew').live("click", function(){
										var newNom = $('#nomNew').attr('value');
										//alert(newNom);
										SetPortfolio('',newNom,'','','','','','new');
										setTimeout(
											  function() 
											  {
											    //do something special
											    AffichProductPortfolio(key);
											  }, 2000);
									});

				AffichProductPortfolio(key);				
			
				
				

				$(window).resize(function() {
					if($(window).width() > $(window).height()){
							var width = $(".arti").width();
						    var width2 = $(".img2").width();
						    
								//alert(width);
								//alert(width2);
								if(width2 > width){
									$(".img2").css("width",width-80);
								}
					}
				   			
				});
				// Popovers
				

				
				
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
								<li ><a href="accueil.php"><span class="fam-application-view-columns"></span>Accueil</a></li>
								<li ><a href="entreprise.php"><span class="fam-application-view-columns"></span>Entreprise</a></li>
								<li ><a href="portfolio.php"><span class="fam-application-view-columns"></span>Portfolio</a></li>
								<li class='active'><a href="contact.php"><span class="fam-application-view-columns"></span>Contact</a></li>
								
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
				<div class="row-fluid">	
					<ul class="breadcrumb">
						<li><a href="#"><span class="awe-home"></span></a><span class="divider"></span></li>
						<li class="active"><a href="#">Contact</a><span class="divider"></span></li>
						<!--<li class="active">Typography</li>-->
					</ul>

					<div style="margin-bottom:70px;">
								<header>
										<h2 id='title-gallery'>Contact</h2>
								</header>
								<?php
							$reponse = $bdd->query("SELECT titre_article,id_article,text_article,img_article,option_article,link_article
													FROM article
													WHERE option_article = 'contact' ");

			
							$donnees = $reponse->fetchAll();
		
							$titre_article=$donnees[0]['titre_article'];
							$id_article=$donnees[0]['id_article'];
							$text_article=$donnees[0]['text_article'];
							$img_article=$donnees[0]['img_article'];
							$option_article=$donnees[0]['option_article'];
							$link_article=$donnees[0]['link_article'];




			?>
						<div id='contact' >
							<div class="row-fluid">	
								<article class='span12 data-block nested arti' style='min-height:200px;'>
									<div class='data-container'>
										<div class='control-group'>
											<label class="control-label " for="input">Text</label>
											<div class="controls">
												<textarea id='textarea' class='wysiwyg text' rows='8' ><?php echo $text_article; ?></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="input">Email de reception</label>
											<div class="controls" style='margin-right:10px;'>
											
												<input id="input" class="input-medium option" type="text" value='<?php echo $link_article; ?>' style='width:100%; '>
												<input id="input" class="input-medium id" type="hidden" value='<?php echo $id_article; ?>'>
											</div>
										</div>
										<div class="control-group">
											
											<div class="controls">
											
											<button data-click='' class='btn btn-alt btn-large btn-danger btn-primary confirm'  type='submit' style='margin-top:20px;'>Save changes</button>
								
												
											</div>
										</div>

									</div>
								</article>
							</div>
						</div>
								
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

		<script src="js/plugins/jWYSIWYG/jquery.wysiwyg.js"></script>
		
		<script>
			$('.confirm').live("click", function(){
						id = $('.id').attr('value');
						//alert(id);
						option = $('.option').attr('value');
							option = option.replace(/\"/g, "&quot;");
							option = option.replace(/\'/g, '&apos;');
						
						text = $('.text').attr('value');
							text = text.replace(/\"/g, "&quot;");
							text = text.replace(/\'/g, '&apos;');
						//	alert(text);

				SetArticle(id,'',text,'',1,'contact',option,'contact.php');
				
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
		
	</body>
</html>
