<?php session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_right = $_SESSION['user_right'];
		if($user_right == 0)
			header('Location: index.php');

		include('php/class.load.php');
	}else{
		header('Location: login.php');
	}

	if(isset($_GET['client_id'])){
		$target_id = $_GET['client_id'];
		$target_type="client";
	}else if(isset($_GET['user_id'])){
		$target_id = $_GET['user_id'];
		$target_type ="user";
	}else{
		$target_id = "";
		$target_type = "";
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
		<!--<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		-->
		<style type="text/css">
			.ListUser{
				display:none;
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
						<div class="chat_app">
							<div class="row">
								<div class="col-sm-8 col-md-9">
									<div class="panel panel-default loadChat">
										
									</div>
								</div>
								<div class="col-sm-4 col-md-3 chat_users">
									<div class="panel panel-default">
										<div class="panel-heading">

										<?php
										//if($user_right == 0){
										//	$reponse = $bdd->query("SELECT id FROM client ORDER BY last_name DESC");
										//}else{
											$reponse = $bdd->query("SELECT DISTINCT message_from as id FROM message WHERE message_to ='$user_id' AND message_from <> 0 AND user = 'client' ORDER BY message_timestamp");
										//}
											
	   										$reponse = $reponse->fetchAll();
										?>
											<h4 class="panel-title pull-left contactTitle">Contact</h4>
											<button class="btn btn-default btn-sm pull-right refreshList" style='float:left;' type="button" ><span class="icon-refresh"></span></button>
										<?php //if($user_right == 0){ ?> <!--<button class="btn btn-default btn-sm pull-right changeList" type="button" data-statut='ListClient'><span class="icon-th-large"></span></button>--> <?php //} ?>
											
										</div>
										<table class="table table-striped">
											<tbody class='ListClient'>
											<?php
											//Online
											if($user_right != 0){
													echo"<tr >";
													echo"<td class=''><a href='#' data-id='0' class='userId '><span class='stat stat_online'></span>Home-Saigon Staff</a></td>";
													echo"</tr>";
												}

											foreach ($reponse as $key => $value) {
												if($value['id'] != 0){
													$clientList = new client($value['id']);
													$current_time   = time();
	    
													$different = $current_time - $clientList->last_connection;
													if($different < 300){
														echo"<tr >";
														echo"<td class=><a href='#' data-id='".$clientList->id."' class='clientId '><span class='stat stat_online'></span>".$clientList->last_name." ".$clientList->name."</a></td>";
														echo"</tr>";
													}
												}

												
											}

											
											// Offline
											foreach ($reponse as $key => $value) {
												
													// User
													if($value['id'] != 0){
														$clientList = new client($value['id']);
														$current_time   = time();
	    
														$different = $current_time - $clientList->last_connection;
														if($different >= 300){
															
															echo"<tr>";
															echo"<td><a href='#' data-id='".$clientList->id."' class='clientId'><span class='stat stat_offline'></span>".$clientList->last_name." ".$clientList->name."</a></td>";
															echo"</tr>";
														}
													}
												
												
												
											}
											// Pour le chat entre admins:



											?>

												
											</tbody>
											
										<?php
											/*if($user_right == 0){
											echo"<tbody class='ListUser'>";
												$reponse = $bdd->query("SELECT DISTINCT user_id AS id  FROM users WHERE right_user <> 0 ORDER BY user_id");
												$reponse = $reponse->fetchAll();

	   										$timestamp = strtotime('yesterday midnight');
	   										//Online
												foreach ($reponse as $key => $value) {
													if($value['id'] != 0){
														$userList = new user($value['id']);
														$current_time   = time();
		    
														$different = $current_time - $userList->last_connection;
														if($different < 300){
															if($userList->last_name == "")
																$name = $userList->username;
															else
																$name = $userList->last_name." ".$userList->name;
															echo"<tr >";
															echo"<td class=><a href='#' data-id='".$userList->id."' data-right='".$userList->right."' class='userId'><span class='stat stat_online'></span>".$name."</a></td>";
															echo"</tr>";
														}
													}

													
												}

											
											// Offline
												foreach ($reponse as $key => $value) {
													
														// User
														if($value['id'] != 0){
															$userList = new user($value['id']);
															$current_time   = time();
		    
															$different = $current_time - $userList->last_connection;
															if($different >= 300){
																if($userList->last_name == "")
																	$name = $userList->username;
																else
																	$name = $userList->last_name." ".$userList->name;
																echo"<tr>";
																echo"<td><a href='#' data-id='".$userList->id."' data-right='".$userList->right."' class='userId'><span class='stat stat_offline'></span>".$name."</a></td>";
																echo"</tr>";
															}
														}
													
													
													
												}
												echo "</tbody>";
											
										}
										*/
											?>

												
											
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- End main conntent -->

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
                        &copy; 2013 Home Saigon
                    </div>
                    <div class="col-sm-8">
                        <ul>
                            <li><a href="index.php">Dashboard</a></li>
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
    <!-- jQuery -->
		<script src="js/jquery.min.js"></script>
	<!-- bootstrap framework -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- jQuery resize event -->
		<script src="js/jquery.ba-resize.min.js"></script>
	<!-- jquery cookie -->
		<script src="js/jquery_cookie.min.js"></script>
	<!-- retina ready -->
		<script src="js/retina.min.js"></script>
	<!-- tinyNav -->
		<script src="js/tinynav.js"></script>
	<!-- sticky sidebar -->
		<script src="js/jquery.sticky.js"></script>
	<!-- Navgoco -->
		<script src="js/lib/navgoco/jquery.navgoco.min.js"></script>
	<!-- jMenu -->
		<script src="js/lib/jMenu/js/jMenu.jquery.js"></script>
	<!-- typeahead -->
        <script src="js/lib/typeahead.js/typeahead.min.js"></script>
        <script src="js/lib/typeahead.js/hogan-2.0.0.js"></script>
	
		<script src="js/ebro_common.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		var firstID = "<?php echo $target_id; ?>";
		var firstType = "<?php echo $target_type; ?>";
		var id = 20;
		var user_right = "<?php echo $user_right; ?>";
		
		// Fonctions de selections et de chargement

			ChatLoader = { // Le chat Loader est modifié pour les iFrames
					init:function(){
						//alert(parent.length);
						if(parent.length)
							parent.$('body').append("<div class='DivChatLoaderImg'></div>");
						else
							$('body').append("<div class='DivChatLoaderImg'></div>");
					},
					showLoader: function(){
						var loader = "<div  class='ChatLoaderImg' style='position:fixed; background-color: black; opacity:0.5;position:fixed;left:0;bottom:0;width:100%;height:100%;z-index:500; overflow-y:hidden;'><img src='img/loader.gif' style='display: block;margin-left: auto;margin-right: auto; margin-top:20%;'></div></div>";
						if(parent.length){
							parent.$('.DivChatLoaderImg').html(loader);
							parent.$('html, body').css({'overflow': 'hidden','height': '100%'});
						}else{
							$('.DivChatLoaderImg').html(loader);
							$('html, body').css({'overflow': 'hidden','height': '100%'});
						}
						
					},
					hideLoader: function(){
						if(parent.length){
							parent.$('.DivChatLoaderImg').html("");
							parent.$('html, body').css({'overflow': 'auto','height': 'auto'});
						}else{
							$('.DivChatLoaderImg').html("");
							$('html, body').css({'overflow': 'auto','height': 'auto'});
						}
						
					}
				}
		ChatHover = {
					add: function(id){
						if($('.active_user').length){
							$('.active_user').removeClass('active_user');
						}
						id.parent().addClass('active_user');
					},
					remove: function(id){
						id.removeClass('active_user');
					}
				}
		ChatLoader.init();

		if(firstType == 'user'){
			ChatLoader.showLoader();
			$('.loadChat').load('admin.loadChatUser.php?user_id='+firstID, function() {
			  ChatLoader.hideLoader();
			});
		}
		else if(firstType == 'client'){
			ChatLoader.showLoader();
			$('.loadChat').load('admin.loadChatClient.php?client_id='+firstID, function() {
			  ChatLoader.hideLoader();
			});
		}else{
			if(user_right != 0){
				ChatHover.add($(".userId[data-id='0']"));
				ChatLoader.showLoader();
				$('.loadChat').load('admin.loadChatUser.php?user_id=0', function() {
				  ChatLoader.hideLoader();
				});
			}
		}

		$('.table').on('click','.clientId',function(){
			var id = $(this).data('id');
			ChatHover.add($(this));
			ChatLoader.showLoader();
			$('.loadChat').load('admin.loadChatClient.php?client_id='+id, function() {
			  ChatLoader.hideLoader();
			});
		});
		$('.table').on('click','.userId',function(){
			var id = $(this).data('id');
			ChatHover.add($(this));
			ChatLoader.showLoader();
			$('.loadChat').load('admin.loadChatUser.php?user_id='+id, function() {
			 ChatLoader.hideLoader();
			});
		});
		<?php if($user_right == 0){ ?>
			$('.changeList').on('click',function(){
				if($(this).data('statut') == 'ListClient'){
					$('.ListClient').hide();
					$('.ListUser').show();
					$('.contactTitle').html('User(s)');
					$(this).data('statut','ListUser');
				}else{
					$('.ListUser').hide();
					$('.ListClient').show();
					$('.contactTitle').html('Client(s)');
					$(this).data('statut','ListClient');
				}
			});
		<?php } ?>
		$('.refreshList').on('click',function(){
			refreshList();
		});
		function refreshList(){
			<?php //if($user_right == 0){ ?>
					//$('.ListUser').load('php/admin.LoadListUser.php',function(){
					//	var id = $('.send').data('id');
					//	ChatHover.add($(".userId[data-id='"+id+"']"));
						
						
					//});
			<?php //} ?>
					$('.ListClient').load('php/admin.LoadListClient.php',function(){
						var id = $('.send').data('id');
						if(id == 0){
							ChatHover.add($(".userId[data-id='"+id+"']"));
						}else{
							ChatHover.add($(".clientId[data-id='"+id+"']"));
						}
						//ChatHover.add();
					});
						
						
						//setTimeout(refreshList, 20000);
				}
		

				//alert('hello');
		//refreshList();
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