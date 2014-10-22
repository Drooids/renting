<?php 

				
			
				include 'server.php';

				
					$reponse = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
										FROM gallery");

			
					$donnees = $reponse->fetchAll();

				for($k=0;$k<count($donnees);$k++){


						$id_gallery=$donnees[$k]['id_gallery'];
						$nom_gallery=$donnees[$k]['nom_gallery'];
						$link_gallery=$donnees[$k]['link_gallery'];
						$img_gallery=$donnees[$k]['img_gallery'];

						

						$json[$k]=array(
							"id_gallery"=>$id_gallery,
							"nom_gallery"=>$nom_gallery,
							"link_gallery"=>$link_gallery,
							"img_gallery"=>$img_gallery
							);

					}
				
				
				
				
	

    			
			


			


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>