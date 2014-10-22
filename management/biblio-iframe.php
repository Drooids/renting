<!DOCTYPE html>


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
				var selected = new Array();
				// Tooltips

				$('.delete').live('click',function(){
					//alert('hello');
					var nom_fichier=$(this).attr('href');
					DeleteImg(nom_fichier);
					return false;

				});

				$('.deleteCheck').live('click',function(){
					$(':checkbox:checked').each(function()
						{
						     selected.push($(this).val());
						     DeleteImg($(this).val());
						});
					
					//alert(selected);
					
					return false;

				});

				function CountRefreshBiblio(){
						$.get("php/GetBiblioRefresh.php",
					   function(data){

					   	if(total != data[0].Total){
					   		afficheBiblio();
					   		total = data[0].Total;
							}
					   });
				}
				CountRefreshBiblio();
				var refreshId = setInterval(function()
			{
					
					CountRefreshBiblio();

			}, 10000);
			});



		</script>

				
				<!-- Grid row -->
				<div class="row-fluid">
				
					<!-- Data block  -->
					<article class="span12 data-block">
						<div class="data-container">
							<header>
								<h2>Bibliotheque d'images</h2>
							</header>
							<section>
								<p>Voici toutes les images enregistrées dans la base de données et disponibles. Si vous souhaitez en rajouter, il ne vous reste qu'a en uploader via le la page d'upload</p>
								<form id='biblio' class="form-gallery">
									
									
								</form>
							</section>
						</div>
					</article>
					<!-- /Data block  -->
					
				</div>
				<!-- /Grid row -->
</html>