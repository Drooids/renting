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
		<!-- datepicker -->
			<link rel="stylesheet" href="js/lib/datepicker/css/datepicker.css">
		<!-- timepicker -->
			<link rel="stylesheet" href="js/lib/timepicker/css/bootstrap-timepicker.min.css">
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
								<div class="col-lg-2 col-sm-3" style='margin-top:15px;'>
								<div class="form-group">
									<div class="heading_a">Action(s)</div>
									<p><a class="link_boxed" data-toggle="modal" href="#myModal"><span class=" icon-calendar"></span> Create Visit</a></p>

								</div>
							</div>
							<div class="col-lg-10 col-sm-9 calendarDiv">
								<h4 class="heading_a">Calendar</h4>
								<div class="panel panel-default">
									<div class="panel-heading"></div>
									<div id="calendar_json"></div>
								</div>
							</div>
							<div class="col-lg-10 col-sm-9 visiteDiv" style='hide'>
								
							</div>
						</div>

						<!-- End Main Content -->
						<!-- Modal -->
						<div class="modal fade" id="myModal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Create a Visit</h4>
									</div>
									<div class="modal-body">
										<div class="col-sm-12" >
											<form id='createVisite'>
											  <h4 class="heading_a">Choose the Day</h4>
	                                          	<div class="input-group date ebro_datepicker" data-date-format="dd-mm-yyyy" style='margin-bottom:10px;'>
                                                    <input class="form-control" type="text" name='visit_date'>
                                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                </div>
                                                <h4 class='heading_a'>Text to display</h4>
                                                <input type='hidden' name='visit_comment' class='inputComment'>
                                                <div id="visite_comment" class='form-control' style='margin-bottom:10px;'> </div>
	                                        	<h4 class="heading_a">Choose the Time</h4>
	                                          	<div class="input-group bootstrap-timepicker" style='margin-bottom:10px;'>
	                                          	 	<input id="tp-default" type="text" class="form-control" name='visite_time'>
                                                    <span class="input-group-addon"><i class="icon-time"></i></span>
                                                </div>
                                                <h4 class="heading_a">Choose the Client</h4>
                                                <select id="reg_select" name='visite_client' class="form-control" style='margin-bottom:10px;'>
													<option value='empty'>Empty</option>
								
						<?php
							$reponse = $bdd->query("SELECT DISTINCT message_from FROM message WHERE type = 'devis' AND 
								link_id IN ( SELECT id_portfolio FROM portfolio WHERE user_id = '$user_id')");
							$reponse = $reponse->fetchAll();
							foreach ($reponse as $key => $value) {
								$client = new client($value['message_from']);
								echo "<option value='".$value['message_from']."'>".$client->last_name." ".$client->name."</option>";
							}

						?>
													
												</select>
												 <h4 class="heading_a">Choose the Property</h4>
                                                <select id="reg_select" name='visite_property' class="form-control" style='margin-bottom:10px;'>
													<option value='empty'>Empty</option>
						<?php
							$reponse = $bdd->query(" SELECT id_portfolio FROM portfolio WHERE user_id = '$user_id' AND actif_portfolio <> 0");
							$reponse = $reponse->fetchAll();
							foreach ($reponse as $key => $value) {
								$property = new portfolio($value['id_portfolio']);
								echo "<option value='".$value['id_portfolio']."'>".$property->nom_portfolio." ".$property->district_portfolio."</option>";
							}

						?>
												</select>
	                                      </form>
                                        </div>
									</div>
	

									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary create">Create</button>
									</div>
								</div>
							</div>
						</div>
					<!-- End Modal -->
					</div>
				</div>

			<?php //include('widget/dashboard.php'); ?>
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
        
	<?php include('javascript_file.php'); ?>
	<!-- wysiwg -->
			<script src="js/lib/ckeditor/ckeditor.js"></script>
	<!-- timepicker -->
			<script src="js/lib/timepicker/js/bootstrap-timepicker.min.js"></script>
	<!-- datepicker -->
			<script src="js/lib/datepicker/js/bootstrap-datepicker.js"></script>
	<!-- select2 -->
			<script src="js/lib/select2/select2.min.js"></script>
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;key=AIzaSyD3VSb2IYSKdPdcDWFffqh0pGy9S47Klzk"></script>
		
	<script type="text/javascript">
/* [ ---- Home Saigon Admin - calendar ---- ] */

    $(function() {
		ebro_calendar.init();
		ebro_datepicker.init();
		ebro_timepicker.init();
	})
	if($('#visite_comment').length) { 
					var textEditor = CKEDITOR.replace( 'visite_comment',
						CKEDITOR.tools.extend (
						{
							height: 200,
							extraPlugins: 'autogrow',
							autoGrow_maxHeight: 400
						})
					);
				}


	ebro_calendar = {
		init: function() {

			
			var id = "<?php echo $user_id; ?>";
			if($('#calendar_json').length) {
				$('#calendar_json').fullCalendar({
					header: {
						center: 'prev title next',
						left: 'month agendaWeek agendaDay today',
						right: ''
					},
					buttonText: {
						prev: '<i class="icon-chevron-left" />',
						next: '<i class="icon-chevron-right" />'
					},
					aspectRatio: 2.2,
					editable: true,
					firstHour:8,
					maxTime:22,
					minTime:7,
					axisFormat:"HH 'h'(:mm)",
					events: "php/admin.getCallendar.php?user_id="+id,
					eventDrop: function(event, delta) {
						
						//alert(event.start);
						$.get('php/admin.setCallendar.php',{id:event.url,start:event.start,action:'change'},function(){
							$('#calendar_json').fullCalendar( 'refetchEvents' );
						});
					},
					loading: function(bool) {
						if (bool) $('#loading').show();
						else $('#loading').hide();
					},
					 eventClick: function(event) {
					 	if(event.url){
					 		$('.calendarDiv').hide();
							$('.visiteDiv').show();
							$('.visiteDiv').load('php/editVisite.php?id_visite='+event.url);
					 	}
					 	return false;
						
				    }
					
				})
			}

			$('.addVisit').click(function(){
				


				var myEvent = {
					  title:"my new event",
					  allDay: true,
					  start: new Date(),
					  end: new Date()
					};

				$('#calendar_json').fullCalendar( 'renderEvent', myEvent );
			});
		}
	}

	ebro_datepicker ={
		init:function(){
			$('.ebro_datepicker').datepicker();
		}
	}
	//* timepicker
	ebro_timepicker = {
		init: function() {
			if($('#tp-default').length) {
				$('#tp-default').timepicker()
			}
			if($('#tp-24h').length) {
				$('#tp-24h').timepicker({
					minuteStep: 1,
					template: 'modal',
					showSeconds: true,
					showMeridian: false
				})
			}
			if($('#tp-noTemplate').length) {
				$('#tp-noTemplate').timepicker({
					template: false,
					showInputs: false,
					minuteStep: 5
				})
			}
			if($('#tp-modal').length) {
				$('#tp-modal').timepicker({
					minuteStep: 1,
					secondStep: 5,
					showInputs: false,
					modalBackdrop: true,
					showSeconds: true,
					showMeridian: false
				})
			}
		}
	};

	$('.create').click(function(){
		var data = textEditor.getData();
		$(".inputComment").attr('value',data);
		var data = $('#createVisite').serialize();
		$.post('php/admin.setCallendar.php?action=create&'+data,function(result){
			console.log(result);
			$('#myModal').modal('hide');
			$('#calendar_json').fullCalendar( 'refetchEvents' );
		});
		//console.log(data);
		return false;
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