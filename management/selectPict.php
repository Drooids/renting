<?php session_start(); 

        if(isset($_SESSION['username'])) {
        	//echo $_SESSION['username'];
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

				afficheSelectionPhoto();

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
				
			});
		</script>
	</head>
	<body>
			<div class="container-fluid">
		
			<!-- Left (navigation) side -->
			<div class="sidebar">
			
				<!-- Sidebar user info -->
				<figure class="user-profile"><div id='nickname-pict'>Veuillez cliquer sur la photo de votre choix</div>
					
					
				</figure>
			</div>
		</div>
		<!-- Main page header -->
		
		<!-- /Main page header -->
		
		<!-- Full page alert -->
		
		<!-- /Full page alert -->
		
		<!-- Main page container -->
		<div class="container-fluid">
		
			<!-- Left (navigation) side -->
			<p></p>
			<!-- /Left (navigation) side -->
			
			<!-- Right (content) side -->
			<div class="content-block" role="main">
				
				<!-- Grid row -->
				<div class="row-fluid">
				
					<!-- Data block  -->
					<article class="span12 data-block">
						<div class="data-container">
							
							<section>
								<form id='biblio' class="form-gallery">
									
									
								</form>
							</section>
						</div>
					</article>
					<!-- /Data block  -->
					
				</div>
				<!-- /Grid row -->

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
		<?php include 'php/notification.php'; ?>
	</body>
</html>
