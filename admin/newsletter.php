<?php session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$user_right = $_SESSION['user_right'];
		
		if($user_right > 0)
			header('Location: index.php');
		
		
		include('php/class.load.php');
	}else{
		header('Location: login.html');
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
								<form>
									<div class="modal-header">
										
										<h4 class="modal-title" id="myModalLabel">New Message</h4>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label for="mail_to">To</label>
											<input type="text" class="form-control" name="mail_to" id="mail_to">
										</div>
										<div class="form-group">
											<label for="mail_subject">Subject</label>
											<input type="text" class="form-control" name="mail_subject" id="mail_subject">
										</div>
										<div class="form-group">
											<label for="mail_message">Message</label>
											<textarea name="mail_message" id="mail_message" cols="30" rows="6" class="form-control"></textarea>
										</div>
									</div>
									<div class="modal-footer">
										<button data-toggle="modal" href="#send" type="button" class="btn btn-primary send">Send</button>
									</div>
								</form>
						
							</div>
						</div>
						<!-- End main conntent -->
						<div id="send" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<form>
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Check point</h4>
										</div>
										<div class="modal-body iframeDiv">
											<iframe  id="myFrame" src="" scrolling="no" frameborder="0" style='width:100%; height:450px;'></iframe>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary confirm">Confirm</button>
											<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
										</div>
									</form>
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
		<!-- select2 -->
		<script src="js/lib/select2/select2.min.js"></script>
		<script src="js/lib/parsley/parsley.min.js"></script>
		<script src="js/lib/tagsInput/jquery.tagsinput.js"></script>
		<script type="text/javascript">
							   $(function(){

							   			function isValidEmailAddress(emailAddress) {
										    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
										    return pattern.test(emailAddress);
										};

										$('#mail_to').tagsInput({ 
											'interactive':true,
						   					'defaultText':'Ajouter un email',
						   					'height':'30px',
   											'onAddTag':function(data){
						   					
													//alert($(this).tagExist(data));
													email = data.split(" ");
							   						if(email.length == 1){

							   						}else{
							   							arrayEmail(data);
							   							$(this).removeTag(data);
							   						}
							   					if(isValidEmailAddress(data) == false)
							   						$(this).removeTag(data);
												
						   						
											},
						   					
										});

											function arrayEmail(text){
												text=text.split(' ');
												for (var i = 0; i < text.length; i++) {
													if($('#mail_to').tagExist(text[i]) == false){
														var text_now =text[i];
														//alert(text[i]+ " : "+ $('#mail_to').tagExist(text_now));
														$('#mail_to').addTag(text[i]);

													}
												};
											}

						            	$('.send').on('click',function(){
												var listEmail = $('#mail_to').val();
												//alert(listEmail);
												var subject = $('#mail_subject').val();
												var text = $('#mail_message').val();
												$.post("php/admin.newsletter.php?",{emails:listEmail,subject:subject,text:text,action:"check"},function(e){
													e= e.trim();
													//alert(e);
													$('.iframeDiv').html("<iframe  src='php/email.html' style='width:100%; height:450px;'></iframe>");
												});
												//alert(listEmail);

										});
										$('.confirm').on('click',function(){
												var listEmail = $('#mail_to').val();
												var subject = $('#mail_subject').val();
												var text = $('#mail_message').val();
											$.post("php/admin.newsletter.php?",{emails:listEmail,subject:subject,text:text,action:"send"},function(e){
												e=e.trim();
												if(e == "ok")
													 $('#send').modal({show: false});
													
												});
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