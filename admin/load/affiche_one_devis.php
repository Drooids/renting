<script type="text/javascript">
$(document).ready(function(){
		$('.demoPopover').popover({
							trigger: 'hover',
							placement:'bottom'
						});
	});
</script>
<script src="js/plugins/plUpload/plupload.full.js"></script>
<script src="js/plugins/plUpload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<?php
	$id = $_REQUEST['id'];
	$date_id = date('Y-m-d H:i');
 include 'server.php';

 $reponse = $bdd->query("SELECT * FROM devis WHERE devis_id = '$id'");
 $donnees = $reponse->fetchAll();

               if(count($donnees) != 0){
               		$devis_id=$donnees[0]['devis_id'];
                	$devis_info=$donnees[0]['devis_info'];
                	$devis_type_id=$donnees[0]['devis_type_id'];
                	$devis_text=$donnees[0]['devis_text'];
                	$devis_name=$donnees[0]['devis_name'];
                	$date=$donnees[0]['date'];
                	$devis_phone=$donnees[0]['devis_phone'];
                	$devis_email=$donnees[0]['devis_email'];
                	$devis_newsletter=$donnees[0]['devis_newsletter'];
               	 	$devis_lu=$donnees[0]['devis_lu'];
               		$devis_checked=$donnees[0]['devis_checked'];
                	$devis_contact_type=$donnees[0]['devis_contact_type'];
               }else{
               		$devis_id='';
                	$devis_info='';
                	$devis_type_id='';
                	$devis_text='';
                	$devis_name='No Name';
                	$date='';
                	$devis_phone='';
                	$devis_email='';
                	$devis_newsletter='';
               	 	$devis_lu='';
               		$devis_checked='';
                	$devis_contact_type='';
               }
                

 ?>
<div class="data-container">
	<div class='full_goo' style=' float:right; display:block; margin-right:10px;'>
			<div class='goo_button goo_button_right demoPopover' title="Others" data-content="More options ?" data-click='close'><div class='goo_button_other'></div></div><div class='goo_button goo_button_left demoPopover' title="Repondre" data-content="Clicker pour repondre par email"><div class='goo_button_answer'></div></div>
			
	</div>
	<header  class='header_devis span8' style=' float:left;'>
		<h2><?php echo $devis_name;?></h2><span style='font-weight:bold; line-height:40px; float:left; margin-left:20px; margin-bottom:-2px;'>&#60;<?php echo $devis_email; ?>&#62;</span>
		
	</header>
	<header class='span8'>
		<span style='margin-left:0px;'> to House-Saigon via <?php echo $devis_contact_type; ?></span>
	</header>
	<?php if($devis_phone != ''){ ?>
	<header class='span8'>
		<span style='margin-left:0px;'> Phone: <?php echo$devis_phone; ?></span>
	</header>

	<?php } ?>
	<section class="tab-content" style='margin-top:50px;'>
		<div class="row-fluid" style='color:white; margin-top:20px; margin-left:30px; margin-right:30px;'>
			<?php echo $devis_text; ?>
		</div>
		<div class="control-group repondre" style='display:none;'>
											<form >
												<fieldset>
													
													<div class="control-group">
														<div class="controls">
															<textarea id="textarea4" class="wysihtml5" placeholder="Enter text&hellip;" rows="8"></textarea>
															<div id="container">
																<div id="filelist">No runtime found.</div>
																<br />
																
															</div>
														</div>
													</div>
													<div class="form-actions">
														<button class="btn btn-alt btn-primary btn-large" id='uploadfiles' type="submit">Envoyer</button>
														<div class='full_goo' style=' float:right; display:block; margin-right:10px;'>
																<div class='goo_button goo_button_left demoPopover' id='pickfiles' title="Upload files" data-content="Clicker pour uploader des fichiers"><div class='goo_button_upload'></div></div>		
														</div>
													</div>
												</fieldset>
											</form>
		</div>
	</section>

	
</div>

		
		<script>
			$(document).ready(function() {
				$('.goo_button_left').live('click',function(){
					$('.repondre').show();
				});
				$('.goo_button_right').live('click',function(){
					var verif = $(this).data('click');
					if(verif == 'close'){
						$('.full_goo').css('height','200px');
						$('.goo_button_right').data('click','open');
					}else{
						$('.full_goo').css('height','');
						$('.goo_button_right').data('click','close');
					}
					
				});

				$('.wysihtml5').wysihtml5();
				
			});
		</script>


		
    
		<script type="text/javascript">
// Custom example logic
$(function() {
	var id = '<?php echo $date_id; ?>';
	var to = '<?php echo $devis_email; ?>';
	var uploader = new plupload.Uploader({
		runtimes : 'gears,html5,flash,silverlight,browserplus',
		browse_button : 'pickfiles',
		container : 'container',
		max_file_size : '10mb',
		chunk_size : '1mb',
		unique_names : true,
		multiple_queues:true,
		urlstream_upload:true,
		url : 'upload/uploadEmail.php?id='+id+'&to='+to,
		flash_swf_url : 'js/plugins/plUpload/plupload.flash.swf',
		silverlight_xap_url : 'js/plugins/plUpload/plupload.silverlight.xap',
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Zip files", extensions : "zip"}
		],
	});

	uploader.bind('Init', function(up, params) {
		$('#filelist').html("<div>File to update and send by email:</div>");
	});

	$('#uploadfiles').click(function(e) {
		uploader.start();
		e.preventDefault();
	});

	uploader.init();

	uploader.bind('FilesAdded', function(up, files) {
		$.each(files, function(i, file) {
			$('#filelist').append(
				'<div id="' + file.id + '">' +
				file.name + ' (' + plupload.formatSize(file.size) + ') <b></b>' +
			'</div>');
		});

		up.refresh(); // Reposition Flash/Silverlight
	});

	uploader.bind('UploadProgress', function(up, file) {
		$('#' + file.id + " b").html(file.percent + "%");
	});

	uploader.bind('Error', function(up, err) {
		$('#filelist').append("<div>Error: " + err.code +
			", Message: " + err.message +
			(err.file ? ", File: " + err.file.name : "") +
			"</div>"
		);

		up.refresh(); // Reposition Flash/Silverlight
	});

	uploader.bind('FileUploaded', function(up, file) {
		$('#' + file.id + " b").html("100%");
	});
});
</script>