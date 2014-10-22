<?php
	include("server.php");

	 $reponse = $bdd->query("SELECT * FROM devis ORDER BY devis_id DESC");
 				 $donnees = $reponse->fetchAll();
 				 if(count($donnees) > 0){
 				 	$max_id = $donnees[0]['devis_id'];
 				 }else{
 				 	$max_id=0;
 				 }

 				 $reponse = $bdd->query("SELECT * FROM portfolio ORDER BY id_portfolio DESC");
 				 $donnees = $reponse->fetchAll();
 				 if(count($donnees) > 0){
 				 	$max_id_port = $donnees[0]['id_portfolio'];
 				 }else{
 				 	$max_id_port=0;
 				 }

?>
<script type="text/javascript">
				
$(document).ready(function(){
				var max_id = "<?php echo $max_id; ?>";
				var max_id_port = "<?php echo $max_id_port; ?>";
				<?php if($_SESSION['right_user'] == 0){ ?>
				function Devis(max_id){
				    
				        $.ajax({ 
				         url: "load/event.php",
				         data:{ max_id: max_id},
				         success: function(result){
				         	if(result.max_id){
								max_id=result.max_id;
				         		$.jGrowl("Vous venez de recevoir un Devis", {
									header: 'Devis',
									sticky: true,
									theme: 'warning'
								});
								$.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
				         	}
				           		
				          
				           //alert('succes');
				           //doPoll(max_id);
				        	},complete: function(result){
				         	
				           
							
				          
				           //alert('complete');
				           setTimeout(function () {
					            Devis(max_id);
					        }, 500);
				        	},
				        timeout: 28000});
									    
				}
				
				function Portfolio(max_id_port){
					$.ajax({ 
				         url: "load/event_portfolio.php",
				         data:{ max_id_port: max_id_port},
				         success: function(result){
				         	if(result.max_id_port){
				         		max_id_port=result.max_id_port;
				         		 $.jGrowl("Une nouvelle propriete a été ajouté", {
									header: 'New Product',
									sticky: true,
									theme: 'warning'
								});
							$.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
				         	}
				           		
				          
				           //alert('succes');
				           //doPoll(max_id);
				        	},complete: function(result){
				         	
				           

				          
							
				          
				           //alert('complete');
				          setTimeout(function () {
					            Portfolio(max_id);
					        }, 500);
				        	},
				        timeout: 28000});
					}
				Portfolio(max_id_port);
				Devis(max_id);

				<?php } ?>

			});
</script>