<?php session_start();
include('php/class.load.php');
include('php/class.message.php');
$client_id = $_SESSION['client_id'];

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

function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
    
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
    
    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }    

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }        

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }        

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }    

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }    

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }    

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }    

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}

?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home Saigon - User Chat</title>
		
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
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<style type="text/css">
			.ListMessage{
				display:none;
			}
		</style>
	
	</head>
	<body class="boxed  sidebar_hidden">
		
		<div >
                
			
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
										
											$reponse = $bdd->query("SELECT DISTINCT message_from AS id FROM message WHERE  message_to = '$client_id' AND (user ='user' OR user = 'admin') AND message_from NOT IN (select user_id from users WHERE right_user = 0) ORDER BY message_timestamp");
										
											
	   										$reponse = $reponse->fetchAll();
										?>
											<h4 class="panel-title pull-left">Contacts (<?php echo count($reponse); ?>)</h4>
											<button class="btn btn-default btn-sm pull-right refreshList" style='float:left;' type="button" ><span class="icon-refresh"></span></button>
											
										</div>
										<table class="table table-striped">
											<tbody class='ListUser'>
											<?php
											//Online
											foreach ($reponse as $key => $value) {
												if($value['id'] != 0){
													$userList = new user($value['id']);
													$current_time   = time();

	    											if($userList->last_name == "")
																$name = $userList->username;
															else
																$name = $userList->last_name." ".$userList->name;

													$different = $current_time - $userList->last_connection;
													if($different < 300){
														$reponse2 = $bdd->query("SELECT count(id) AS total FROM message WHERE message_to = '$client_id' AND message_from ='$userList->id' AND message_read = 0");
														$reponse2 = $reponse2->fetchAll();
								                            if($reponse2[0]['total'] != 0)
								                                $total = "<em style='color:red;'>".$reponse2[0]['total']." news</em>";
								                            else
								                            	$total = "";
														echo"<tr >";
														echo"<td class=><a href='#' data-id='".$userList->id."' class='userId '><span class='stat stat_online'></span>".$name." ".$total."</a></td>";
														echo"</tr>";
													}
												}else{
													//$client = new client($value['id']);
													$current_time   = time();
	    											$different = 0;
													//$different = $current_time - $client->last_connection;
													if($different < 300){
														$reponse2 = $bdd->query("SELECT count(id) AS total FROM message WHERE message_to = '$client_id' AND message_from = 0 AND message_read = 0");
														 	//echo "SELECT count(id) AS total FROM message WHERE message_to = '$client_id' AND message_from ='$userList->id' AND message_read = 0";
								                            $reponse2 = $reponse2->fetchAll();
								                            if($reponse2[0]['total'] != 0)
								                                $total = "<em style='color:red;'>".$reponse2[0]['total']." news</em>";
								                            else
								                            	$total = "";
														echo"<tr >";
														echo"<td class=><a href='#' data-id='0' class='userId '><span class='stat stat_online'></span>Home-Saigon Staff ".$total."</a></td>";
														echo"</tr>";
													}
												}
												
											}
											// Offline
											foreach ($reponse as $key => $value) {
												
												if($value['id'] != 0){
													$userList = new user($value['id']);
													$current_time   = time();

	    											if($userList->last_name == "")
																$name = $userList->username;
															else
																$name = $userList->last_name." ".$userList->name;

													$different = $current_time - $userList->last_connection;
													if($different >= 300){
														 	$reponse2 = $bdd->query("SELECT count(id) AS total FROM message WHERE message_to = '$client_id' AND message_from ='$userList->id' AND message_read = 0");
														 	//echo "SELECT count(id) AS total FROM message WHERE message_to = '$client_id' AND message_from ='$userList->id' AND message_read = 0";
								                            $reponse2 = $reponse2->fetchAll();
								                            if($reponse2[0]['total'] != 0)
								                                $total = "<em style='color:red;'>".$reponse2[0]['total']." news</em>";
								                            else
								                            	$total = "";
														echo"<tr >";
														echo"<td class=><a href='#' data-id='".$userList->id."' class='userId '><span class='stat stat_offline'></span>".$name." ".$total."</a></td>";
														echo"</tr>";
													}
												}else{
													//$client = new client($value['id']);
													$current_time   = time();
	    											$different = 0;
													//$different = $current_time - $client->last_connection;
													if($different >= 300){
															$reponse2 = $bdd->query("SELECT count(id) AS total FROM message WHERE message_to = '$client_id' AND message_from = 0 AND message_read = 0");
														 	//echo "SELECT count(id) AS total FROM message WHERE message_to = '$client_id' AND message_from ='$userList->id' AND message_read = 0";
								                            $reponse2 = $reponse2->fetchAll();
								                            if($reponse2[0]['total'] != 0)
								                                $total = "<em style='color:red;'>".$reponse2[0]['total']." news</em>";
								                            else
								                            	$total = "";
														echo"<tr >";
														echo"<td class=><a href='#' data-id='0' class='userId '><span class='stat stat_offline'></span>Home-Saigon Staff ".$total."</a></td>";
														echo"</tr>";
													}
												}
											}


											?>

												
											</tbody>
								
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- End main conntent -->

					</div>
				</div>
			
			
		</div>

      
        
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
		var firstID = "<?php echo $target_id?>";
		var firstType = "<?php echo $target_type; ?>";
		//init des class Javascript
		ChatLoader = { // Le chat Loader est modifié pour les iFrames
					init:function(){
						//alert(parent.length);
						if(parent.length)
							parent.$('body').append("<div class='DivChatLoaderImg'></div>");
						else
							$('body').append("<div class='DivChatLoaderImg'></div>");
					},
					showLoader: function(){
						var loader = "<div  class='ChatLoaderImg' style='position:fixed; background-color: black; opacity:0.5;position:fixed;left:0;bottom:0;width:100%;height:100%;z-index:500; overflow-y:hidden;'><img src='admin/img/loader.gif' style='display: block;margin-left: auto;margin-right: auto; margin-top:20%;'></div></div>";
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
							parent.$('html, body').css({'overflow': 'auto','height': '100%'});
						}else{
							$('.DivChatLoaderImg').html("");
							$('html, body').css({'overflow': 'auto','height': '100%'});
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
			$('.loadChat').load('php/script.loadChat.php?user_id='+firstID,function(){
				ChatHover.add($(".userId[data-id='"+firstID+"']"));
				ChatLoader.hideLoader();
			});
		}
		else{
			ChatLoader.showLoader();
			$('.loadChat').load('php/script.loadChat.php?user_id=0',function(){
				ChatHover.add($(".userId[data-id='0']"));
				ChatLoader.hideLoader();
			});
		}

		$('.table').on('click','.userId',function(){
			//var id = $(this).data('id');
			//	ChatHover.add($(this));
				//ChatLoader.showLoader();
			//$('.loadChat').load('php/script.loadChat.php?user_id='+id,function(){
				//ChatLoader.hideLoader();
			//});
		});

		$('.refreshList').on('click',function(){
			refreshList();
		});

		function refreshList(){
					$('.ListUser').load('php/script.LoadListUser.php',function(){
						var id = $('.send').data('id');
							ChatHover.add($(".userId[data-id='"+id+"']"));
						
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