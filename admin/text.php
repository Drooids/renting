<?php session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_right = $_SESSION['user_right'];

		if($user_right > 0)
			header('Location: index.php');
		
		include('php/class.load.php');
		include('php/class.traduction.php');
	}else{
		header('Location: login.html');
	}
										function printTraduction($id,$langue){
	   										$traduction = new traduction($id);
	   										$name = $traduction->name;
	   										$id = $traduction->id;
	   										$original = $traduction->original;
	   										$type = $traduction->type;
	   										echo "<!-- debut champ de texte -->";
	   										echo "<div class='panel panel-default' >";
											echo "<div class='panel-heading'>";
											echo "<h4 class='panel-title'>".$name;
											echo "<button style='float:right; margin-top:2px;' class='btn btn-danger save' data-id='".$id."' data-type='".$type."' data-langue='".$langue."'><i class='icon-ok'></i></button>";
											echo "</h4>";
											echo"</div><div class='content'>";
											echo"<ul class='nav nav-tabs'>";
												$langueExplode = explode(';', $langue);
												foreach ($langueExplode as $key => $value) {
													if($key == 0)
														echo "<li class='active'><a data-toggle='tab' href='#".$id."-".$value."'><i class='flag-".$value."'></i></a></li>";
													else
														echo "<li><a data-toggle='tab' href='#".$id."-".$value."'><i class='flag-".$value."'></i></a></li>";
												}
											echo "</ul>";
											echo "<div class='tab-content' >";
												$langueExplode = explode(';', $langue);
												foreach ($langueExplode as $key => $value) {
													if($key == 0)
														echo"<div id='".$id."-".$value."' class='tab-pane active' data-langue='".$value."'>";
													else
														echo"<div id='".$id."-".$value."' class='tab-pane ' data-langue='".$value."'>";

													echo"<textarea class='textarea' id='".$id."-".$value."' name='".$id."-".$value."'>".$traduction->$value."</textarea>";
													echo"</div>";
												}

											echo "</div>";
											echo "</div>";
											echo "</div>";
											echo "<!-- Fin de champ de texte -->";
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
	<!-- jQuery TagsInput Styles -->
		<link rel='stylesheet' type='text/css' href='css/plugins/jquery.tagsinput.css'>
	<!-- aditional stylesheets -->
		<!-- sticky -->        
			<link rel="stylesheet" href="js/lib/Sticky/sticky.css">
	<!-- aditional stylesheets -->
        <!-- fullcalendar -->
			<link rel="stylesheet" href="js/lib/fullcalendar/fullcalendar.css">
		<!-- linecons -->        
			<link rel="stylesheet" href="css/linecons/style.css">
	<!-- select2 -->
			<link rel="stylesheet" href="js/lib/select2/select2.css">
			<link rel="stylesheet" href="js/lib/select2/ebro_select2.css">
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
			<style type="text/css">
				/* jQuery Tags Input */
div.tagsinput {
  -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #FFFFFF;
    border-color: #C0C0C0 #D9D9D9 #D9D9D9;
    width: auto !important;
  height: auto !important;
    border-image: none;
    border-radius: 1px;
    border-style: solid;
    border-width: 1px;
    box-shadow: none;
    font-size: 13px;
    height: 200px;
    line-height: 1.4;
    padding: 5px 8px;
    transition: none 0s ease 0s;
}
div.tagsinput.focused {
  outline: 0;
  border-color: rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 5px rgba(0,0,0,.3);
  -moz-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 5px rgba(0,0,0,.3);
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 5px rgba(0,0,0,.3);
}
div.tagsinput span.tag {
  text-shadow: none;
  line-height: normal;
  padding: 4px;
  margin: 5px 5px 0 0;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  background: #2992C8;
  border-color: #2992C8;
  color: #ffffff;
}
div.tagsinput span.tag a {
  color: #ffffff;
  opacity: 0.5;
  filter: alpha(opacity=50);
}
div.tagsinput span.tag a:hover {
  opacity: 1;
  filter: alpha(opacity=100);
}
div.tagsinput input {
  margin: 5px 0 0;
}
div.tagsinput #inputTag_tag {
  color: #b2b2b2 !important;
}
div.tagsinput #inputTag_tag.not_valid {
  background-color: transparent !important;
  color: #b94a48 !important;
}
			</style>
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
						
						<!-- main content -->
						<div class="row">
							<div class="col-sm-12 ">
								<div class="row">
									<div class="col-sm-3 col-md-2">
										<div class="mailbox_nav">
											<div class="sepH_b">
												<a data-toggle="modal" href="#newMail" class="btn btn-default btn-sm">New Traduction</a>
											</div>
											<ul class="nav nav-pills nav-stacked">
												<li class="active" ><a href="#" data-id='main'>Main</a></li>
												<li><a href="#" data-id='properties'>Properties</a></li>
												<li><a href="#" data-id='contact'>Contact</a></li>
												<li><a href="#" data-id='other'>Other</a></li>
											</ul>
										</div>
									</div>
									<div class="col-sm-9 col-md-10 all main">
									<?php
										$langue ="US;FR;VN";
										//Accueil Title
										$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='Accueil_1' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);
	   									// Acueill text - 1
	   									$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='Accueil_2' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);
	   									// Accueil text -2
	   									$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='Accueil_3' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);

									?>
									

								
									
									</div>
									<div class="col-sm-9 col-md-10 all contact" style='display:none;'>
									<?php
										$langue ="US;FR;VN";
										// Contact 1
										$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_1' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);
	   									// Contact 2
	   									$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_2' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);
	   									// Contact 3
	   									$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_3' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);
	   									// Contact 4
	   									$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_4' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);
	   									// Contact 5
	   									$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_5' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);
	   									// Contact 6
	   									$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_6' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);
	   									// Contact 7
	   									$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_7' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);
	   									// Contact 8
	   									$reponse = $bdd->query("SELECT * FROM traduction WHERE name ='contact_8' ");
	   									$donnees = $reponse->fetchAll();
	   									printTraduction($donnees[0]['id'],$langue);

									?>
									

								
									
									</div>

								</div>
						
							</div>
						</div>
				

					</div>
				</div>

			<?php include('widget/dashboard.php'); ?>
			</section>
			<div id="footer_space"></div>
		</div>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        &copy; 2013 Home Saigon by Rebmann Guillaume
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
        
	<?php include('javascript_file.php'); ?>
		<script src="js/jquery.quicksearch.js"></script>
		<!-- wysiwg -->
			<script src="js/lib/ckeditor/ckeditor.js"></script>
		<!-- select2 -->
		<script src="js/lib/select2/select2.min.js"></script>
		<script src="js/lib/parsley/parsley.min.js"></script>
		<script src="js/lib/tagsInput/jquery.tagsinput.js"></script>
		<!-- sticky -->
			<script src="js/lib/Sticky/sticky.js"></script>
		<script type="text/javascript">
							   $(function(){
							   		CKEDITOR.replaceAll( 'textarea',
												CKEDITOR.tools.extend (
												{
													height: 200,
													extraPlugins: 'autogrow',
													autoGrow_maxHeight: 400
												})
											);
							   		 //* sticky
										ebro_sticky = {
											init: function(text) {
									                var defaults = {
									                    position: 'top-right', // top-left, top-right, bottom-left, or bottom-right
									                    speed: 'fast', // animations: fast, slow, or integer
									                    allowdupes: false, // true or false
									                    autoclose: 0,  // delay in milliseconds. Set to 0 to remain open.
									                    classList: '' // arbitrary list of classes. Suggestions: success, warning, important, or info. Defaults to ''.
									                };
									               $.stickyNote(text, $.extend({}, defaults, {classList: 'stickyNote-success'}));
									            }
										}

							   		$(".save").on( "click",function(){
							   			$(this).removeClass('btn-danger');
							   			$(this).addClass('btn-success');
							   			var object = $(this);
							   			setTimeout(function (){
												object.removeClass('btn-success');
							   					object.addClass('btn-danger');
								         }, 5000);
							   			var myinstances = [];
										for(var i in CKEDITOR.instances) {
										   myinstances[CKEDITOR.instances[i].name] = CKEDITOR.instances[i].getData(); 

										}
										//console.log(myinstances);
										var langue = $(this).data('langue');
										var id = $(this).data('id');
											langue = langue.split(';');
										//console.log(id+"-FR");
										//console.log(myinstances[id+'-FR']);
										for(var i in langue){
											//console.log(myinstances[id+"-"+langue[i]]);
											$.post('php/admin.traduction.php',{id:id,langue:langue[i],text:myinstances[id+"-"+langue[i]],action:'change'},function(e){
												//console.log(myinstances[id+"-"+langue[i]]);
												
											});
										}
										ebro_sticky.init("The text for the id: "+id+" has been changed");
										
												

										//console.log(myinstances);
							   			return false;
							   		});
						          
								$('.nav-stacked li a').on('click',function(){
									var data = $(this).data('id');
									var olderData = $('.nav-stacked .active a').data('id');
									$('.nav-stacked .active').removeClass('active');
									$(this).parent().addClass('active');
									$('.'+olderData).hide();
									$('.'+data).show();
									//alert('hello');
									return false;
								});


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