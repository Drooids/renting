<?php 

				

				include 'server.php';

    			$reponse = $bdd->query("SELECT COUNT( * ) AS Total
										FROM fichier
										where actif_fichier = 1");

			
			$donnees = $reponse->fetchAll();
			
				$Total=$donnees[0]['Total'];

				$json[0]=array(
					"Total"=>$Total
					);

			
			


			


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>