<?php 

				$username = $_REQUEST['username'];

				include 'server.php';

    			$reponse = $bdd->query("SELECT prenom,nom,photo,job
										FROM users
										where username = '$username'");

			
			$donnees = $reponse->fetchAll();
			$prenom=$donnees[0]['prenom'];
			$nom=$donnees[0]['nom'];
			$photo=$donnees[0]['photo'];
			$job=$donnees[0]['job'];


			$json[0]=array(
					"prenom"=>$prenom,
					"nom"=>$nom,
					"photo"=>$photo,
					"job"=>$job
					);


					
			
			header("Content-Type: text/json");
					$json= json_encode($json); 
					echo $json; 

?>