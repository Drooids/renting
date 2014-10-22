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
				
				// Tabs
				$('.demoTabs a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			$('.agrandir').live("click", function(){

				div = $(this).closest('.data-container').find('.cache');
				if($(div).is(":visible")){
					$(div).hide();
					$(this).html("Agrandir");
					$(this).addClass("btn-primary");
					$(this).removeClass("btn-success");
				}
				else{
					$(div).show();
					$(this).html("Reduire");
					$(this).addClass("btn-success");
					$(this).removeClass("btn-primary");
				}
					

				return false;
			});
			
			$('.changer').live("click", function(){
				gallery = $("#select-gallery option:selected").attr('value');
				//alert(gallery);
				SetGallery(gallery,'','','','accueil','accueil.php');

			});
			$('.modifier').live("click", function(){
				var id =$(this).data('click');
				window.location.replace("article-modif.php?id="+id+"&return=accueil.php");
				//alert(gallery);
				//SetGallery(gallery,'','','','accueil','accueil.php');

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
								
								
								<li class='active'><a href="accueil.php"><span class="fam-application-view-columns"></span>Accueil</a></li>
								<li ><a href="entreprise.php"><span class="fam-application-view-columns"></span>Entreprise</a></li>
								<li ><a href="portfolio.php"><span class="fam-application-view-columns"></span>Portfolio</a></li>
								<li ><a href="contact.php"><span class="fam-application-view-columns"></span>Contact</a></li>
								
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
					<li class="active"><a href="#">Accueil</a><span class="divider"></span></li>
					<!--<li class="active">Typography</li>-->
				</ul>

			<div style="margin-bottom:70px;">
						<header>
								<h2 id='title-gallery'>Accueil</h2>
						</header>
						
						
			</div>
		<div id='accueil' >
			<div class="row-fluid">	
				
			<!-- Gallery d'accueil-->
			<article class='span4 data-block nested arti' style='min-height:200px;'>
				<div class='data-container'>
						<div class='control-group'>
													<label class='control-label' for='select'>Gallerie d'accueil</label>
												<div class='controls'>
												</br>
												<select class='select-gallery' id='select-gallery' data-click=''>
												<?php


																
													$reponse = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery,text_gallery,option_fichier
																						FROM gallery ");

															
																	$donnees = $reponse->fetchAll();

																for($k=0;$k<count($donnees);$k++){


																		$id_gallery=$donnees[$k]['id_gallery'];
																		$nom_gallery=$donnees[$k]['nom_gallery'];
																		$link_gallery=$donnees[$k]['link_gallery'];
																		$img_gallery=$donnees[$k]['img_gallery'];
																		$text_gallery=$donnees[$k]['text_gallery'];
																		$option_fichier=$donnees[$k]['option_fichier'];

																		

																		
																		if($option_fichier != 'accueil'){
																			


																			echo"<option id='".$id_gallery."' value='".$id_gallery."'>";
																			echo $nom_gallery;
																			echo"</option>";
																		}else{
																			$all_id=$link_gallery;
																			echo"<option id='".$id_gallery."' value='".$id_gallery."' selected>";
																			echo $nom_gallery;
																			echo"</option>";
																		}
																			
																	}
																
															

												?>

												</select>
												<!--<button data-click='' class='btn btn-alt btn-large btn-primary confirm'  type='submit' style='float:right;'>Voir</button>-->
												
												</div>
												</br>
												<button class='btn btn-alt  btn-primary btn-danger changer'  type='submit' style='float:left; margin-top:5px;'>Changer</button>
												</div>

				</div>
			</article>
			<article class='span8 data-block nested arti'>
				<div class='data-container'>
					
								<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin fermentum tortor sed lectus dignissim nec ornare augue tincidunt. In adipiscing vulputate orci, ut aliquam nisi condimentum vitae. Nunc suscipit enim id diam venenatis mattis. Vestibulum id leo augue.</p>
								<ul class="thumbnails">
									<li class="span2"><a class="thumbnail" href="#"><img alt="Image 1" src="img/sample_content/sample-image-250x150.png"></a></li>
									<li class="span2"><a class="thumbnail" href="#"><img alt="Image 2" src="img/sample_content/sample-image-250x150.png"></a></li>
									<li class="span2"><a class="thumbnail" href="#"><img alt="Image 3" src="img/sample_content/sample-image-250x150.png"></a></li>
									<li class="span2"><a class="thumbnail" href="#"><img alt="Image 4" src="img/sample_content/sample-image-250x150.png"></a></li>
									<li class="span2"><a class="thumbnail" href="#"><img alt="Image 5" src="img/sample_content/sample-image-250x150.png"></a></li>
									<li class="span2"><a class="thumbnail" href="#"><img alt="Image 6" src="img/sample_content/sample-image-250x150.png"></a></li>
								</ul>-->

					<?php

					 $all_id = explode(",", $all_id );
						$longueur=count($all_id);

						for($k=0;$k<$longueur;$k++){
							$id=$all_id[$k];
							
							$reponse = $bdd->query("SELECT nom_fichier,id_fichier,text_fichier,titre_fichier
										FROM fichier
										where id_fichier = '$id' ");

			
							$donnees = $reponse->fetchAll();
							$start=$k+1;
							if(count($donnees) != 0){
								$nom_fichier=$donnees[0]['nom_fichier'];

							list($width, $height, $type, $attr) = getimagesize("upload/uploads/".$nom_fichier);

							$id_fichier=$donnees[0]['id_fichier'];
							$text_fichier=$donnees[0]['text_fichier'];
							$titre_fichier=$donnees[0]['titre_fichier'];
							$titre_fichier=html_entity_decode($titre_fichier, ENT_NOQUOTES,'UTF-8');
								
								if($k == 0){
									echo"<header>";
									echo"<h2>Information de la gallerie</h2>";
									echo"<ul class='data-header-actions tabs'>";
								
										for($i=0;$i<$longueur;$i++){
											$value=$i+1;
											if($i == 0){
												echo"<li class='demoTabs active'><a href='#tab-".$value."'>".$value."</a></li>";
											}else{
												echo"<li class='demoTabs'><a href='#tab-".$value."'>".$value."</a></li>";
											}
											
										}
									echo"</ul>";
									echo"</header>";
									echo"<section class='tab-content'>";
									
									echo"<div class='tab-pane active' id='tab-".$start."' >";
										
										echo"<div class='row-fluid gallery'>";
												
											echo"<div class='span6' >";
											echo"<div class='control-group'>";
											echo"<div class='controls'>";

											echo"<textarea id='textarea' class='wysiwyg text' rows='8' >".$text_fichier."</textarea>";
											echo"<input type='hidden' class='id_fichier' value='".$id_fichier."' />";
											echo"</div>";
											echo"</div>	";
											echo"</div>";

											echo"<div class='span4' >";
												echo"<section>";
												echo"<ul class='thumbnails' >";
												echo"<li class='span12'>";
												echo"<a class='thumbnail' href='#'>";
												echo"<img src='upload/uploads/".$nom_fichier."' alt='Image 1'>";
												echo"</a>";
												echo"</li>";
												echo"</ul>";
												echo"</section>";

												echo"<p>Taille: ".$height." x ".$width."</p>";
												echo"<label class='control-label' for='input'>Titre</label>";
												echo"<input type='text' class='input-medium titre' value='".$titre_fichier."'  style='width:100%; '/>";
											echo"</div>";
												
											
											

											
										echo"</div>";
										
									echo"</div>";
								}else{
									
									echo"<div class='tab-pane' id='tab-".$start."'>";
										echo"<div class='row-fluid gallery'>";
												
											echo"<div class='span6' >";
											echo"<div class='control-group'>";
											echo"<div class='controls'>";

											echo"<textarea id='textarea' class='wysiwyg text' rows='8' >".$text_fichier."</textarea>";
											echo"<input type='hidden' class='id_fichier' value='".$id_fichier."' />";
											echo"</div>";
											echo"</div>	";
											echo"</div>";

											echo"<div class='span4' >";
											
												echo"<section>";
												echo"<ul class='thumbnails' >";
												echo"<li class='span12'>";
												echo"<a class='thumbnail' href='#'>";
												echo"<img src='upload/uploads/".$nom_fichier."' alt='Image 1'>";
												echo"</a>";
												echo"</li>";
												echo"</ul>";
												echo"</section>";
												echo"<p>Taille: ".$height." x ".$width."</p>";
												echo"<label class='control-label' for='input'>Titre</label>";
												echo"<input type='text' class='input-medium titre' value='".$titre_fichier."' style='width:100%; ' />";
											echo"</div>";
												
											
											

											
										echo"</div>";
									echo"</div>";
								}
							}
							
								
						}
							echo"</section>";



						?>
					
				</div>
			</article>
			</div>
			<div class="row-fluid">	
			<!-- 3 articles -->
			<?php
							$reponse = $bdd->query("SELECT titre_article,id_article,text_article,img_article,option_article
													FROM article
													WHERE option_article = 'article-1' ");

			
							$donnees = $reponse->fetchAll();
		
							$titre_article=$donnees[0]['titre_article'];
							$id_article=$donnees[0]['id_article'];
							$text_article=$donnees[0]['text_article'];
							$img_article=$donnees[0]['img_article'];
							$option_article=$donnees[0]['option_article'];




			?>
			<!-- article 1 -->
			<article class='span4 data-block nested arti article' >
				<div class='data-container' >
					<header>
					<h2>Mini Article - 1</h2>
					<button class='btn btn-alt  btn-primary agrandir'  type='submit' style='float:right; margin-top:5px;'>Agrandir</button>
									
					</header>
					<div class='cache' style='display:none' >
						<div class="control-group" style="display:none">	
							<div class="controls">			
								<ul class='thumbnails' >
								<li class='span8'>
									<ul class='thumbnail-actions'>
									<a href='choose-image.php?id=<?php echo $id_article; ?>&type=article'  title='Edit'><span class='icon-pencil'></span></a>							  
									<li><a href='upload/download.php?filename=<?php echo $img_article; ?>' title='Download'><span class='icon-download'></span></a></li>
									</ul>
								<a class='thumbnail' href='#'>
								<img src='upload/uploads/<?php echo $img_article; ?>' alt='Image 1'>
								</a>
								</li>
								</ul>
							</div>				
						</div>
						

						<div class="control-group">
							<label class="control-label" for="input"><?php echo html_entity_decode($titre_article, ENT_NOQUOTES,'UTF-8'); ?></label>
							<div class="controls">
								<?php  echo html_entity_decode($text_article, ENT_NOQUOTES,'UTF-8'); ?>
							</div>
							<button data-click='<?php echo $id_article; ?>' class='btn btn-alt btn-danger btn-primary modifier'  type='submit' style='margin-bottom:20px; float:right;'>Modifier</button>
									
						</div>
				</div>
				</div>
			</article>
			
			<?php
							$reponse = $bdd->query("SELECT titre_article,id_article,text_article,img_article,option_article
													FROM article
													WHERE option_article = 'article-2' ");

			
							$donnees = $reponse->fetchAll();
		
							$titre_article=$donnees[0]['titre_article'];
							$id_article=$donnees[0]['id_article'];
							$text_article=$donnees[0]['text_article'];
							$img_article=$donnees[0]['img_article'];
							$option_article=$donnees[0]['option_article'];



			?>
			<!-- article 2-->
			<article class='span4 data-block nested arti article' >
				<div class='data-container' >
					<header>
					<h2>Mini Article - 2</h2>
					<button class='btn btn-alt  btn-primary agrandir'  type='submit' style='float:right; margin-top:5px;'>Agrandir</button>
									
					</header>
					<div class='cache' style='display:none' >
						<div class="control-group" style="display:none">	
							<div class="controls">			
								<ul class='thumbnails' >
								<li class='span8'>
									<ul class='thumbnail-actions'>
									<a href='choose-image.php?id=<?php echo $id_article; ?>&type=article'  title='Edit'><span class='icon-pencil'></span></a>							  
									<li><a href='upload/download.php?filename=<?php echo $img_article; ?>' title='Download'><span class='icon-download'></span></a></li>
									</ul>
								<a class='thumbnail' href='#'>
								<img src='upload/uploads/<?php echo $img_article; ?>' alt='Image 1'>
								</a>
								</li>
								</ul>
							</div>				
						</div>
						

						<div class="control-group">
							<label class="control-label" for="input"><?php echo html_entity_decode($titre_article, ENT_NOQUOTES,'UTF-8'); ?></label>
							<div class="controls">
								<?php  echo html_entity_decode($text_article, ENT_NOQUOTES,'UTF-8'); ?>
							</div>
							<button data-click='<?php echo $id_article; ?>' class='btn btn-alt btn-danger btn-primary modifier'  type='submit' style='margin-bottom:20px; float:right;'>Modifier</button>
									
						</div>
				</div>
				</div>
			</article>

			<?php
							$reponse = $bdd->query("SELECT titre_article,id_article,text_article,img_article,option_article
													FROM article
													WHERE option_article = 'article-3' ");

			
							$donnees = $reponse->fetchAll();
		
							$titre_article=$donnees[0]['titre_article'];
							$id_article=$donnees[0]['id_article'];
							$text_article=$donnees[0]['text_article'];
							$img_article=$donnees[0]['img_article'];
							$option_article=$donnees[0]['option_article'];



			?>
			<!-- article 3 -->

			<article class='span4 data-block nested arti article' >
				<div class='data-container' >
					<header>
					<h2>Mini Article - 3</h2>
					<button class='btn btn-alt  btn-primary agrandir'  type='submit' style='float:right; margin-top:5px;'>Agrandir</button>
									
					</header>
					<div class='cache' style='display:none' >
						<div class="control-group" style="display:none">	
							<div class="controls">			
								<ul class='thumbnails' >
								<li class='span8'>
									<ul class='thumbnail-actions'>
									<a href='choose-image.php?id=<?php echo $id_article; ?>&type=article'  title='Edit'><span class='icon-pencil'></span></a>							  
									<li><a href='upload/download.php?filename=<?php echo $img_article; ?>' title='Download'><span class='icon-download'></span></a></li>
									</ul>
								<a class='thumbnail' href='#'>
								<img src='upload/uploads/<?php echo $img_article; ?>' alt='Image 1'>
								</a>
								</li>
								</ul>
							</div>				
						</div>
						

						<div class="control-group">
							<label class="control-label" for="input"><?php echo html_entity_decode($titre_article, ENT_NOQUOTES,'UTF-8'); ?></label>
							<div class="controls">
								<?php  echo html_entity_decode($text_article, ENT_NOQUOTES,'UTF-8'); ?>
							</div>
							<button data-click='<?php echo $id_article; ?>' class='btn btn-alt btn-danger btn-primary modifier'  type='submit' style='margin-bottom:20px; float:right;'>Modifier</button>
									
						</div>
				</div>
				</div>
			</article>
		</div>
			<!-- 4 Articles --> 

			<?php
							$reponse = $bdd->query("SELECT titre_article,id_article,text_article,img_article,option_article
													FROM article
													WHERE option_article = 'article-4' ");

			
							$donnees = $reponse->fetchAll();
		
							$titre_article=$donnees[0]['titre_article'];
							$id_article=$donnees[0]['id_article'];
							$text_article=$donnees[0]['text_article'];
							$img_article=$donnees[0]['img_article'];
							$option_article=$donnees[0]['option_article'];



			?>
			<!-- article 4 -->
		<div class="row-fluid">	
			<article class='span3 data-block nested arti article'>
				<div class='data-container'>
					<header>
					<h2>Article - 1</h2>
					<button class='btn btn-alt  btn-primary agrandir'  type='submit' style='float:right; margin-top:5px;'>Agrandir</button>
									
					</header>
					<div class='cache' style='display:none' >
						<div class="control-group">	
							<div class="controls">			
								<ul class='thumbnails' >
								<li class='span12'>
									<ul class='thumbnail-actions' style='width:50px;'>
									<a href='choose-image.php?id=<?php echo $id_article; ?>&type=article'  title='Edit'><span class='icon-pencil'></span></a>							  
									<li><a href='upload/download.php?filename=<?php echo $img_article; ?>' title='Download'><span class='icon-download'></span></a></li>
									</ul>
								<a class='thumbnail' href='#'>
								<img src='upload/uploads/<?php echo $img_article; ?>' alt='Image 1'>
								</a>
								</li>
								</ul>
								<p><?php if($img_article != 'false' && $img_article !=''){
									list($width, $height, $type, $attr) = getimagesize("upload/uploads/".$img_article);

									echo 'Taille: '.$height.' x '.$width;
								}
									  ?></p>
							</div>				
						</div>
						<div class="control-group">
							<label class="control-label" for="input"><?php echo html_entity_decode($titre_article, ENT_NOQUOTES,'UTF-8'); ?></label>
							<div class="controls">
								<?php  echo html_entity_decode($text_article, ENT_NOQUOTES,'UTF-8'); ?>
							</div>
							<button data-click='<?php echo $id_article; ?>' class='btn btn-alt btn-danger btn-primary modifier'  type='submit' style='margin-bottom:20px; float:right;'>Modifier</button>
									
						</div>
					</div>
				</div>
			</article>

			<?php
							$reponse = $bdd->query("SELECT titre_article,id_article,text_article,img_article,option_article
													FROM article
													WHERE option_article = 'article-5' ");

			
							$donnees = $reponse->fetchAll();
		
							$titre_article=$donnees[0]['titre_article'];
							$id_article=$donnees[0]['id_article'];
							$text_article=$donnees[0]['text_article'];
							$img_article=$donnees[0]['img_article'];
							$option_article=$donnees[0]['option_article'];



			?>
			<!-- article 5 -->
			<article class='span3 data-block nested arti article'>
				<div class='data-container'>
					<header>
					<h2>Article - 2</h2>
					<button class='btn btn-alt  btn-primary agrandir'  type='submit' style='float:right; margin-top:5px;'>Agrandir</button>
									
					</header>
					<div class='cache' style='display:none' >
						<div class="control-group">	
							<div class="controls">			
								<ul class='thumbnails' >
								<li class='span12'>
									<ul class='thumbnail-actions' style='width:50px;'>
									<a href='choose-image.php?id=<?php echo $id_article; ?>&type=article'  title='Edit'><span class='icon-pencil'></span></a>							  
									<li><a href='upload/download.php?filename=<?php echo $img_article; ?>' title='Download'><span class='icon-download'></span></a></li>
									</ul>
								<a class='thumbnail' href='#'>
								<img src='upload/uploads/<?php echo $img_article; ?>' alt='Image 1'>
								</a>
								</li>
								</ul>
								<p><?php if($img_article != 'false' && $img_article !=''){
									list($width, $height, $type, $attr) = getimagesize("upload/uploads/".$img_article);

									echo 'Taille: '.$height.' x '.$width;
								}
									  ?></p>
							</div>				
						</div>
						<div class="control-group">
							<label class="control-label" for="input"><?php echo html_entity_decode($titre_article, ENT_NOQUOTES,'UTF-8'); ?></label>
							<div class="controls">
								<?php  echo html_entity_decode($text_article, ENT_NOQUOTES,'UTF-8'); ?>
							</div>
							<button data-click='<?php echo $id_article; ?>' class='btn btn-alt btn-danger btn-primary modifier'  type='submit' style='margin-bottom:20px; float:right;'>Modifier</button>
									
						</div>
					</div>
				</div>
			</article>
			<?php
							$reponse = $bdd->query("SELECT titre_article,id_article,text_article,img_article,option_article
													FROM article
													WHERE option_article = 'article-6' ");

			
							$donnees = $reponse->fetchAll();
		
							$titre_article=$donnees[0]['titre_article'];
							$id_article=$donnees[0]['id_article'];
							$text_article=$donnees[0]['text_article'];
							$img_article=$donnees[0]['img_article'];
							$option_article=$donnees[0]['option_article'];



			?>
			<!-- article 6 -->
			<article class='span3 data-block nested arti article'>
				<div class='data-container'>
					<header>
					<h2>Article - 3</h2>
					<button class='btn btn-alt  btn-primary agrandir'  type='submit' style='float:right; margin-top:5px;'>Agrandir</button>
									
					</header>
					<div class='cache' style='display:none' >
						<div class="control-group">	
							<div class="controls">			
								<ul class='thumbnails' >
								<li class='span12'>
									<ul class='thumbnail-actions' style='width:50px;'>
									<a href='choose-image.php?id=<?php echo $id_article; ?>&type=article'  title='Edit'><span class='icon-pencil'></span></a>							  
									<li><a href='upload/download.php?filename=<?php echo $img_article; ?>' title='Download'><span class='icon-download'></span></a></li>
									</ul>
								<a class='thumbnail' href='#'>
								<img src='upload/uploads/<?php echo $img_article; ?>' alt='Image 1'>
								</a>
								</li>
								</ul>
								<p><?php if($img_article != 'false' && $img_article !=''){
									list($width, $height, $type, $attr) = getimagesize("upload/uploads/".$img_article);

									echo 'Taille: '.$height.' x '.$width;
								}
									  ?></p>
							</div>				
						</div>
						<div class="control-group">
							<label class="control-label" for="input"><?php echo html_entity_decode($titre_article, ENT_NOQUOTES,'UTF-8'); ?></label>
							<div class="controls">
								<?php  echo html_entity_decode($text_article, ENT_NOQUOTES,'UTF-8'); ?>
							</div>
							<button data-click='<?php echo $id_article; ?>' class='btn btn-alt btn-danger btn-primary modifier'  type='submit' style='margin-bottom:20px; float:right;'>Modifier</button>
									
						</div>
					</div>
				</div>
			</article>
			<?php
							$reponse = $bdd->query("SELECT titre_article,id_article,text_article,img_article,option_article
													FROM article
													WHERE option_article = 'article-7' ");

			
							$donnees = $reponse->fetchAll();
		
							$titre_article=$donnees[0]['titre_article'];
							$id_article=$donnees[0]['id_article'];
							$text_article=$donnees[0]['text_article'];
							$img_article=$donnees[0]['img_article'];
							$option_article=$donnees[0]['option_article'];




			?>
			<!-- article 7 -->
			<article class='span3 data-block nested arti article'>
				<div class='data-container'>
					<header>
					<h2>Article - 4</h2>
					<button class='btn btn-alt  btn-primary agrandir'  type='submit' style='float:right; margin-top:5px;'>Agrandir</button>
									
					</header>
					<div class='cache' style='display:none' >
						<div class="control-group">	
							<div class="controls">

								<ul class='thumbnails' >
								
									
								
								<li class='span12'>
									<ul class='thumbnail-actions' style='width:50px;'>
									<a href='choose-image.php?id=<?php echo $id_article; ?>&type=article'  title='Edit'><span class='icon-pencil'></span></a>							  
									<li><a href='upload/download.php?filename=<?php echo $img_article; ?>' title='Download'><span class='icon-download'></span></a></li>
									</ul>
								<a class='thumbnail' href='#'>
								<img src='upload/uploads/<?php echo $img_article; ?>' alt='Image 1'>
								</a>
								</li>
								</ul>
								<p><?php if($img_article != 'false' && $img_article !=''){
									list($width, $height, $type, $attr) = getimagesize("upload/uploads/".$img_article);

									echo 'Taille: '.$height.' x '.$width;
								}
									  ?></p>
							</div>				
						</div>
						<div class="control-group">
							<label class="control-label" for="input"><?php echo html_entity_decode($titre_article, ENT_NOQUOTES,'UTF-8'); ?></label>
							<div class="controls">
								<?php  echo html_entity_decode($text_article, ENT_NOQUOTES,'UTF-8'); ?>
							</div>
							<button href='<?php echo $id_article; ?>' class='btn btn-alt btn-danger btn-primary modifier'  type='submit' style='margin-bottom:20px; float:right;'>Modifier</button>
									
						</div>
					</div>
				</div>
			</article>
		</div>	
			<!-- Partenaires -->
			<div class="control-group" style='position:absolute; '>
									<!--<label class='control-label' for='optionsRadios'>Liens</label>-->
									<div class='controls'>
									
											
										
										<!--<p class='help-block'>Mettre le liens correspondant</p>
										<input  type='text' value='<?php echo $link_portfolio; ?>' name='id' />-->
										</br>
										<button data-click='' class='btn btn-alt btn-large btn-danger btn-primary confirm'  type='submit' style='margin-top:20px;'>Save changes</button>
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

		
		<!-- Wysihtml5 -->
		
		<!-- Highlight gallery item when clicked -->
		<script>
			$(document).ready(function() {

				var title ='';
				var text ='';
				var img ='';
				var id ='';
				var option ='';

				$('.confirm').live("click", function(){
						//alert($('.article').length);

				var gallery = $("#select-gallery option:selected").attr('value');
			
					


					$(".gallery").each(function() {
						var id_fi = $(this).find('.id_fichier').attr('value');
						//alert(id_fi);
						var titre_fi = $(this).find('.titre').attr('value');
								titre_fi = titre_fi.replace(/\"/g, "&quot;");
								titre_fi = titre_fi.replace(/\'/g, '&apos;');
								//alert(titre_fi);
						var text_fi = $(this).find('.text').attr('value');
								text_fi = text_fi.replace(/\"/g, "&quot;");
								text_fi = text_fi.replace(/\'/g, '&apos;');
						SetTextFichier(id_fi,text_fi,titre_fi,'',null)
					});
			
					SetGallery(gallery,'','','','accueil','accueil.php');


					

					return false;
				});
				

				
					
					
				$('.form-gallery input[type="checkbox"]').click(function() {
					$(this).next('.thumbnail').toggleClass('active');
				});
				$('.form-gallery input[type="checkbox"]:checked').next('.thumbnail').addClass('active');

				$('.wysiwyg').wysiwyg();
				
				

			});

			
		</script>
		
	</body>
</html>
