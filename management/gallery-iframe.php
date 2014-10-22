<?php

               $gallery=$_GET['gallery'];
                include 'php/server.php';
            ?>

		<script>
			  $(function() {
			    $( ".sortable" ).sortable({ 
			    	placeholder: "ui-state-highlight",
			    	start: function( event, ui ) {
						    $( this ).sortable( 'refreshPositions' );
						   		var height = $('.ui-state-default').height();
								var width = $('.ui-state-default').width();
						    $(".ui-state-highlight").css('height',height+'px');
						    $(".ui-state-highlight").css('width',width+'px');
						  },
						  stop: function(event,ui){
						  	var info='';
						  	$('.info').each(function(index){
						  		var name = $(this).data('click');
						  		if(index == 0){
						  		 info = name;
						  		//alert("hello");
						  		}else{
						  			info=info+','+name;
						  		}
						  		
							    
							    
							    
							});
							//alert(info);
							var id = <?php echo $gallery;?>;
							SetGallery(id,'','',info,'sortable',null);
							//alert('hello');
					
						  },
					connectWith: ".sortable"

				});
			    $( ".sortable" ).disableSelection();
			  });
	    </script>
		<script>
			$(document).ready(function(){
				var total = 0;
				
				var username = "<?php echo $_SESSION['username'];?>";
				// Tooltips
				$('.user-profile a, .dashboard .badge').tooltip({
					placement: 'top'
				});
				$('.brand, .navbar-search input').tooltip({
					placement: 'bottom'
				});
				$('.main-navigation .badge').tooltip({
					placement: 'right'
				});

				var id_gallery = '<?php echo $gallery; ?>';

				function loadPage(){
					$('.biblio').load('load/galleryaffiche.php?gallery='+id_gallery, function() {
								//  alert('Load was performed.');
								

							
								});
				}

				loadPage();
				afficheProfil(username);
				var total = 0;
				var img_older  =0;
				var img_select =0;
				var id_select  =0;
				var thumbnail_selected = null;
				
				//alert(id_gallery);
				$('#refresh').live("click", function(){
					loadPage();
					//location.reload();
				});

				$('.delete').live('click',function(){
					
					var id_fichier=$(this).data('click')
					//alert(id_fichier);
					DeleteImgGallery(id_fichier,id_gallery);
					return false;

				});
				function DeleteImgGallery(id_fichier,id_gallery){
					$.get("upload/deleteGallery.php",{id_fichier:id_fichier,id_gallery:id_gallery},
					   function(data){
					   loadPage();
					   	
					   }, "json");

				}

				$('.thumbnail').live("click", function(){
					if(thumbnail_selected != null){
						thumbnail_selected.css("background-color", "white");
					}

						thumbnail_selected=$(this);
						 img_select = $(this).parent().find('img').attr('src');

						 thumbnail_selected.css("background-color", "yellow");
					//alert(img_select);
					//alert($(this).parent().find('.input-large').attr('value'));
				      return false;
				});

				function afficheImage(id){
					$.get("php/GetImage.php",{id:id},
					   function(data){
					   //	alert('hello');
					   	$('#img-'+data[0].id_fichier).attr('src','upload/uploads/'+data[0].nom_fichier);
					    $('#href-'+data[0].id_fichier).attr('href',data[0].nom_fichier);
					    $('#href-'+data[0].id_fichier).data('click',data[0].id_fichier);
					   });

				}
				
				
				/*
				function afficheGalleryAffich(id_gallery){
					$.get("php/GetGalleryAffich.php",{id_gallery:id_gallery},
					   function(data){
					  //alert(data[0].link_gallery);
					   var dataSplited = data[0].link_gallery.split(',');
					  // alert(dataSplited.length);
					  $("#name_gallery").html(data[0].nom_gallery);
					  
					   	var str='';
					   	var fin = dataSplited.length-1;
					   	//alert(fin);
					   	for (var i=0;i<dataSplited.length;i++){
					   	
					   		var start =1+i;
					   		if(i==0 && dataSplited.length !=0){
						//str+="<ul class='thumbnails' >";
					   		}
					   		if(dataSplited[i] != ''){
					   			str+="<li class='span3 ui-state-default' style='height: 200px;' >";
					   			//str+="<input id='"+data[i].id_gallery +"' type='checkbox' value='option'>";
					   			str+="<ul class='thumbnail-actions'>";
								str+="<li><a href='#' title='Edit photo'><span class='icon-pencil'></span></a></li>";
								//str+="<li><a href='upload/download.php?filename="+dataSplited[i].nom_fichier+"' title='Download photo'><span class='icon-download'></span></a></li>";
								str+="<li><a class='delete' id='href-"+dataSplited[i]+"' href=''  title='Delete photo'><span class='icon-trash'></span></a></li>";
								str+="</ul>";
								str+="<a class='thumbnail' href='#'><img alt='Image 34' id='img-"+dataSplited[i]+"'src='upload/uploads/"+dataSplited[i]+"' data-click='"+dataSplited[i]+"' height=380px></a>";
								str+="</li>";
					   		}
					   			
					   		

							if(start % 4 == 0 ){
					   				str+="</ul>";
					   				//str+="<ul class='thumbnails' >";
					   		}
					   			
							if(i == fin){
						   			str+="</ul>";
						   			
						   			
						   			}
						   		}
						   		$(".biblio").html(str);
						   		for (var i=0;i<dataSplited.length;i++){
					   		afficheImage(dataSplited[i]);
					   	}
					   		  });
				
				}*/
				

				//afficheGalleryAffich(id_gallery);

				
				
			});
		</script>
		 <style>
  
  .ui-state-highlight { height: 1.5em; line-height: 1.2em; width:367px; height:210px; background: transparent;}
  </style>
	
		<!-- /Main page header -->
		
		<!-- Full page alert -->
		
		<!-- /Full page alert -->
		
		<!-- Main page container -->
		<div class="container-fluid">
		
			
			<!-- /Left (navigation) side -->
			
			<!-- Right (content) side -->
			<div class="content-block" role="main">
			<div class="row-fluid">
				
					<!-- Data block  -->
					<article class="span12 data-block">
						<button class="btn btn-large" id='refresh'>Refresh</button>
						<div class="plupload" style="margin-bottom:100px;"></div>
						<div class="data-container">

							<header>
								<h2 id='title-gallery'>Toutes les galleries</h2>
							</header>
							<section>
								<p>Voici toutes les images enregistrées dans cette galerie. Si vous souhaitez en rajouter, il ne vous reste qu'a en uploader via le la page d'upload et de RAFRAICHIR</p>
								<form class="form-gallery">


								<ul  class="thumbnails biblio sortable">
									
								</ul>
								</form>
							

							</section>
						</div>
					</article>
					<!-- /Data block  -->
					
				</div>

			</div>
			<!-- /Right (content) side -->
		
		</div>
		<!-- Main page container -->
		
		<!-- Scripts -->
		<script src="js/navigation.js"></script>

		<!-- Bootstrap scripts -->
		<!--
		<script src="js/bootstrap/bootstrap-tooltip.js"></script>
		<script src="js/bootstrap/bootstrap-dropdown.js"></script>
		<script src="js/bootstrap/bootstrap-alert.js"></script>
		<script src="js/bootstrap/bootstrap-collapse.js"></script>
		<script src="js/bootstrap/bootstrap-transition.js"></script>
		-->
		<script src="js/bootstrap/bootstrap.min.js"></script>
		<script src="js/plugins/plUpload/plupload.full.js"></script>
		<script src="js/plugins/plUpload/jquery.plupload.queue/jquery.plupload.queue.js"></script>

	
    
		<script>
		
			$(document).ready(function() {
				var id_gallery = '<?php echo $gallery; ?>';
				
				
				$('.plupload').pluploadQueue({
					runtimes : 'html5,gears,silverlight,browserplus',
					url : 'upload/uploadGallery.php?id='+id_gallery,
					max_file_size : '10mb',
					chunk_size : '1mb',
					unique_names : true,
					multiple_queues:true,
					//resize : {width : 320, height : 240, quality : 90},
					urlstream_upload:true,
					filters : [
						{title : "Image files", extensions : "jpg,gif,png"},
						{title : "Zip files", extensions : "zip"}
					],
					flash_swf_url : 'js/plugins/plUpload/plupload.flash.swf',
					silverlight_xap_url : 'js/plugins/plUpload/plupload.silverlight.xap'
				});

				$(".plupload_header").remove();
				$(".plupload_progress_container").addClass("progress").addClass('progress-striped');
				$(".plupload_progress_bar").addClass("bar");
				$(".plupload_button").each(function(e){
					if($(this).hasClass("plupload_add")){
						$(this).attr("class", 'btn btn-primary btn-alt pl_add btn-small');
					} else {
						$(this).attr("class", 'btn btn-success btn-alt pl_start btn-small');
					}
				});

				var uploader = $('#uploader').plupload('getUploader');

				 uploader.bind('UploadProgress', function() {
			        if (uploader.total.uploaded == uploader.files.length) {
			            $(".plupload_buttons").css("display", "inline");
			            $(".plupload_upload_status").css("display", "inline");
			            $(".plupload_start").addClass("plupload_disabled");
			           
			            
						  

			        }
			    });
				
				
			    
			    uploader.bind('QueueChanged', function() {
			        $(".plupload_start").removeClass("plupload_disabled");
			    });


				$("#essai").click(function(){
					$('#uploader').plupload('getUploader').refresh();
					return false;
				});

				

			});
		</script>

		<!-- Highlight gallery item when clicked -->
