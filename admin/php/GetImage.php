<?php 

				

				include 'server.php';
				$id = $_REQUEST['id'];

    			$reponse = $bdd->query("SELECT nom_fichier,id_fichier
										FROM fichier
										where id_fichier = '$id' ");

			
			$donnees = $reponse->fetchAll();
		
				$nom_fichier=$donnees[0]['nom_fichier'];
				$id_fichier=$donnees[0]['id_fichier'];
			

				$json[0]=array(
					"nom_fichier"=>$nom_fichier,
					"id_fichier"=>$id_fichier
					);

			
			


			


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>