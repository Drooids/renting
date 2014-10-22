$(document).ready(function() {
				var total = 0
				$('.affiche_all').hide();
					$('.affiche_all').load("load/affiche_email.php",function(){
						
						//if(result != true)
						//	window.location.replace("../management/index.php");
						total=100;
						$('.bar').css('width','100%');
						setTimeout(function(){
							$('.progress').hide();
							$('.affiche_all').show();
							$('.bar').css('width','0%');
						}, 1200);
						
						
					});
					//verif du login pour afficher 25%
					$.get("email_progress.php",{option:'etape_1'},function(result){
						total = total +25;
						$('.bar').css('width',total+'%');
						//verif des differents dossier pour afficher 25%
						$.get("email_progress.php",{option:'etape_2'},function(result){
							total = total + 25;
							$('.bar').css('width',total+'%');
							// verif differents dossier pour afficher 25% car l'etap 3 est trop longue
						$.get("email_progress.php",{option:'etape_2'},function(result){
							total = total + 25;
							$('.bar').css('width',total+'%');
						});
						});
					});
					

					

					// Gestio ndes boutons
				$('.goo_button_left').live('click',function(){
					$('.repondre').show();
					$("html, body").animate({ scrollTop: $(document).height() }, 1000);
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
$('.gradeX').live('click',function(){
			var id_email = $(this).data('click');
			$('.bar').css('width','0%');
			var total = 0;
			$('.progress').show();
				setTimeout(function(){
					$('.bar').css('width','5%');
						}, 500);
			$.get("email_progress.php",{option:'etape_1'},function(result){
						total = total +25;
						$('.bar').css('width',total+'%');
						//verif des differents dossier pour afficher 25%
						$.get("email_progress.php",{option:'etape_2'},function(result){
							total = total + 25;
							$('.bar').css('width',total+'%');
						});
			});
					

					// verif de l'affichage pour afficher 25%
			$.get("email_progress.php?uid="+id_email,{option:'etape_4'},function(result){
				total = total + 25;
				$('.bar').css('width',total+'%');
			});
				$('.affiche_all').hide();
				$('.affiche_all').data('click','hide');
				
			
				

			 $("#frame").attr("src", "load/affiche_selection_email.php?uid="+id_email);
			 $.get("load/affiche_size_iframe_email.php?uid="+id_email,function(result){
			 	if(result != 0){
			 		var height_iframe = 15*result;
			 		height_iframe = height_iframe+'px';
			 		$("#frame").css('height',height_iframe);
			 		var iframe = $("#frame");
			 		
			 	}
			 })
			$('.header_info').load("load/affiche_email_header.php?uid="+id_email,function() {
				//if(result != true)
				//			window.location.replace("../management/index.php");
				total=100;
				$('.bar').css('width','100%');
				setTimeout(function(){
							$('.progress').hide();
							$('#affiche_all_article').addClass('nested');
							$('.affiche_one').show();
							$('.affiche_one').data('click','show');
							$('.bar').css('width','0%');
						}, 1200);
				
				
				
			});

			
			
		});