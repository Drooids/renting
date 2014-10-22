<?php session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_right = $_SESSION['user_right'];
		$tuto = null;
		include('php/class.load.php');
		include('php/class.tutorial.php');
		$reponse =$bdd->query("SELECT id FROM tutorial WHERE user_id='$user_id'");
		$reponse = $reponse->fetchAll();
				if(count($reponse) != 0){
					$id =$reponse[0]['id'];
					
					$tutorial = new tutorial($id);
					if($tutorial->check(1) == false){
						$tuto = 1;
						
					}else{
						$tuto = 0;
						
					}
				}
	}else{
		header('Location: login.php');
	}

 ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home - Saigon  1.0</title>
		
		<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
	<!-- bootstrap framework-->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- todc-bootstrap -->
		<link rel="stylesheet" href="css/todc-bootstrap.min.css">
	<!-- font awesome -->        
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<!-- flag icon set -->        
		<link rel="stylesheet" href="img/flags/flags.css">
	<!-- retina ready -->
		<link rel="stylesheet" href="css/retina.css">	
	<!-- Intro Js CSS -->
		<link href="css/introjs.css" rel="stylesheet">
	<!-- aditional stylesheets -->
        <!-- fullcalendar -->
			<link rel="stylesheet" href="js/lib/fullcalendar/fullcalendar.css">
		<!-- linecons -->        
			<link rel="stylesheet" href="css/linecons/style.css">

	<!-- ebro styles -->
		<link rel="stylesheet" href="css/style.css">
	<!-- ebro theme -->
		<link rel="stylesheet" href="css/theme/color_1.css" id="theme">
		
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/ie.css">
		<script src="js/ie/html5shiv.js"></script>
		<script src="js/ie/respond.min.js"></script>
		<script src="js/ie/excanvas.min.js"></script>
	<![endif]-->

	<!-- custom fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
			
	</head>
	<body class="boxed pattern_1 sidebar_hidden">
		
		<div id="wrapper_all">
			<header id="top_header">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-2">
							<a href="index.html" class="logo_main" title="Home - Saigon "><img src="img/logo_main.png" alt=""></a>
						</div>
						<?php include('widget/message.php'); ?>
					</div>
				</div>
			</header>						
			<?php include('widget/menu.php'); ?>
                
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">

				 		<?php include('widget/indexUserWidget.php'); ?>
	

					</div>
				</div>

			
			</section>
			<div id="footer_space"></div>
		</div>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        &copy; 2013 Home Saigon
                    </div>
                    <div class="col-sm-8">
                        <ul>
                            <li><a href="#">Dashboard</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Terms of Service</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li>&middot;</li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-1 text-right">
                        <small class="text-muted">v1.0</small>
                    </div>
                </div>
            </div>
        </footer>
    <script type="text/javascript" src="js/intro.js"></script>    
	<?php include('javascript_file.php'); ?>

	<script type="text/javascript">
	jQuery(document).ready(function($){
		var tuto = "<?php echo $tuto; ?>";
		if(tuto == 1){
			var tutoJS = introJs().setOption("showBullets",false);
			tutoJS.start(".tuto_1");
			tutoJS.onexit(function() {
			 $.post('php/admin.SetTutorial.php',{action:'done',tuto_num:1},function(){

			 });
			});
			tutoJS.oncomplete(function() {
			   $.post('php/admin.SetTutorial.php',{action:'done',tuto_num:1},function(){

			 });
			});
		}
		
		});
	</script>
	

	<!--[if lte IE 9]>
		<script src="js/ie/jquery.placeholder.js"></script>
		<script>
			$(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	
    
	</body>
</html>