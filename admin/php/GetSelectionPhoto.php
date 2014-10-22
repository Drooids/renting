<?php 

				
				include 'server.php';

    			$reponse = $bdd->query("SELECT id_fichier,nom_fichier,adresse_fichier,type_fichier
										FROM fichier
										where actif_fichier = 1");

			
			$donnees = $reponse->fetchAll();
			for($k=0;$k<count($donnees);$k++){
				$id_fichier=$donnees[$k]['id_fichier'];
				$nom_fichier=$donnees[$k]['nom_fichier'];
				$adresse_fichier=$donnees[$k]['adresse_fichier'];
				$type_fichier=$donnees[$k]['type_fichier'];

				$json[$k]=array(
					"id_fichier"=>$id_fichier,
					"nom_fichier"=>$nom_fichier,
					"adresse_fichier"=>$adresse_fichier,
					"type_fichier"=>$type_fichier
					);

			}
			


			


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>