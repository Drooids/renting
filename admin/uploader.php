<?php session_start();
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		$_SESSION['uploader_id']=$_GET['id_portfolio'];
		include('php/class.load.php');
	}else{
		header('Location: login.html');
	}

 ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Upload Gallery for property n°<?php echo $_GET['id_portfolio']; ?></title>
		
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
        <!-- multiuplaod -->
			<link rel="stylesheet" href="js/lib/jQuery-File-Upload/css/jquery.fileupload-ui.css">

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
                            <div class="col-sm-12">
								<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									Upload picture for the gallery of the property n°<?php echo $_GET['id_portfolio']; ?>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">Complex Example</h4>
									</div>
									<div class="panel-body">
										<form id="fileupload" action="/" method="POST" enctype="multipart/form-data" class="multiupload">
											<!-- Redirect browsers with JavaScript disabled to the origin page -->
											<noscript>To use mutliupload please enable Javascript in your browser.</noscript>
											<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
											<div class="row fileupload-buttonbar">
												<div class="col-lg-7">
													<!-- The fileinput-button span is used to style the file input field as button -->
													<span class="btn btn-success fileinput-button">
														<i class="glyphicon glyphicon-plus"></i>
														<span>Add files...</span>
														<input type="file" name="files[]" multiple>
													</span>
													<button type="submit" class="btn btn-primary start">
														<i class="glyphicon glyphicon-upload"></i>
														<span>Start upload</span>
													</button>
													<button type="reset" class="btn btn-warning cancel">
														<i class="glyphicon glyphicon-ban-circle"></i>
														<span>Cancel upload</span>
													</button>
													<button type="button" class="btn btn-danger delete">
														<i class="glyphicon glyphicon-trash"></i>
														<span>Delete</span>
													</button>
													<input type="checkbox" class="toggle">
													<!-- The loading indicator is shown during file processing -->
													<span class="fileupload-loading"></span>
												</div>
												<!-- The global progress information -->
												<div class="col-lg-5 fileupload-progress fade sepH_a">
													<!-- The extended global progress information -->
													<div class="progress-extended sepH_a">&nbsp;</div>
													<!-- The global progress bar -->
													<div class="progress progress-small progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar progress-success" style="width:0%;"></div>
													</div>
												</div>
											</div>
											<!-- The table listing the files available for upload/download -->
											<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
										</form>
									</div>
								</div>
							</div>
                        </div>
						<!-- End main content -->

					</div>
				</div>

			</section>
			<div id="footer_space"></div>
		</div>

      
        
	<?php include('javascript_file.php'); ?>
	<!-- jqueryUI -->
			<script src="js/lib/jquery_ui/jquery-ui-1.10.3.custom.min.js"></script>
		
		<!-- multiupload -->
			<script src="js/lib/jQuery-File-Upload/js/jquery.fileupload.all.js"></script>
		<!-- The template to display files available for upload -->
			<script id="template-upload" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
				<tr class="template-upload fade">
					<td class="upload_img">
						<span class="preview img-thumbnail"></span>
					</td>
					<td class="upload_info">
						{% if (file.error) { %}
							<div><span class="label label-important">Error</span> {%=file.error%}</div>
						{% } %}
						<p class="name">{%=file.name%}</p>
						<p class="size">{%=o.formatFileSize(file.size)%}</p>
						{% if (!o.files.error) { %}
							<div class="progress progress-striped progress-small active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
						{% } %}
					</td>
					<td class="upload_actions">
						{% if (!o.files.error && !i && !o.options.autoUpload) { %}
							<button class="btn btn-primary btn-sm start">
								<i class="glyphicon glyphicon-upload"></i>
								<span>Start</span>
							</button>
						{% } %}
						{% if (!i) { %}
							<button class="btn btn-warning btn-sm cancel">
								<i class="glyphicon glyphicon-ban-circle"></i>
								<span>Cancel</span>
							</button>
						{% } %}
					</td>
				</tr>
			{% } %}
			</script>
		<!-- The template to display files available for download -->
			<script id="template-download" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
				<tr class="template-download fade">
					<td class="download_img">
						<span class="preview img-thumbnail">
							{% if (file.thumbnailUrl) { %}
								<a href="{%=file.url%}" title="{%=file.name%}" class="gallery" download="{%=file.name%}"><img src="{%=file.thumbnailUrl%}"></a>
							{% } %}
						</span>
					</td>
					<td class="download_info">
						{% if (file.error) { %}
							<div><span class="label label-important">Error</span> {%=file.error%}</div>
						{% } %}
						<p class="name">
							<a href="{%=file.url%}" title="{%=file.name%}" class="{%=file.deleteUrl?'gallery':''%}" download="{%=file.name%}">{%=file.name%}</a>
						</p>
						<p class="size">{%=o.formatFileSize(file.size)%}</p>
					</td>
					<td class="download_actions">
						<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.delete_with_credentials) { %} data-xhr-fields="{'withCredentials':true}"{% } %}>
							<i class="glyphicon glyphicon-trash"></i>
							<span>Delete</span>
						</button>
						<input type="checkbox" name="delete" value="1" class="toggle">
					</td>
				</tr>
			{% } %}
			</script>
			<script type="text/javascript">
				$(function() {
					//* multiupload
					ebro_multiupload.init();
					});
					
					//* multiupload
					ebro_multiupload = {
						init: function() {
							if($('#fileupload').length) {
								// Initialize the jQuery File Upload widget:
								$('#fileupload').fileupload({
									// Uncomment the following to send cross-domain cookies:
									//xhrFields: {withCredentials: true},
									// Uncomment the following to upload files using php (https://github.com/blueimp/jQuery-File-Upload/wiki)
									acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
									url: 'upload/',
									maxNumberOfFiles: 30
								});

								 // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option','url'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
        	//alert($('#fileupload')[0]);
            $(this).fileupload('option', 'done')
                .call(this, $.Event('done'), {result: result});
        });
								/*$('.delete').on('click',function(){
									alert('hello');
								})
*/
							}
						}
					}

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