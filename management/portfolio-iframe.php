		<html>
		<link rel="stylesheet" href="css/plugins/jquery.plupload.queue.css">
		<link rel="stylesheet" href="css/plugins/jquery.ui.plupload.css">

		<!-- Style -->
		<link rel="stylesheet" href="css/organon-blue-iframe.css">
		

		
		<!-- JS Libs -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js"><\/script>')</script>
		<script src="jquery/function.js"></script>
		<script src="js/libs/modernizr.js"></script>
		<script src="js/libs/selectivizr.js"></script>


		<script>
			$(document).ready(function(){
				var total = 0;
				var img_older  =0;
				var img_select =0;
				var id_select  =0;
				var thumbnail_selected = null;
				var id_bdd =0;
				var new_link =0;
				var nom_portfolio=0;
				var checked =0;
				var key ='nothing';
				
				
				/*$('.target').live("submit", function(){
					
					alert($(this).parent().parent().find('.img').attr('src'));
					//alert($(this).parent().find('.input-large').attr('value'));
				      return false;
				});*/

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

				
				$('.modal-select').live("click", function(){
					id_select = $(this).attr('id');
					//alert(id_select);
					older_img = $('#img-'+id_select).attr('src');
					id_bdd = $('#id-'+id_select).attr('value');
					new_link = $('#link-'+id_select).attr('value');
					nom_portfolio = $('#nom-'+id_select).attr('value');
					//alert(id_bdd);


					 //alert($('#'+id_select+""+id_select).attr('src'));
					//alert(img);
					//alert($(this).parent().find('.input-large').attr('value'));
				      return false;
				});

				$('.confirm').live("click", function(){
					id_select = $(this).data('click');
					//alert(id_select);
					older_img = $('#img-'+id_select).attr('src');
					id_bdd = $('#id-'+id_select).attr('value');
					new_link = $('#link-'+id_select).attr('value');
					nom_portfolio = $('#nom-'+id_select).attr('value');
					type_portfolio = $('input:radio[name=optionsRadios-'+id_select+']:checked').attr('value');
					//alert(type_portfolio);
					if(img_select==0){
						img_select=older_img;
					}
					if($('#visible-'+id_select).attr('checked')=='checked'){
						checked=1;
					}
					//alert(checked);
					//alert('img selected: '+ img_select+' Id selected:'+id_select + ' Ancienne image: '+ older_img+' Nom du portfolio: '+ nom_portfolio+' New link: '+new_link);
					$('#img-'+id_select).attr('src',img_select);

					SetPortfolio(id_bdd,nom_portfolio,type_portfolio,img_select,new_link,checked,0);
					img_select=0;
					setTimeout(
						  function() 
						  {
						    //do something special
						    AffichProductPortfolio(key);
						  }, 100);AffichProductPortfolio(key);
					//alert($(this).parent().find('.input-large').attr('value'));
					
				      return false;
				});
				$('.delete').live("click", function(){
					id_select = $(this).data('click');
					id_bdd = $('#id-'+id_select).attr('value');
					SetPortfolio(id_bdd,'','','','','','delete');
					setTimeout(
						  function() 
						  {
						    //do something special
						    AffichProductPortfolio(key);
						  }, 2000);
					

				});

				$('#search-portfolio').keyup(function() {
				   key = $('#search-portfolio').attr('value');
				 AffichProductPortfolio(key);	
				});

				$('#createNew').live("click", function(){
										var newNom = $('#nomNew').attr('value');
										//alert(newNom);
										SetPortfolio('',newNom,'','','','','new');
										setTimeout(
											  function() 
											  {
											    //do something special
											    AffichProductPortfolio(key);
											  }, 2000);
									});

				AffichProductPortfolio(key);				
			});
		</script>

			<div style="margin-bottom:70px;">
						<header>
								<h2 id='title-gallery'>Portfolio</h2>
						</header>
						
						<form class="form-search well" style="float:right; margin-right: 50px;">
												
							<input class="search-query" id="search-portfolio" type="text">
							<button class="btn" type="submit">Search</button>
						</form>
			</div>
		<div id='portfolio-product' >
		<a class='btn btn-alt btn-primary' data-toggle='modal' href='#CreationModal' style='margin-left:80px;margin-bottom:30px;'>Créer un nouveau fichier</a>
								<div class='modal fade hide modal-info' id='CreationModal' style='margin-left:280px;'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal'>×</button>
										<h3>Modal header</h3>
									</div>
									<div class='modal-body'>
										<p>Attention a bien choisir le nom</p>
										<input id='nomNew' class='input-large' type='text' value='Nom'>
									</div>
									<div class='modal-footer'>
										<a href='#' class='btn btn-alt' data-dismiss='modal'>Close</a>
										<a href='#' id ='createNew'class='btn btn-alt' data-dismiss='modal'>Save changes</a>
									</div>
								</div>
		</div>
		

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

		</html>