<?php session_start();
	include('php/class.load.php');
	$client_id = $_SESSION['client_id'];

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
                
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->
						<div class="row">
							
							<div class="col-lg-12 calendarDiv">
								<h4 class="heading_a">Calendar</h4>
								<div class="panel panel-default">
									<div class="panel-heading"></div>
									<div id="calendar_json"></div>
								</div>
							</div>
							<div class="col-lg-12  visiteDiv" style='hide'>
								
							</div>
						</div>

						<!-- End Main Content -->
						
					</div>
				</div>

			
			</section>
			<div id="footer_space"></div>
		</div>
        
	<?php include('javascript_file.php'); ?>
	<!-- timepicker -->
			<script src="js/lib/timepicker/js/bootstrap-timepicker.min.js"></script>
	<!-- datepicker -->
			<script src="js/lib/datepicker/js/bootstrap-datepicker.js"></script>
	<!-- select2 -->
			<script src="js/lib/select2/select2.min.js"></script>
	
	<script type="text/javascript">
/* [ ---- Home Saigon Admin - calendar ---- ] */

    $(function() {
		ebro_calendar.init();
		ebro_datepicker.init();
		ebro_timepicker.init();
	})
	
	ebro_calendar = {
		init: function() {

			
			var id = "<?php echo $client_id; ?>";
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
					editable: false,
					firstHour:8,
					maxTime:22,
					minTime:7,
					axisFormat:"HH 'h'(:mm)",
					events: "php/admin.getCallendar.php?client_id="+id,
					eventDrop: function(event, delta) {
						
					},
					loading: function(bool) {
						if (bool) $('#loading').show();
						else $('#loading').hide();
					},
					eventClick: function(event) {
					 	if(event.url){
					 		$('.calendarDiv').hide();
							$('.visiteDiv').show();
							$('.visiteDiv').load('php/seeVisit.php?id_visite='+event.url);
					 	}
					 	return false;
						
				    }
					
				})
			}

			
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
		var data = $('#createVisite').serialize();
		$.post('php/admin.setCallendar.php?action=create&'+data,function(result){
			console.log(result);
			$('#myModal').modal('hide');
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
	
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&#038;ver=1.0'></script>
    
	</body>
</html>