<!-- Third party script for BrowserPlus runtime (Google Gears included in Gears runtime now) -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

<!-- Load plupload and all it's runtimes and finally the jQuery queue widget -->
<script src="js/plugins/plUpload/plupload.full.js"></script>
		<script src="js/plugins/plUpload/jquery.plupload.queue/jquery.plupload.queue.js"></script>


<h3>Custom example</h3>
<div id="container">
	<div id="filelist">No runtime found.</div>
	<br />
	<a id="pickfiles" href="#">[Select files]</a>
	<a id="uploadfiles" href="#">[Upload files]</a>
</div>
<script type="text/javascript">
// Custom example logic
$(function() {
	var uploader = new plupload.Uploader({
		runtimes : 'gears,html5,flash,silverlight,browserplus',
		browse_button : 'pickfiles',
		container : 'container',
		max_file_size : '10mb',
		url : 'upload.php',
		flash_swf_url : '/plupload/js/plupload.flash.swf',
		silverlight_xap_url : '/plupload/js/plupload.silverlight.xap',
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Zip files", extensions : "zip"}
		],
		resize : {width : 320, height : 240, quality : 90}
	});

	uploader.bind('Init', function(up, params) {
		$('#filelist').html("<div>Current runtime: " + params.runtime + "</div>");
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